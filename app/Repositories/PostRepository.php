<?php

namespace App\Repositories;

use App\Exceptions\GeneralException;
use App\Models\Post;
use App\Models\User;
use App\Repositories\Contracts\PostRepositoryContract;
use File;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Throwable;

/**
 * @method Post first()
 * @method Post find($id)
 */
class PostRepository extends BaseRepository implements PostRepositoryContract
{
    public function __construct(Post $post)
    {
        $this->model = $post;
    }

    /**
     * @param  int  $limit
     * @param  string  $orderBy
     * @param  string  $sort
     *
     * @return LengthAwarePaginator
     */
    public function getPaginated($limit = 10, $orderBy = 'created_at', $sort = 'desc'): LengthAwarePaginator
    {
        return $this->model->newQuery()
            ->orderBy($orderBy, $sort)
            ->paginate($limit);
    }

    public function publishedPaginate($limit = 10, $orderBy = 'created_at', $sort = 'desc'): LengthAwarePaginator
    {
        return $this->model->newQuery()
            ->where('published', true)
            ->orderBy($orderBy, $sort)
            ->paginate($limit);
    }

    public function getPaginatedByUser(
        User $user,
        $limit = 10,
        $orderBy = 'created_at',
        $sort = 'desc'
    ): LengthAwarePaginator {
        return $this->model->newQuery()
            ->where('user_id', $user->id)
            ->orderBy($orderBy, $sort)
            ->paginate($limit);
    }

    public function findUserRecentPost(User $user, int $number = 5): Collection
    {
        return $this->where('user_id', $user->id)
            ->orderBy('updated_at')
            ->limit(5)
            ->get();
    }

    public function create(User $creator, array $data, $image = null): Post
    {
        return DB::transaction(function () use ($creator, $data, $image) {

            /** @var Post $post */
            $post = $this->model->newInstance([
                'title' => $data['title'],
                'slug' => Str::slug($data['title']),
                'image' => '',
                'content' => $data['content'],
                'published' => false,
            ]);
            // Upload post image if necessary
            if ($image) {
                $post->image = $image->store('/posts/images', 'public');
            }
            $post->creator()->associate($creator);
            if ($post->save()) {
                return $post;
            }
            throw new GeneralException(__('exceptions.frontend.posts.create_failed'));
        });
    }

    public function update(Post $post, array $data, $image = null): Post
    {
        return DB::transaction(function () use ($post, $data, $image) {
            $post = $post->fill([
                'title' => $data['title'],
                'slug' => $data['slug'],
                'content' => $data['content'],
            ]);
            // Upload post image if necessary
            if ($image) {
                $post->image = $image->store('/posts/images', 'public');
            }
            if ($post->save()) {
                return $post;
            }
            throw new GeneralException(__('exceptions.frontend.posts.update_failed'));
        });
    }

    /**
     * @param  Post  $post
     * @return Post
     * @throws GeneralException
     */
    public function publish(Post $post): Post
    {
        if ($post->update(['published' => true, 'published_at' => now()])) {

            return $post;
        }

        throw new GeneralException(__('exceptions.backend.posts.publish_failed'));
    }

    public function unpublish(Post $post): Post
    {
        if ($post->update(['published' => false,])) {

            return $post;
        }

        throw new GeneralException(__('exceptions.backend.posts.unpublish_failed'));
    }

    public function delete(Post $post): Post
    {
        return DB::transaction(function () use ($post) {
            if (!$post->delete()) {
                throw new GeneralException(__('exceptions.backend.posts.delete_failed'));
            }

            return $post;
        });
    }
}
