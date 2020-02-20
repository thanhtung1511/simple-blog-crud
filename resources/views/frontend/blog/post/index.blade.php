@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.frontend.blog.posts.all'))

@section('content')
    <div class="row">
        <div class="col-sm-5">
            <h4 class="card-title mb-0">
                {{ __('labels.frontend.blog.posts.management') }} <small
                    class="text-muted">{{ __('labels.frontend.blog.posts.all') }}</small>
            </h4>
        </div><!--col-->

        <div class="col-sm-7">
            @include('frontend.blog.post.includes.header-buttons')
        </div><!--col-->
    </div><!--row-->

    <div class="row mt-4">
        <div class="col">
            <div class="table-responsive">
                <table class="table user-posts-table">
                    <thead>
                    <tr>
                        <th>@lang('labels.frontend.blog.posts.table.id')</th>
                        <th>@lang('labels.frontend.blog.posts.table.image')</th>
                        <th>@lang('labels.frontend.blog.posts.table.title')</th>
                        <th>@lang('labels.frontend.blog.posts.table.created')</th>
                        <th>@lang('labels.frontend.blog.posts.table.last_updated')</th>
                        <th>@lang('labels.frontend.blog.posts.table.published')</th>
                        <th>@lang('labels.general.actions')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr class="{{ $post->published ? '' : 'bg-warning'}}">
                            <td>{{ $post->id }}</td>
                            <td align="center">
                                @if($post->image_link)
                                    <img class="post-image" src="{{ $post->image_link }}" alt="">
                                @else
                                    No Image
                                @endif
                            </td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->created_at->format('d/m/Y H:i:s') }}</td>
                            <td>{{ $post->updated_at->format('d/m/Y H:i:s') }}</td>
                            <td>{{ $post->published ? $post->published_at->format('d/m/Y H:i:s'):'Non published' }}</td>
                            <td class="btn-td">@include('frontend.blog.post.includes.actions', ['post' => $post])</td>
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
                {!! $posts->total() !!} {{ trans_choice('labels.frontend.blog.posts.table.total', $posts->total()) }}
            </div>
        </div><!--col-->

        <div class="col-5">
            <div class="float-right">
                {!! $posts->render() !!}
            </div>
        </div><!--col-->
    </div><!--row-->
@endsection
