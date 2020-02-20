<?php

namespace App\Repositories;

use App\Exceptions\GeneralException;
use App\Models\Role;
use App\Repositories\Contracts\RoleRepositoryContract;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Throwable;

class RoleRepository extends BaseRepository implements RoleRepositoryContract
{
    /**
     * RoleRepository constructor.
     *
     * @param  Role  $model
     */
    public function __construct(Role $model)
    {
        $this->model = $model;
    }

    public function getPaginated($limit = 10, $orderBy = 'created_at', $sort = 'desc'): LengthAwarePaginator
    {
        return $this->with(['permissions'])
            ->orderBy($orderBy, $sort)
            ->paginate($limit);
    }

    /**
     * @param  array  $data
     *
     * @return Role
     * @throws Throwable
     * @throws GeneralException
     */
    public function create(array $data): Role
    {
        // New role name must not exist
        if ($this->roleExists($data['name'])) {
            throw new GeneralException('A role already exists with the name '.e($data['name']));
        }

        if (empty($data['permissions'])) {
            $data['permissions'] = [];
        }

        return DB::transaction(function () use ($data) {
            /** @var Role $role */
            $role = $this->model::create(['name' => strtoupper($data['name'])]);

            if ($role) {
                $role->givePermissionTo($data['permissions']);

                return $role;
            }

            throw new GeneralException(trans('exceptions.backend.roles.create_error'));
        });
    }

    public function update(Role $role, array $data): Role
    {
        if ($role->isAdmin()) {
            throw new GeneralException('You can not edit the administrator role.');
        }

        // If the name is changing make sure it doesn't already exist
        if ($role->name !== strtolower($data['name'])) {
            if ($this->roleExists($data['name'])) {
                throw new GeneralException('A role already exists with the name '.$data['name']);
            }
        }

        if (empty($data['permissions'])) {
            $data['permissions'] = [];
        }


        return DB::transaction(function () use ($role, $data) {
            if ($role->update([
                'name' => strtoupper($data['name']),
            ])) {
                $role->syncPermissions($data['permissions']);

                return $role;
            }

            throw new GeneralException(trans('exceptions.backend.roles.update_error'));
        });
    }

    /**
     * @param $name
     *
     * @return bool
     */
    protected function roleExists($name): bool
    {
        return $this->model
                ->where('name', strtolower($name))
                ->count() > 0;
    }
}
