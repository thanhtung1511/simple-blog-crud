<div class="btn-group" role="group" aria-label="@lang('labels.backend.blog.posts.post_actions')">
    @if($post->published && $post->published_at)
        {{html()->form('POST', route('admin.blog.post.unpublish', $post))->open()}}
        @method('PATCH')
        <button type="submit" data-toggle="tooltip" data-placement="top"
                title="@lang('buttons.general.post.unpublish')" class="btn btn-danger">
            <i class="fas fa-times-circle"></i>
        </button>
        {{ html()->form()->close() }}
    @else
        {{html()->form('POST', route('admin.blog.post.publish', $post))->open()}}
        @method('PATCH')
        <button type="submit" data-toggle="tooltip" data-placement="top"
                title="@lang('buttons.general.post.publish')" class="btn btn-primary">
            <i class="fas fa-check-circle"></i>
        </button>
        {{ html()->form()->close() }}
    @endif
</div>
