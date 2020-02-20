<?php

namespace App\Repositories;

use App\Exceptions\GeneralException;
use App\Models\User;
use App\Notifications\Frontend\Auth\UserNeedsConfirmation;
use App\Repositories\Contracts\UserRepositoryContract;
use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

/**
 * @method User first()
 * @method User find($id)
 */
class UserRepository extends BaseRepository implements UserRepositoryContract
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function getPaginated($limit = 10, $orderBy = 'created_at', $sort = 'desc'): LengthAwarePaginator
    {
        return $this->with(['roles', 'permissions'])
            ->orderBy($orderBy, $sort)
            ->paginate($limit);
    }

    public function create(array $data): User
    {
        return DB::transaction(function () use ($data) {
            $user = $this->model->create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
            if ($user) {
                // Add the default role to the new registered user
                $user->assignRole(config('access.roles.default'));
            }

            return $user;
        });
    }

    public function update(User $user, array $data): User
    {
        $this->checkUserByEmail($user, $data['email']);
        $emailChanged = false;
        $user = DB::transaction(function () use ($user, $data, &$emailChanged) {
            $user = $user->fill([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
            ]);
            if (config('access.users.change_email')) {
                $changes = $user->getDirty();
                if (!empty($changes['email'])) {
                    // New email exists
                    if ($this->findByColumn($data['email'], 'email')) {
                        throw new GeneralException(__('exceptions.frontend.auth.email_taken'));
                    }

                    try {
                        $user->save();
                        $emailChanged = true;
                    } catch (Exception $e) {
                        throw new GeneralException(__('exceptions.backend.users.update_failed'));
                    }
                }
            }

            return $user;
        });

        $user->email_changed = $emailChanged;

        return $user;
    }

    public function updatePassword(User $user, $input): User
    {
        if ($user->update(['password' => $input['password']])) {
            return $user;
        }

        throw new GeneralException(__('exceptions.backend.users.update_password_failed'));
    }

    /**
     * @param  User  $user
     * @param      $email
     *
     * @throws GeneralException
     */
    protected function checkUserByEmail(User $user, $email)
    {
        // Figure out if email is not the same and check to see if email exists
        if ($user->email !== $email && $this->model->where('email', '=', $email)->first()) {
            throw new GeneralException(trans('exceptions.backend.users.email_failed'));
        }
    }
}
