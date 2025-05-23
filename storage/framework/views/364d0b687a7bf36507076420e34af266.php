<?php $request = app('Illuminate\Http\Request'); ?>


<?php $__env->startSection('content'); ?>
    <h3 class="page-title"><?php echo app('translator')->get('global.dashboard-widgets.title'); ?></h3>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('widget_create')): ?>
    <p>
        <a href="<?php echo e(route('admin.home.dashboard-widgets-add')); ?>" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;<?php echo app('translator')->get('global.app_add_new'); ?></a>
        
    </p>
    <?php endif; ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('widget_assign')): ?>
    <p>
        <div class="btn-group">
              <?php if( config('app.debug') ): ?>
              <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-check" aria-hidden="true"></i>&nbsp;<?php echo app('translator')->get('global.dashboard-widgets.assign-widgets'); ?>&nbsp;<span class="caret"></span>
              </button>
              <?php endif; ?>
              <?php
              $roles = \App\Models\Role::where('type', 'role')->where('status', 'active')->get();
              ?>
              <ul class="dropdown-menu">               
                <?php $__empty_1 = true; $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <li><a href="<?php echo e(route('admin.home.dashboard-widgets-assign', $role->id)); ?>" class="btn btn-success d-widgets"><i class="fa fa-plus"></i>&nbsp;<?php echo e($role->title); ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <?php endif; ?>        
              </ul>
        </div>
        <a href="<?php echo e(route('admin.home.dashboard-widgets-all')); ?>" class="btn btn-success"><i class="fa fa-list"></i>&nbsp;<?php echo app('translator')->get('global.app_all'); ?></a>
    </p>
    <?php endif; ?>

    

    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->get('global.app_list'); ?>
        </div>

        <div class="panel-body table-responsive">
        <table class="table table-bordered table-striped ajaxTable <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('widget_delete_multi')): ?> <?php if( request('show_deleted') != 1 ): ?> dt-select <?php endif; ?> <?php endif; ?>">
                <thead>
                    <tr>
                    <th>S.No</th> <!-- Added S.No column header -->
                        <th><?php echo app('translator')->get('global.dashboard-widgets.fields.title'); ?></th>
                        <th><?php echo app('translator')->get('global.dashboard-widgets.fields.status'); ?></th>
                        <th><?php echo app('translator')->get('global.dashboard-widgets.fields.role'); ?></th>
                        <th><?php echo app('translator')->get('global.dashboard-widgets.fields.type'); ?></th>                         
                        <?php if( ! config('app.action_buttons_hover') ): ?>
                            <th>&nbsp;</th>
                        <?php endif; ?>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?> 
<?php echo $__env->make('dashboard-parts.widgets-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/dashboard-parts/widgets.blade.php ENDPATH**/ ?>