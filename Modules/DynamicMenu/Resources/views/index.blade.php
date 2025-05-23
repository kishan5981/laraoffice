@extends('dynamicmenu::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>Module: {!! config('dynamicmenu.name') !!}</p>
@endsection
