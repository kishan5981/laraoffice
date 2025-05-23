<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('partials.head-auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body class="page-header-fixed">

    <div style="margin-top: 10%;"></div>

<section class="login-block">
        <?php echo $__env->yieldContent('content'); ?>
</section>

    <div class="scroll-to-top"
         style="display: none;">
        <i class="fa fa-arrow-up"></i>
    </div>

    <?php echo $__env->make('partials.javascripts-auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>
</html><?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/layouts/auth.blade.php ENDPATH**/ ?>