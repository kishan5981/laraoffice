<?php $request = app('Illuminate\Http\Request'); ?>


<?php $__env->startSection('content'); ?>

    <h3 class="page-title"><?php echo app('translator')->get('global.currencies.title'); ?></h3>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('currency_create')): ?>
    <p>
        <a href="<?php echo e(route('admin.currencies.create')); ?>" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;<?php echo app('translator')->get('global.app_add_new'); ?></a>
			
    </p>
    <?php endif; ?>

    <p>
        <ul class="list-inline">
            <li><a href="<?php echo e(route('admin.currencies.index')); ?>" style="<?php echo e(request('show_deleted') == 1 ? '' : 'font-weight: 700'); ?>"><?php echo app('translator')->get('global.app_all'); ?>
                  <span class="badge"><?php echo e(\App\Models\Currency::count()); ?></span>

            </a></li> 
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('currency_delete')): ?>
            |
            <li><a href="<?php echo e(route('admin.currencies.index')); ?>?show_deleted=1" style="<?php echo e(request('show_deleted') == 1 ? 'font-weight: 700' : ''); ?>"><?php echo app('translator')->get('global.app_trash'); ?>

                   <span class="badge"> <?php echo e(\App\Models\Currency::onlyTrashed()->count()); ?></span>
            </a></li>
            <?php endif; ?>
        </ul>
    </p>
    

    <div class="panel panel-default">
        <p style="padding: 10px;"><?php echo app('translator')->get('custom.currencies.currency_layer_message', ['url' => '<a href="https://currencylayer.com" target="_blank">https://currencylayer.com</a>', 'settings_url' => '<a href="'.url('admin/mastersettings/settings/view/currency-settings').'" target="_blank">here</a>']); ?>

        <a href="<?php echo e(route('admin.currency.update_rates')); ?>" class="btn btn-xs btn-success">Update currency rates</a>
        
        </p>
        <div class="panel-heading">
            <?php echo app('translator')->get('global.app_list'); ?>
        </div>

        <div class="panel-body table-responsive">
          <?php echo $__env->make('admin.currencies.display-records', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?> 
 <?php echo $__env->make('admin.currencies.display-records-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/admin/currencies/index.blade.php ENDPATH**/ ?>