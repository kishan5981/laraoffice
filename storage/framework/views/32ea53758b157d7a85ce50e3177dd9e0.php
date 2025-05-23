<?php $request = app('Illuminate\Http\Request'); ?>


<?php $__env->startSection('content'); ?>

    <h3 class="page-title"><?php echo app('translator')->get('global.roles.title'); ?></h3>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role_create')): ?>
    <p>
        <a href="<?php echo e(route('admin.roles.create')); ?>" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;<?php echo app('translator')->get('global.app_add_new'); ?></a>
        
    </p>
    <?php endif; ?>

    

    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->get('global.app_list'); ?>
        </div>

        <div class="panel-body table-responsive">
             <?php echo $__env->make('admin.roles.records-display', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?> 
    <?php echo $__env->make('admin.roles.records-display-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/admin/roles/index.blade.php ENDPATH**/ ?>