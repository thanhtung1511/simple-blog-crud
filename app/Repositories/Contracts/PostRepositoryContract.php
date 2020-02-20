<?php

namespace App\Repositories\Contracts;

use App\Exceptions\GeneralException;
use App\Models\Post;
use App\Models\User;
use File;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile;
use Throwable;

interface PostRepositoryContract extends BaseRepositoryContract
{
    public function __construct(Post $user);

    /**
     * @param  int  $limit
     * @param  string  $orderBy
     * @param  string  $sort
     *
     * @return LengthAwarePaginator
     */
    public function publishedPaginate($limit = 10, $orderBy = 'created_at', $sort = 'desc'): LengthAwarePaginator;

    /**
     * @param  User  $user
     * @param  int  $limit
     * @param  string  $orderBy
     * @param  string  $sort
     *
     * @return LengthAwarePaginator
     */
    public function getPaginatedByUser(
        User $user,
        $limit = 10,
        $orderBy = 'created_at',
        $sort = 'desc'
    ): LengthAwarePaginator;


    /**
     * @param  User  $user
     * @param  int  $number
     *
     * @return Collection
     */
    public function findUserRecentPost(User $user, int $number = 5): Collection;

    /**
     * @param  User  $creator
     * @param  array  $data
     * @param  UploadedFile|null  $image
     *
     * @return Post
     *
     * @throws Throwable
     */
    public function create(User $creator, array $data, $image = null): Post;

    /**
     * @param  Post  $post
     * @param  array  $data
     * @param  UploadedFile|null  $image
     *
     * @return Post
     *
     * @throws GeneralException
     * @throws Throwable
     */
    public function update(Post $post, array $data, $image = null): Post;

    /**
     * @param  Post  $post
     * @return Post
     * @throws GeneralException
     */
    public function publish(Post $post): Post;

    /**
     * @param  Post  $post
     * @return Post
     * @throws GeneralException
     */
    public function unpublish(Post $post): Post;

    /**
     * @param  Post  $post
     *
     * @return Post
     *
     * @throws GeneralException
     * @throws Throwable
     */
    public function delete(Post $post): Post;

}
