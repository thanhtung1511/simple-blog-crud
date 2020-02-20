<?php

namespace App\Repositories\Contracts;

use App\Exceptions\GeneralException;
use App\Models\Permission;
use Exception;
use Illuminate\Pagination\LengthAwarePaginator;
use Throwable;

interface PermissionRepositoryContract extends BaseRepositoryContract
{
    public function __construct(Permission $role);

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
     * @return Permission
     * @throws Throwable
     * @throws Exception
     */
    public function create(array $data): Permission;

    /**
     * @param  Permission  $permission
     * @param  array  $data
     *
     * @return Permission
     *
     * @throws GeneralException
     */
    public function update(Permission $permission, array $data): Permission;
}
