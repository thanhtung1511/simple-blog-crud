<?php

namespace App\Http\Controllers\Frontend\Blog;

use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Post\ManagePostRequest;
use App\Http\Requests\Frontend\Post\StorePostRequest;
use App\Http\Requests\Frontend\Post\UpdatePostRequest;
use App\Models\Post;
use App\Repositories\Contracts\PostRepositoryContract;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
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
        return view('frontend.blog.post.index')
            ->withPosts($this->postRepository->getPaginatedByUser(auth()->user()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('frontend.blog.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StorePostRequest  $request
     * @return RedirectResponse
     * @throws Throwable
     */
    public function store(StorePostRequest $request)
    {
        $this->postRepository->create(
            auth()->user(),
            $request->only('title', 'slug', 'content'),
            $request->file('image')
        );

        return redirect()->route('frontend.blog.post.index')
            ->withFlashSuccess(__('alerts.frontend.blog.posts.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Post  $post
     * @return Response
     */
    public function show(Post $post)
    {
        return view('frontend.blog.post.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Post  $post
     * @return Response
     */
    public function edit(Post $post)
    {
        return view('frontend.blog.post.edit')->withPost($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdatePostRequest  $request
     * @param  Post  $post
     *
     * @return RedirectResponse
     *
     * @throws Throwable
     * @throws GeneralException
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $this->postRepository->update(
            $post,
            $request->only('title', 'slug', 'content'),
            $request->file('image')
        );
        return redirect()->route('frontend.blog.post.index')
            ->withFlashSuccess(__('alerts.frontend.blog.posts.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  ManagePostRequest  $request
     * @param  Post  $post
     *
     * @return RedirectResponse
     *
     * @throws GeneralException
     * @throws Throwable
     */
    public function destroy(ManagePostRequest $request, Post $post)
    {
        $this->postRepository->delete($post);

        return redirect()->route('frontend.blog.post.index')
            ->withFlashSuccess(__('alerts.frontend.blog.posts.deleted'));
    }
}
