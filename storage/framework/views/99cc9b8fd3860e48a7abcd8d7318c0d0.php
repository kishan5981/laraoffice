<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Business Tips" content="BUSINESS STARTUP">


    <link href="<?php echo e(asset('adminlte/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link rel="stylesheet"
    href="<?php echo e(asset('adminlte/css')); ?>/select2.min.css"/>
    <link href="<?php echo e(asset('adminlte/css/AdminLTE.min.css')); ?>" rel="stylesheet">
    <!-- Font Awesome -->
<link href="<?php echo e(asset('css/cdn-styles-css/font-awesome-4.7.0/css/font-awesome.min.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(asset('css/install.css')); ?>" rel="stylesheet">

    <?php echo $__env->yieldContent('header_scripts'); ?>
</head>

<body class="login-screen" ng-app="vehicle_booking" >
    <!-- PRELOADER -->
   <!-- <div id="preloader">
        <div id="status">
            <div class="mul8circ1"></div>
            <div class="mul8circ2"></div>
        </div>
    </div>-->
    <!-- /PRELOADER -->

<?php echo $__env->yieldContent('content'); ?>
	
       <!-- /#wrapper -->
		<!-- jQuery -->
    <script src="<?php echo e(asset('js/cdn-js-files/jquery-1.11.3.min.js')); ?>"></script>
    <script src="<?php echo e(asset('adminlte/js')); ?>/bootstrap.min.js"></script>
    <script src="<?php echo e(asset('adminlte/js')); ?>/select2.full.min.js"></script>
    <script src="<?php echo e(asset('js/cdn-js-files/jquery.validate.js')); ?>"></script>
    <script src="<?php echo e(asset('js/sweetalert-dev.js')); ?>"></script>
		<?php echo $__env->make('errors.formMessages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<?php echo $__env->yieldContent('footer_scripts'); ?>
</body>

</html><?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/install/install-layout.blade.php ENDPATH**/ ?>