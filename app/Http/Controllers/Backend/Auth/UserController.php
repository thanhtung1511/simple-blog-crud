<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\User\ManageUserRequest;
use App\Http\Requests\Backend\User\StoreUserRequest;
use App\Http\Requests\Backend\User\UpdateUserRequest;
use App\Models\User;
use App\Repositories\Contracts\UserRepositoryContract;
use App\Repositories\Contracts\RoleRepositoryContract;
use App\Repositories\Contracts\PermissionRepositoryContract;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Throwable;

/**
 * Class UserController.
 */
class UserController extends Controller
{
    /**
     * @var UserRepositoryContract
     */
    private $userRepository;

    /**
     * UserController constructor.
     *
     * @param  UserRepositoryContract  $userRepository
     */
    public function __construct(UserRepositoryContract $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param  ManageUserRequest  $request
     *
     * @return Factory|View
     */
    public function index(ManageUserRequest $request)
    {
        return view('backend.auth.user.index')
            ->withUsers($this->userRepository->getPaginated(25, 'id', 'asc'));
    }

    /**
     * @param  ManageUserRequest  $request
     *
     * @param  RoleRepositoryContract  $roleRepository
     * @param  PermissionRepositoryContract  $permissionRepository
     * @return Response
     */
    public function create(
        ManageUserRequest $request,
        RoleRepositoryContract $roleRepository,
        PermissionRepositoryContract $permissionRepository
    ) {
        return view('backend.auth.user.create')
            ->withRoles($roleRepository->with('permissions')->get(['id', 'name']))
            ->withPermissions($permissionRepository->get(['id', 'name']));
    }

    /**
     * @param  StoreUserRequest  $request
     *
     * @return Response
     * @throws Throwable
     */
    public function store(StoreUserRequest $request)
    {
        $this->userRepository->create($request->only(
            'first_name',
            'last_name',
            'email',
            'password',
            'active',
            'confirmed',
            'confirmation_email',
            'roles',
            'permissions'
        ));

        return redirect()->route('admin.auth.user.index')->withFlashSuccess(__('alerts.backend.auth.users.created'));
    }

    /**
     * @param  ManageUserRequest  $request
     * @param  User  $user
     *
     * @return Response
     */
    public function show(ManageUserRequest $request, User $user)
    {
        return view('backend.auth.user.show')->withUser($user);
    }

    /**
     * @param  ManageUserRequest  $request
     * @param  User  $user
     *
     * @param  RoleRepositoryContract  $roleRepository
     * @param  PermissionRepositoryContract  $permissionRepository
     * @return Response
     */
    public function edit(
        ManageUserRequest $request,
        RoleRepositoryContract $roleRepository,
        PermissionRepositoryContract $permissionRepository,
        User $user
    ) {
        return view('backend.auth.user.edit')
            ->withUser($user)
            ->withRoles($roleRepository->get())
            ->withUserRoles($user->roles->pluck('name')->all())
            ->withPermissions($permissionRepository->get(['id', 'name']))
            ->withUserPermissions($user->permissions->pluck('name')->all());
    }

    /**
     * @param  UpdateUserRequest  $request
     * @param  User  $user
     *
     * @return mixed
     * @throws Throwable
     * @throws GeneralException
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $this->userRepository->update($user, $request->only(
            'first_name',
            'last_name',
            'email',
            'roles',
            'permissions'
        ));

        return redirect()->route('admin.auth.user.index')->withFlashSuccess(__('alerts.backend.auth.users.updated'));
    }

    /**
     * @param  ManageUserRequest  $request
     * @param  User  $user
     *
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(ManageUserRequest $request, User $user)
    {
        $this->userRepository->deleteById($user->id);

//        event(new UserDeleted($user));

        return RedirectResponse::create(route('admin.auth.user.deleted'))->withFlashSuccess(__('alerts.backend.auth.users.deleted'));
    }
}
