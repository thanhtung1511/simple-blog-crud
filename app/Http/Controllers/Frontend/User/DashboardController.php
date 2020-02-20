<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\PostRepositoryContract;
use Illuminate\Http\Response;

class DashboardController extends Controller
{
    /**
     * @param  PostRepositoryContract  $postRepository
     * @return Response
     */
    public function index(PostRepositoryContract $postRepository)
    {
        return view('frontend.user.dashboard')->withRecentPosts($postRepository->findUserRecentPost(auth()->user()));
    }
}
