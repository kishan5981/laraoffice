@extends('layouts.app')

@section('content')
<div class="col-lg-12">
        <ol class="breadcrumb">
            <li><a href="{{PREFIX}}">@lang('global.payments.title')</a></li>
            <li>List</li>
        </ol>
    </div>
    <h3 class="page-title">@lang('global.payments.title')</h3>
    
    <p>
        {{ trans('global.app_custom_controller_index') }} 
    </p>
@stop