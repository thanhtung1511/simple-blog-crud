@if($user->isActive())
    <span class='badge badge-success'>@lang('labels.general.published')</span>
@else
    <span class='badge badge-danger'>@lang('labels.general.unpublished')</span>
@endif
