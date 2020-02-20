@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')
    <div class="top-news-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="post-image pb-4">
                        <img
                            src="{{ $post->image_link??$post->default_image_link }}"
                            alt="">
                    </div>

                    <div class="blog-content">
                        <span class="post-date">{{ $post->published_at->format('M d, Y') }}</span>
                        <a href="#" class="post-title">{{ $post->title }}</a>
                        <a href="#" class="post-author">By {{ $post->creator->name }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
