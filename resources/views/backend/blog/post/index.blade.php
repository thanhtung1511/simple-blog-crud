@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.blog.posts.management'))

@section('breadcrumb-links')
    @include('backend.blog.post.includes.breadcrumb-links')
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.backend.blog.posts.management') }} <small
                            class="text-muted">{{ __('labels.backend.blog.posts.all') }}</small>
                    </h4>
                </div><!--col-->

            </div><!--row-->

            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>@lang('labels.backend.blog.posts.table.id')</th>
                                <th>@lang('labels.backend.blog.posts.table.title')</th>
                                <th>@lang('labels.backend.blog.posts.table.creator')</th>
                                <th>@lang('labels.backend.blog.posts.table.created')</th>
                                <th>@lang('labels.backend.blog.posts.table.last_updated')</th>
                                <th>@lang('labels.backend.blog.posts.table.published')</th>
                                <th>@lang('labels.general.actions')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>
                                        <a href="{{ route('admin.auth.user.show', ['user' => $post->creator]) }}">
                                            {{ $post->creator->name }}
                                        </a>
                                    </td>
                                    <td>{{ $post->created_at->diffForHumans() }}</td>
                                    <td>{{ $post->updated_at->diffForHumans() }}</td>
                                    <td>@include('backend.blog.post.includes.publication', ['post' => $post])</td>
                                    <td class="btn-td">@include('backend.blog.post.includes.actions', ['post' => $post])</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!--col-->
            </div><!--row-->
            <div class="row">
                <div class="col-7">
                    <div class="float-left">
                        {!! $posts->total() !!} {{ trans_choice('labels.backend.blog.posts.table.total', $posts->total()) }}
                    </div>
                </div><!--col-->

                <div class="col-5">
                    <div class="float-right">
                        {!! $posts->render() !!}
                    </div>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->
@endsection
