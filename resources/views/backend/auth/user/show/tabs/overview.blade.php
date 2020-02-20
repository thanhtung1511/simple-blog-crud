<div class="col">
    <div class="table-responsive">
        <table class="table table-hover">
            <tr>
                <th>@lang('labels.backend.auth.users.tabs.content.overview.name')</th>
                <td>{{ $user->name }}</td>
            </tr>

            <tr>
                <th>@lang('labels.backend.auth.users.tabs.content.overview.email')</th>
                <td>{{ $user->email }}</td>
            </tr>
        </table>
    </div>
</div><!--table-responsive-->
