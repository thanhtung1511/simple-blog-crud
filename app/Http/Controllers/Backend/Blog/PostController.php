<?php

namespace App\Http\Controllers\Backend\Blog;

use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Role\ManageRoleRequest;
use App\Http\Requests\Backend\Role\StoreRoleRequest;
use App\Http\Requests\Backend\Role\UpdateRoleRequest;
use App\Http\Requests\Frontend\Post\ManagePostRequest;
use App\Http\Requests\Frontend\Post\UpdatePostRequest;
use App\Models\Post;
use App\Models\Role;
use App\Repositories\Contracts\PostRepositoryContract;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Storage;
use Throwable;

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
