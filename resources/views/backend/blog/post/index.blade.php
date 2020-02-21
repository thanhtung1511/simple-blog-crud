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

            {{ html()->form('GET', route( 'admin.blog.post.index'))->open() }}
            <div class="row mt-4 mb-4">
                <div class="col-sm-3">
                    <h5 class="">{{ __('labels.backend.blog.posts.filter.title') }}</h5>
                </div><!--col-->
                <div class="col-md-4">
                    <div class="form-group row">
                        {{ html()->label(__('labels.backend.blog.posts.filter.date'))->class('col-md-2 form-control-label') }}

                        <div class="col-md-10">
                            {{ html()->text()
                                ->id('post_date_filter')
                                ->class('form-control date-range-picker')
                                ->placeholder(__('labels.backend.blog.posts.filter.date')) }}
                            {{ html()->hidden('filter[updated_at][start_date]')->class('picker-start-date') }}
                            {{ html()->hidden('filter[updated_at][end_date]')->class('picker-end-date') }}
                        </div><!--col-->
                    </div><!--form-group-->
                </div><!--col-->
                <div class="col-md-4">
                    <div class="form-group row">
                        {{ html()->label(__('labels.backend.blog.posts.filter.status'))->class('col-md-2 form-control-label')->for('status_filter') }}

                        <div class="col-md-10">
                            {{ html()->select('filter[published]', ['' => 'All', '1' => 'Published', '0' => 'Unpulished'])->value(request('filter[published]',''))->class('form-control')}}
                        </div><!--col-->
                    </div><!--form-group-->
                </div><!--col-->
                <div class="col-md-1 col-sm-2">
                    {{ form_submit(__('labels.backend.blog.posts.filter.filter')) }}
                </div><!--col-->
            </div><!--row-->
            {{ html()->form()->close() }}

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
                                <tr class="{{ $post->published ? '' : 'bg-gray-600' }}">
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
