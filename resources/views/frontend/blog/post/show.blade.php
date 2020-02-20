@extends('frontend.layouts.app')

@section('title', __('labels.frontend.blog.posts.management') . ' | ' . __('labels.frontend.blog.posts.view'))

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('labels.frontend.blog.posts.management')
                        <small class="text-muted">@lang('labels.frontend.blog.posts.view')</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4 mb-4">
                <div class="col">
                    @if($post->image_link)
                        <div class="row ml-2 mr-2">
                            <img src="{{ $post->image_link }}" alt="{{ $post->title }}">
                        </div><!--row-->
                    @endif
                    <div class="row ml-2 mr-2">
                        {!! $post->content !!}
                    </div><!--row-->
                </div>
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    <small class="float-right text-muted">
                        <strong>@lang('labels.frontend.blog.posts.show.created_at'): </strong>
                        {{ timezone()->convertToLocal($post->created_at) }}
                        ({{ $post->created_at->diffForHumans() }}),
                        <strong>@lang('labels.frontend.blog.posts.show.last_updated'): </strong>
                        {{ timezone()->convertToLocal($post->updated_at) }}
                        ({{ $post->updated_at->diffForHumans() }})
                    </small>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
@endsection
