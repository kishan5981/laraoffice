@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.content-pages.title')</h3>
    
    {!! Form::model($content_page, ['method' => 'PUT', 'route' => ['admin.content_pages.update', $content_page->id], 'files' => true,'class'=>'formvalidation']) !!}
    {!! Form::submit(trans('global.app_Cancel'), ['class' => 'btn btn-secondary wave-effect', 'name' => 'Cancel','value' => 'Cancel']) !!}


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-6">
                <div class="form-group">
                    {!! Form::label('title', trans('global.content-pages.fields.title').'*', ['class' => 'control-label form-label']) !!}
                    <div class="form-line">
                    {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => 'Title', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('title'))
                        <p class="help-block">
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>
                </div>
                </div>
                 </div>

                <div class="row">
                <div class="col-xs-6">
                <div class="form-group">
                    {!! Form::label('category_id', trans('global.content-pages.fields.category-id').'', ['class' => 'control-label']) !!}
                    <button type="button" class="btn btn-primary btn-xs" id="selectbtn-category_id">
                        {{ trans('global.app_select_all') }}
                    </button>
                    <button type="button" class="btn btn-primary btn-xs" id="deselectbtn-category_id">
                        {{ trans('global.app_deselect_all') }}
                    </button>
                    {!! Form::select('category_id[]', $category_ids, old('category_id') ? old('category_id') : $content_page->category_id->pluck('id')->toArray(), ['class' => 'form-control select2', 'multiple' => 'multiple', 'id' => 'selectall-category_id' ]) !!}
                    <p class="help-block"></p>
                    @if($errors->has('category_id'))
                        <p class="help-block">
                            {{ $errors->first('category_id') }}
                        </p>
                    @endif
                </div>
                </div>

       
                <div class="col-xs-6">
                <div class="form-group">
                    
                    {!! Form::label('tag_id', trans('global.content-pages.fields.tag-id').'', ['class' => 'control-label']) !!}
                    <button type="button" class="btn btn-primary btn-xs" id="selectbtn-tag_id">
                        {{ trans('global.app_select_all') }}
                    </button>
                    <button type="button" class="btn btn-primary btn-xs" id="deselectbtn-tag_id">
                        {{ trans('global.app_deselect_all') }}
                    </button>
                    {!! Form::select('tag_id[]', $tag_ids, old('tag_id') ? old('tag_id') : $content_page->tag_id->pluck('id')->toArray(), ['class' => 'form-control select2', 'multiple' => 'multiple', 'id' => 'selectall-tag_id' ]) !!}
                    <p class="help-block"></p>
                    @if($errors->has('tag_id'))
                        <p class="help-block">
                            {{ $errors->first('tag_id') }}
                        </p>
                    @endif
                </div>
                </div>
                </div>
                <div class="row">
             <div class="col-xs-6">
                <div class="form-group">
                     @if($content_page->featured_image && file_exists(public_path() . '/thumb/' . $content_page->featured_image))
                        <a href="{{ asset(env('UPLOAD_PATH').'/'.$content_page->featured_image) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/thumb/'.$content_page->featured_image) }}"></a>
                    @endif
                </div>
                    {!! Form::label('featured_image', trans('global.content-pages.fields.featured-image').'', ['class' => 'control-label']) !!}
                    {!! Form::file('featured_image', ['class' => 'form-control', 'style' => 'margin-top: 4px;']) !!}
                    {!! Form::hidden('featured_image_max_size', 10) !!}
                    {!! Form::hidden('featured_image_max_width', 1000) !!}
                    {!! Form::hidden('featured_image_max_height', 1000) !!}
                    <p class="help-block">{{trans('others.global_file_types_gallery')}}</p>
                    @if($errors->has('featured_image'))
                        <p class="help-block">
                            {{ $errors->first('featured_image') }}
                        </p>
                    @endif
                </div>
       
               
       
                <div class="col-xs-6">
                <div class="form-group">
                    {!! Form::label('excerpt', trans('global.content-pages.fields.excerpt').'', ['class' => 'control-label']) !!}
                    {!! Form::textarea('excerpt', old('excerpt'), ['class' => 'form-control ', 'placeholder' => 'Excerpt','rows'=>'4']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('excerpt'))
                        <p class="help-block">
                            {{ $errors->first('excerpt') }}
                        </p>
                    @endif
                </div>
                </div>
                </div>
                <div class="row">
                 <div class="col-xs-12">
                <div class="form-group">
                    
                    {!! Form::label('page_text', trans('global.content-pages.fields.page-text').'', ['class' => 'control-label']) !!}
                    {!! Form::textarea('page_text', old('page_text'), ['class' => 'form-control editor', 'placeholder' => 'Page Text']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('page_text'))
                        <p class="help-block">
                            {{ $errors->first('page_text') }}
                        </p>
                    @endif
                </div>
                </div>
                </div>
           
        
               
            </div>
            
        </div>
    

    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger wave-effect']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent
    
    @include('admin.common.standard-ckeditor')

    <script>
        $("#selectbtn-category_id").click(function(){
            $("#selectall-category_id > option").prop("selected","selected");
            $("#selectall-category_id").trigger("change");
        });
        $("#deselectbtn-category_id").click(function(){
            $("#selectall-category_id > option").prop("selected","");
            $("#selectall-category_id").trigger("change");
        });
    </script>

    <script>
        $("#selectbtn-tag_id").click(function(){
            $("#selectall-tag_id > option").prop("selected","selected");
            $("#selectall-tag_id").trigger("change");
        });
        $("#deselectbtn-tag_id").click(function(){
            $("#selectall-tag_id > option").prop("selected","");
            $("#selectall-tag_id").trigger("change");
        });
    </script>
@stop