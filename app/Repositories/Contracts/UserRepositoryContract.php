<?php

namespace App\Repositories\Contracts;

use App\Exceptions\GeneralException;
use App\Models\User;
use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Throwable;

interface UserRepositoryContract extends BaseRepositoryContract
{
    public function __construct(User $user);

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
     * @return User
     * @throws Throwable
     * @throws Exception
     */
    public function create(array $data): User;

    /**
     * @param  User  $user
     * @param  array  $data
     *
     * @return User
     *
     * @throws GeneralException
     */
    public function update(User $user, array $data): User;

    /**
     * @param  User  $user
     * @param      $input
     *
     * @return User
     * @throws GeneralException
     */
    public function updatePassword(User $user, $input): User;
}
