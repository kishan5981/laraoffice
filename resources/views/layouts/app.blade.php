<?php
$direction = 'ltr';
if (\Cookie::get('direction')) {
    $direction = \Cookie::get('direction');
}

$lang = 'en';
if (\Cookie::get('language')) {
    $lang = \Cookie::get('language');
}

$theme = 'default';
if (\Cookie::get('theme')) {
    $theme = \Cookie::get('theme');
}

$color_theme = 'skin-blue';
if (\Cookie::get('color_skin')) {
    $color_theme = \Cookie::get('color_skin');
}
?>
<!DOCTYPE html>
<html lang="{{ $lang }}" dir="{{ $direction }}">

<head>
    @include('partials.head')

    <!-- PWA Support -->
    <link rel="manifest" href="/laraoffice/public/manifest.json">
<link rel="apple-touch-icon" href="/laraoffice/public/icons/icon-192x192.png">
<meta name="theme-color" content="#0d6efd">
    <link rel="icon" href="/laraoffice/public/uploads/settings/yo9alUTR5nOsVNp.png" type="image/x-icon">
</head>

<body class="hold-transition {{ $color_theme }} sidebar-mini" ng-app="academia">

<span id="hdata"
      data-df="{{ config('app.date_format_moment') }}"
      data-curr="{{ getDefaultCurrency() }}"
      data-currency_id="{{ getDefaultCurrency('id') }}"></span>

<div id="wrapper">
    @if(empty($topbar))
        @include('partials.topbar')
    @elseif($topbar === 'yes')
        @include('partials.topbar')
    @endif

    <?php
    $style = '';
    $columns = 6;
    ?>

    @if(empty($sidebar))
        @include('partials.sidebar')
    @elseif($sidebar === 'yes')
        @include('partials.sidebar')
    @else
        <?php $style = ' style="margin-left:0px;"'; ?>
    @endif

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" {!! $style !!}>
        <!-- Main content -->
        <section class="content">
            @if(isset($siteTitle))
                <h3 class="page-title">
                    {{ $siteTitle }}
                </h3>
            @endif

            <div class="row">
                <div class="col-md-12">
                    <?php
                    $parts = getController();
                    ?>

                    {{ Breadcrumbs::render($parts['controller'] . '.' . $parts['action']) }}

                    @if(env('DEMO_MODE'))
                        <div class="alert alert-info demo-alert col-md-12">
                            &nbsp;&nbsp;&nbsp;<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>@lang('global.info')!</strong> CRUD @lang('global.operations_disabled')
                        </div>
                    @endif

                    @if(Session::has('message'))
                        <?php
                        $message_type = getSetting('message_type', 'site_settings', 'onpage');
                        if ($message_type === 'onpage') {
                        ?>
                        <div class="alert alert-{{ Session::get('status', 'info') }}">
                            &nbsp;&nbsp;&nbsp;<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ Session::get('message') }}
                        </div>
                        <?php } ?>
                    @endif

                    @if($errors->count() > 0 && ! in_array($parts['controller'], ['TicketsController', 'StatusesController', 'PrioritiesController', 'AgentsController', 'ConfigurationsController', 'CategoriesController', 'AdministratorsController']))
                        <div class="alert alert-danger">
                            <ul class="list-unstyled">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @yield('content')
                </div>
            </div>
        </section>
    </div>
</div>

{!! Form::open(['route' => 'logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
<button type="submit">Logout</button>
{!! Form::close() !!}

@include('partials.javascripts')

<!-- Service Worker for PWA -->
<script>
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('/sw.js').then(function (registration) {
            console.log('ServiceWorker registered: ', registration);
        }).catch(function (error) {
            console.log('ServiceWorker registration failed: ', error);
        });
    }
</script>

{!! getSetting('google_analytics', 'seo_settings') !!}
</body>
</html>
