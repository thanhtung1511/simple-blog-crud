<div class="btn-group" role="group" aria-label="@lang('labels.backend.auth.users.user_actions')">
    <a href="{{ route('admin.auth.user.show', $user) }}" data-toggle="tooltip" data-placement="top"
       title="@lang('buttons.general.crud.view')" class="btn btn-info">
        <i class="fas fa-eye"></i>
    </a>

    <a href="{{ route('admin.auth.user.edit', $user) }}" data-toggle="tooltip" data-placement="top"
       title="@lang('buttons.general.crud.edit')" class="btn btn-primary">
        <i class="fas fa-edit"></i>
    </a>

    @if ($user->id !== 1 && $user->id !== auth()->id())
        <a href="{{ route('admin.auth.user.destroy', $user) }}"
           data-method="delete"
           data-trans-button-cancel="@lang('buttons.general.cancel')"
           data-trans-button-confirm="@lang('buttons.general.crud.delete')"
           data-trans-title="@lang('messages.backend.general.are_you_sure')"
           class="btn btn-danger"><i class="fas fa-times"></i></a>
    @endif
</div>
