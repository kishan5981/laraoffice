<?php $request = app('Illuminate\Http\Request'); ?>


<?php $__env->startSection('content'); ?>
<div class="row">
   
</div>
    <h3 class="page-title"><?php echo app('translator')->get('global.client-projects.title'); ?></h3>
    <p>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('client_project_create')): ?>
        <a href="<?php echo e(route('admin.client_projects.create')); ?>" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;<?php echo app('translator')->get('global.app_add_new'); ?></a>
    <?php endif; ?>
   <?php echo $__env->make('admin.client_projects.canvas.canvas', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
        
        
    </p>

    <?php echo $__env->make('admin.client_projects.filters', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <p>
        <ul class="list-inline">
            <li><a href="<?php echo e(route('admin.client_projects.index')); ?>" style="<?php echo e(request('show_deleted') == 1 ? '' : '    font-weight: 700'); ?>"><?php echo app('translator')->get('global.app_all'); ?>
                 <?php
                   $project = \App\Models\ClientProject::query();
                ?>
                <?php if( isEmployee() ): ?>
                <?php
                $emp_count = $project->whereHas("assigned_to",
                   function ($query) {
                       $query->where('id', Auth::id());
                   })->count();
                ?>
                <span class="badge"> <?php echo e($emp_count); ?></span>
                <?php elseif( isProjectManager() ): ?>
                <span class="badge"> <?php echo e(\App\Models\ClientProject::count()); ?></span>
                <?php else: ?>
                <span class="badge"> <?php echo e(\App\Models\ClientProject::count()); ?></span>
                <?php endif; ?>
            </a></li>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('client_project_delete')): ?>
             |
            <li><a href="<?php echo e(route('admin.client_projects.index')); ?>?show_deleted=1" style="<?php echo e(request('show_deleted') == 1 ? 'font-weight: 700' : ''); ?>"><?php echo app('translator')->get('global.app_trash'); ?>

                 <span class="badge"><?php echo e(\App\Models\ClientProject::onlyTrashed()->count()); ?></span>

            </a></li>
            <?php endif; ?>
        </ul>
    </p>
    

    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->get('global.app_list'); ?>
        </div>

        <div class="panel-body table-responsive">
            <?php echo $__env->make('admin.client_projects.records-display', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?> 
    <?php echo $__env->make('admin.client_projects.records-display-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/admin/client_projects/index.blade.php ENDPATH**/ ?>