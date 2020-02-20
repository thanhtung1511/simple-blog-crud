<div class="btn-group" role="group" aria-label="@lang('labels.backend.blog.posts.post_actions')">
    @if($post->published && $post->published_at)
        <a href="{{ route('admin.blog.post.unpublish', $post) }}" data-toggle="tooltip" data-placement="top"
           title="@lang('buttons.general.post.unpublish')" class="btn btn-danger">
            <i class="fas fa-times-circle"></i>
        </a>
    @else
        <a href="{{ route('admin.blog.post.publish', $post) }}" data-toggle="tooltip" data-placement="top"
           title="@lang('buttons.general.post.publish')" class="btn btn-primary">
            <i class="fas fa-check-circle"></i>
        </a>
    @endif
</div>
