<?php $request = app('Illuminate\Http\Request'); ?>


<?php $__env->startSection('content'); ?>

    <h3 class="page-title"><?php echo app('translator')->get('global.user-actions.title'); ?></h3>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_action_create')): ?>
    <p>
        
        
    </p>
    <?php endif; ?>

    

    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->get('global.app_list'); ?>
        </div>

        <div class="panel-body table-responsive">
            <?php echo $__env->make('admin.user_actions.records-display', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?> 
    <?php echo $__env->make('admin.user_actions.records-display-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/admin/user_actions/index.blade.php ENDPATH**/ ?>