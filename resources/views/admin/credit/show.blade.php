@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.articles.title')</h3>
	<div class="panel panel-default">
        <div class="panel-heading">{{ ucfirst($article->title) }} <span style="float:right;"><i class="fa fa-clock-o">{{$article->created_at->diffForHumans()}}</i></div>

        <div class="panel-body table-responsive">
            <div class="row">
                                
                  @php
                  $cols = 8;

                    if ( $article->category_id->count() ) {
                        $otherarticles = \App\Models\Article::where('id', '!=', $article->id)->whereHas("category_id", function ($query) use( $article ) {
                        $query->where('id', $article->category_id->pluck('id')->toArray());
                        })->limit(10)->orderBy('id', 'desc');
                        if ( $otherarticles->count() == 0 ) {
                            $cols = 12;
                        }
                    } else {
                        $cols = 12;
                    }
                  @endphp
                  <div class="col-md-{{$cols}}">
                     @if($article->featured_image)
                     <div class="text-center col-md-3 well-note"><img src="{{ asset(env('UPLOAD_PATH').'/thumb/' . $article->featured_image) }}" style="width:100px;height:100px;"/></div>
                     @endif
                     <div class="col-md-9 well-note">
                      @if( $article->page_text )
                          {!!$article->page_text!!}
                      @else
                          {!!$article->excerpt!!}
                      @endif
                      </div>
                     <small class="form-text text-muted">
                        @if($article->category_id->count())
                        <div class="col-md-4">                        
                        <i class="fa fa-folder"></i><span> @lang('custom.articles.category')<br/></span>

                        @foreach ($article->category_id as $singleCategoryId)
                            <a href="{{route('admin.articles.search', ['type' => 'categories', 'catid' => $singleCategoryId->id] )}}"><span class="label label-info label-many">{{ $singleCategoryId->title }}</span></a>
                        @endforeach                        
                        </div>
                        
                        @endif                       
                        
                        

                        @if($article->tag_id->count())
                        <br/>
                        <div class="col-md-4"><i class="fa fa-tags"></i><span> @lang('custom.articles.tag')<br/></span>
                        @foreach ($article->tag_id as $singleCategoryId)
                            <a href="{{route('admin.articles.search', ['type' => 'tags', 'catid' => $singleCategoryId->id] )}}"><span class="label label-info label-many">{{ $singleCategoryId->title }}</span></a>
                        @endforeach
                        </div>
                        @endif

                    </small>
                  </div>
                  @if( $cols == 8 )
                  <div class="col-md-4">
                     <h4>@lang('custom.articles.related-articles')</h4>
                     <hr>
                     <ul>
                        @foreach( $otherarticles->get() as $oarticle)
                        <li>
                        <a style="font-weight: bold;" href="{{route('admin.articles.show', $oarticle->id)}}">{{$oarticle->title}}</a>                       
                        <p class="form-text text-muted well-note" style="margin: 10px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">
                            @if( $oarticle->excerpt )
                                {!!$oarticle->excerpt!!}
                            @else
                                {!!$oarticle->page_text!!}
                            @endif
                        </p>

                        <small class="form-text text-muted">{{$oarticle->created_at->diffForHumans()}}</small>                   
                        </li>
                        <hr>
                        @endforeach
                    </ul>
                     
                  </div>
                  @endif
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.articles.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop

@section('javascript')
    @parent
    
    @include('admin.common.standard-ckeditor')

@stop
