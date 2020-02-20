<?php

namespace App\Repositories;

use App\Exceptions\GeneralException;
use App\Models\Permission;
use App\Repositories\Contracts\PermissionRepositoryContract;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Throwable;

class PermissionRepository extends BaseRepository implements PermissionRepositoryContract
{
    /**
     * RoleRepository constructor.
     *
     * @param  Permission  $model
     */
    public function __construct(Permission $model)
    {
        $this->model = $model;
    }

    public function getPaginated($limit = 10, $orderBy = 'created_at', $sort = 'desc'): LengthAwarePaginator
    {
        return $this->orderBy($orderBy, $sort)
            ->paginate($limit);
    }

    /**
     * @param  array  $data
     *
     * @return Permission
     * @throws Throwable
     * @throws GeneralException
     */
    public function create(array $data): Permission
    {
        // New role name must not exist
        if ($this->permissionExists($data['name'])) {
            throw new GeneralException('A permission already exists with the name '.e($data['name']));
        }

        return DB::transaction(function () use ($data) {
            /** @var Permission $permission */
            $permission = $this->model->create(['name' => strtoupper($data['name'])]);
            if ($permission) {
                return $permission;
            }

            throw new GeneralException(trans('exceptions.backend.permissions.create_error'));
        });
    }

    public function update(Permission $permission, array $data): Permission
    {
        // If the name is changing make sure it doesn't already exist
        if ($permission->name !== strtolower($data['name'])) {
            if ($this->permissionExists($data['name'])) {
                throw new GeneralException('A permission already exists with the name '.$data['name']);
            }
        }


        return DB::transaction(function () use ($permission, $data) {
            if ($permission->update([
                'name' => strtoupper($data['name']),
            ])) {

                return $permission;
            }

            throw new GeneralException(trans('exceptions.backend.permissions.update_error'));
        });
    }

    /**
     * @param $name
     *
     * @return bool
     */
    protected function permissionExists($name): bool
    {
        return $this->model
                ->where('name', strtolower($name))
                ->count() > 0;
    }
}
