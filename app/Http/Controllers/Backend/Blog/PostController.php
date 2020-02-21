<?php

namespace App\Http\Controllers\Backend\Blog;

use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Repositories\Contracts\PostRepositoryContract;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class PostController extends Controller
{
    /**
     * @var PostRepositoryContract
     */
    private $postRepository;

    public function __construct(PostRepositoryContract $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('backend.blog.post.index')->withPosts($this->postRepository->paginate());
    }
}
