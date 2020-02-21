<?php

namespace App\Http\Controllers\Backend\Blog;

use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Post\ManagePostRequest;
use App\Http\Requests\Backend\Post\PublishPostRequest;
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
     * @param  ManagePostRequest  $request
     *
     * @return Response
     */
    public function index(ManagePostRequest $request)
    {
        return view('backend.blog.post.index')
            ->withPosts($this->postRepository->filter($request->only('filter')['filter'])
            ->paginate());
    }

    /**
     * @param  PublishPostRequest  $request
     * @param  Post  $post
     *
     * @return RedirectResponse
     *
     * @throws GeneralException
     */
    public function publish(PublishPostRequest $request, Post $post)
    {
        $this->postRepository->publish($post);

        return redirect()->route('admin.blog.post.index')->withFlashSuccess(__('alerts.backend.blog.posts.published'));
    }

    /**
     * @param  PublishPostRequest  $request
     * @param  Post  $post
     *
     * @return RedirectResponse
     *
     * @throws GeneralException
     */
    public function unpublish(PublishPostRequest $request, Post $post)
    {
        $this->postRepository->unpublish($post);

        return redirect()->route('admin.blog.post.index')->withFlashSuccess(__('alerts.backend.blog.posts.unpublished'));
    }
}
