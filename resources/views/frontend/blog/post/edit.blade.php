@extends('frontend.layouts.app')

@section('title', __('labels.frontend.blog.posts.management') . ' | ' . __('labels.frontend.blog.posts.update'))

@section('content')
    {{ html()->modelForm($post, 'PATCH', route('frontend.blog.post.update', $post->id))->class('form-horizontal')->attribute('enctype', 'multipart/form-data')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('labels.frontend.blog.posts.management')
                        <small class="text-muted">@lang('labels.frontend.blog.posts.create')</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr>

            <div class="row mt-4 mb-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.frontend.title'))->class('col-md-2 form-control-label')->for('title') }}

                        <div class="col-md-10">
                            {{ html()->text('title')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.frontend.title'))
                                ->attribute('maxlength', 150)
                                ->required()
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->
                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.frontend.slug'))->class('col-md-2 form-control-label')->for('slug') }}

                        <div class="col-md-10">
                            {{ html()->text('slug')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.frontend.slug'))
                                ->attribute('maxlength', 150)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="row">
                        <div class="col">
                            <div class="form-group row">
                                {{ html()->label(__('validation.attributes.frontend.image'))->class('col-md-2 form-control-label')->for('image') }}

                                <div class="col-md-10">
                                    {{ html()->file('image')->class('form-control-file') }}
                                </div><!--col-->
                            </div><!--form-group-->
                        </div><!--col-->
                    </div><!--row-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.frontend.content'))->class('col-md-2 form-control-label')->for('content') }}

                        <div class="col-md-10">
                            {{ html()->textarea('content')
                                ->id('content-text-editor')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.frontend.content'))
                                ->attribute('maxlength', 150)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer clearfix">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('frontend.blog.post.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.update')) }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
    {{ html()->closeModelForm() }}
@endsection
