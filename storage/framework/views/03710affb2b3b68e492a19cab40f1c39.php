<title><?php echo e(getSetting('site_title', 'site_settings', trans('global.global_title'))); ?></title>

<!-- Favicon-->
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="icon" href="<?php echo e(IMAGE_PATH_SETTINGS.getSetting('site_favicon', 'site_settings')); ?>" type="image/x-icon" />

<link rel="stylesheet" type="text/css" href="<?php echo e(asset('adminlte/Default-login/vendor/bootstrap/css/bootstrap.min.css')); ?>">
<!--===============================================================================================-->
 
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('adminlte/Default-login/css/default-main.css')); ?>">

<link href="<?php echo e(asset('css/cdn-styles-css/font-awesome-4.7.0/css/font-awesome.min.css')); ?>" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<!--===============================================================================================-->

<?php echo $__env->yieldContent('header_scripts'); ?><?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/partials/head-auth.blade.php ENDPATH**/ ?>