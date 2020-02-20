@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')
    <div class="top-news-area section-padding-100">
        <div class="container">
            <div class="row">

                @foreach($publishedPosts as  $publishedPost)
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="single-blog-post style-2 mb-5">

                            <div class="blog-thumbnail">
                                <a href="{{ route('frontend.post.view', ['post' => $publishedPost]) }}">
                                    <img
                                        src="{{ $publishedPost->image_link??$publishedPost->default_image_link }}"
                                        alt="">
                                </a>
                            </div>

                            <div class="blog-content">
                                <span class="post-date">{{ $publishedPost->published_at->format('M d, Y') }}</span>
                                <a href="#" class="post-title">{{ $publishedPost->title }}</a>
                                <a href="#" class="post-author">By {{ $publishedPost->creator->name }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="col-12">
                    <div class="load-more-button text-center">
                        <a href="#" class="btn newsbox-btn">Load More</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
