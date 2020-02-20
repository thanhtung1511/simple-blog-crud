<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Repositories\Contracts\PostRepositoryContract;

class DefaultController extends Controller
{
    /**
     * @var PostRepositoryContract
     */
    private $postRepository;

    public function __construct(PostRepositoryContract $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index()
    {
        return view('frontend.default.index')->withPublishedPosts($this->postRepository->publishedPaginate(9));
    }

    public function viewPost(Post $post)
    {
        return view('frontend.default.post')->withPost($post);
    }
}
