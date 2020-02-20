<?php

namespace App\Http\Controllers\Frontend\User;

use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\User\UpdatePasswordRequest;
use App\Http\Requests\Frontend\User\UpdateProfileRequest;
use App\Repositories\Contracts\UserRepositoryContract;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * @var UserRepositoryContract
     */
    private $userRepository;

    public function __construct(UserRepositoryContract $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @return Response
     */
    public function index()
    {
        return view('frontend.user.account');
    }

    /**
     * @param  UpdateProfileRequest  $request
     *
     * @return RedirectResponse
     *
     * @throws GeneralException
     */
    public function updateProfile(UpdateProfileRequest $request)
    {
        $user = $this->userRepository->update(
            $request->user(),
            $request->only('first_name', 'last_name', 'email')
        );

        // E-mail address was updated, user has to logout
        if ($user->email_changed) {
            auth()->logout();

            return redirect()->route('frontend.auth.login');
        }

        return redirect()->route('frontend.user.account')->withFlashSuccess(__('messages.frontend.user.profile_updated'));
    }

    /**
     * @param  UpdatePasswordRequest  $request
     *
     * @return RedirectResponse
     *
     * @throws GeneralException
     */
    public function updatePassword(UpdatePasswordRequest $request)
    {
        $this->userRepository->updatePassword(auth()->user(), $request->only('old_password', 'password'));

        return redirect()->route('frontend.user.account')->withFlashSuccess(__('messages.frontend.user.password_updated'));
    }
}
