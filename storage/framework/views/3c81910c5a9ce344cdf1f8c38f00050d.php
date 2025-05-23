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
<html lang="<?php echo e($lang); ?>" dir="<?php echo e($direction); ?>">

<head>
    <?php echo $__env->make('partials.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- PWA Support -->
    <link rel="manifest" href="/laraoffice/public/manifest.json">
<link rel="apple-touch-icon" href="/laraoffice/public/icons/icon-192x192.png">
<meta name="theme-color" content="#0d6efd">
    <link rel="icon" href="/laraoffice/public/uploads/settings/yo9alUTR5nOsVNp.png" type="image/x-icon">
</head>

<body class="hold-transition <?php echo e($color_theme); ?> sidebar-mini" ng-app="academia">

<span id="hdata"
      data-df="<?php echo e(config('app.date_format_moment')); ?>"
      data-curr="<?php echo e(getDefaultCurrency()); ?>"
      data-currency_id="<?php echo e(getDefaultCurrency('id')); ?>"></span>

<div id="wrapper">
    <?php if(empty($topbar)): ?>
        <?php echo $__env->make('partials.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php elseif($topbar === 'yes'): ?>
        <?php echo $__env->make('partials.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <?php
    $style = '';
    $columns = 6;
    ?>

    <?php if(empty($sidebar)): ?>
        <?php echo $__env->make('partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php elseif($sidebar === 'yes'): ?>
        <?php echo $__env->make('partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
        <?php $style = ' style="margin-left:0px;"'; ?>
    <?php endif; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" <?php echo $style; ?>>
        <!-- Main content -->
        <section class="content">
            <?php if(isset($siteTitle)): ?>
                <h3 class="page-title">
                    <?php echo e($siteTitle); ?>

                </h3>
            <?php endif; ?>

            <div class="row">
                <div class="col-md-12">
                    <?php
                    $parts = getController();
                    ?>

                    <?php echo e(Breadcrumbs::render($parts['controller'] . '.' . $parts['action'])); ?>


                    <?php if(env('DEMO_MODE')): ?>
                        <div class="alert alert-info demo-alert col-md-12">
                            &nbsp;&nbsp;&nbsp;<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong><?php echo app('translator')->get('global.info'); ?>!</strong> CRUD <?php echo app('translator')->get('global.operations_disabled'); ?>
                        </div>
                    <?php endif; ?>

                    <?php if(Session::has('message')): ?>
                        <?php
                        $message_type = getSetting('message_type', 'site_settings', 'onpage');
                        if ($message_type === 'onpage') {
                        ?>
                        <div class="alert alert-<?php echo e(Session::get('status', 'info')); ?>">
                            &nbsp;&nbsp;&nbsp;<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <?php echo e(Session::get('message')); ?>

                        </div>
                        <?php } ?>
                    <?php endif; ?>

                    <?php if($errors->count() > 0 && ! in_array($parts['controller'], ['TicketsController', 'StatusesController', 'PrioritiesController', 'AgentsController', 'ConfigurationsController', 'CategoriesController', 'AdministratorsController'])): ?>
                        <div class="alert alert-danger">
                            <ul class="list-unstyled">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <?php echo $__env->yieldContent('content'); ?>
                </div>
            </div>
        </section>
    </div>
</div>

<?php echo Form::open(['route' => 'logout', 'style' => 'display:none;', 'id' => 'logout']); ?>

<button type="submit">Logout</button>
<?php echo Form::close(); ?>


<?php echo $__env->make('partials.javascripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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

<?php echo getSetting('google_analytics', 'seo_settings'); ?>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/layouts/app.blade.php ENDPATH**/ ?>