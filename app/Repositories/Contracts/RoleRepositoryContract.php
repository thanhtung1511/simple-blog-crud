<?php

namespace App\Repositories\Contracts;

use App\Exceptions\GeneralException;
use App\Models\Role;
use Exception;
use Illuminate\Pagination\LengthAwarePaginator;
use Throwable;

interface RoleRepositoryContract extends BaseRepositoryContract
{
    public function __construct(Role $role);

    /**
     * @param  int  $limit
     * @param  string  $orderBy
     * @param  string  $sort
     *
     * @return LengthAwarePaginator
     */
    public function getPaginated($limit = 10, $orderBy = 'created_at', $sort = 'desc'): LengthAwarePaginator;

    /**
     * @param  array  $data
     *
     * @return Role
     * @throws Throwable
     * @throws Exception
     */
    public function create(array $data): Role;

    /**
     * @param  Role  $role
     * @param  array  $data
     *
     * @return Role
     *
     * @throws GeneralException
     */
    public function update(Role $role, array $data): Role;
}
