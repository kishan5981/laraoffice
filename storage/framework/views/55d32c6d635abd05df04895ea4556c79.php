<?php $request = app('Illuminate\Http\Request'); ?>


<?php $__env->startSection('content'); ?>

<h3 class="page-title"><?php echo app('translator')->get('global.invoices.title'); ?></h3>
    <p>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('invoice_create')): ?>
        <a href="<?php echo e(route('admin.invoices.create')); ?>" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;<?php echo app('translator')->get('global.app_add_new'); ?></a>
    
    <?php echo $__env->make('admin.invoices.canvas.canvas', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    </p>
    
    <?php echo $__env->make('admin.invoices.filters', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php endif; ?>

    <p>
        <ul class="list-inline">
            <li><a href="<?php echo e(route('admin.invoices.index')); ?>" style="<?php echo e(request('show_deleted') == 1 ? '' : 'font-weight: 700'); ?>">
            <?php echo app('translator')->get('global.app_all'); ?>
            <span class="badge"><?php echo e(\App\Models\Invoice::count()); ?></span>
            </a></li>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('invoice_delete')): ?>  
                |
                <li><a href="<?php echo e(route('admin.invoices.index')); ?>?show_deleted=1" style="<?php echo e(request('show_deleted') == 1 ? 'font-weight: 700' : ''); ?>"><?php echo app('translator')->get('global.app_trash'); ?>
                <span class="badge"> <?php echo e(\App\Models\Invoice::onlyTrashed()->count()); ?></span>
                </a></li>
            <?php endif; ?>
        </ul>
    </p>
    

    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->get('global.app_list'); ?>
        </div>

        <div class="panel-body table-responsive">
            <?php echo $__env->make('admin.invoices.records-display', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?> 
    <?php echo $__env->make('admin.invoices.records-display-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/admin/invoices/index.blade.php ENDPATH**/ ?>