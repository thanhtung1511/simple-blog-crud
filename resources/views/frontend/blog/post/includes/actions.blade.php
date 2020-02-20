<div class="btn-group" role="group" aria-label="@lang('labels.frontend.posts.post_actions')">
    <a href="{{ route('frontend.blog.post.show', $post) }}" data-toggle="tooltip" data-placement="top"
       title="@lang('buttons.general.crud.view')" class="btn btn-info">
        <i class="fas fa-eye"></i>
    </a>

    <a href="{{ route('frontend.blog.post.edit', $post) }}" data-toggle="tooltip" data-placement="top"
       title="@lang('buttons.general.crud.edit')" class="btn btn-primary">
        <i class="fas fa-edit"></i>
    </a>

    <a href="{{ route('frontend.blog.post.destroy', $post) }}"
       title="@lang('buttons.general.crud.delete')"
       data-method="delete"
       data-trans-button-cancel="@lang('buttons.general.cancel')"
       data-trans-button-confirm="@lang('buttons.general.crud.delete')"
       data-trans-title="@lang('messages.frontend.general.are_you_sure')"
       class="btn btn-danger"> <i class="fas fa-times"></i></a>
</div>
