<div class="row">
    <div class="col">
        <div class="recent-posts-card card mb-4">
            <div class="card-header">
               <div class="row">
                   <div class="col-sm-5">
                       <h4 class="card-title mb-0">
                           {{ __('labels.frontend.blog.posts.recent') }}
                       </h4>
                   </div><!--col-->

                   <div class="col-sm-7">
                       <div class="btn-toolbar float-right" role="toolbar" aria-label="@lang('labels.general.toolbar_btn_groups')">
                           <a href="{{ route('frontend.blog.post.index') }}" class="btn btn-success ml-1" data-toggle="tooltip"
                              title="@lang('labels.frontend.blog.posts.all')"><i class="fas fa-list"></i></a>
                       </div><!--btn-toolbar-->
                   </div><!--col-->
               </div>
            </div><!--card-header-->

            <div class="card-body">
                <ul>
                    @foreach($recentPosts as $recentPost)
                        <li>
                            <a class="post-title" href="{{ route('frontend.post.view', ['post' => $recentPost]) }}">{{$recentPost->title}}</a>
                            <small class="post-date float-right text-muted">
                                <strong>@lang('labels.frontend.dashboard.recent_posts.created_at')
                                    :</strong> {{ timezone()->convertToLocal($recentPost->created_at) }}
                                ({{ $recentPost->created_at->diffForHumans() }})
                            </small>
                            <small class="post-date float-right text-muted">
                                <strong>@lang('labels.frontend.dashboard.recent_posts.last_updated'):</strong>
                                {{ timezone()->convertToLocal($recentPost->updated_at) }}
                                ({{ $recentPost->updated_at->diffForHumans() }})
                            </small>
                            <small class="post-date float-right text-muted">
                                @if($recentPost->published_at != null)
                                    <strong>@lang('labels.frontend.dashboard.recent_posts.published_at'):</strong>
                                    {{ timezone()->convertToLocal($recentPost->published_at) }}
                                    ({{ $recentPost->published_at->diffForHumans() }})
                                @else
                                    Not published yet
                                @endif
                            </small>
                        </li>
                    @endforeach
                </ul>
            </div><!--card-body-->
        </div><!--card-->
    </div><!--col-md-6-->
</div><!--row-->
