<?php $request = app('Illuminate\Http\Request'); ?>


<?php $__env->startSection('content'); ?>

    <h3 class="page-title"><?php echo app('translator')->get('global.departments.title'); ?></h3>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('department_create')): ?>
    <p>
        <a href="<?php echo e(route('admin.departments.create')); ?>" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;<?php echo app('translator')->get('global.app_add_new'); ?></a>
        <a href="#" class="btn btn-warning" style="margin-left:5px;" data-toggle="modal" data-target="#myModal"><i class="fa fa-file-o"></i>&nbsp;<?php echo app('translator')->get('global.app_csvImport'); ?></a>
        <?php echo $__env->make('csvImport.modal', ['model' => 'Department', 'csvtemplatepath' => 'departments.csv','duplicatecheck' => 'name'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
        <?php if(!is_null(Auth::getUser()->role_id) && config('global.can_see_all_records_role_id') == Auth::getUser()->role_id): ?>
            <?php if(Session::get('Department.filter', 'all') == 'my'): ?>
                <a href="?filter=all" class="btn btn-default">Show all records</a>
            <?php else: ?>
                <a href="?filter=my" class="btn btn-default">Filter my records</a>
            <?php endif; ?>
        <?php endif; ?>
    </p>
    <?php endif; ?>

    <p>
        <ul class="list-inline">
            <li><a href="<?php echo e(route('admin.departments.index')); ?>" style="<?php echo e(request('show_deleted') == 1 ? '' : 'font-weight: 700'); ?>"><?php echo app('translator')->get('global.app_all'); ?>
             <span class="badge"> 
           
               <?php echo e(\App\Models\Department::count()); ?>

                       </span>

            </a></li> 
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('department_delete')): ?>
            |
            <li><a href="<?php echo e(route('admin.departments.index')); ?>?show_deleted=1" style="<?php echo e(request('show_deleted') == 1 ? 'font-weight: 700' : ''); ?>"><?php echo app('translator')->get('global.app_trash'); ?>

                 <span class="badge"> 
            
               <?php echo e(\App\Models\Department::onlyTrashed()->count()); ?>

            
            </span>

            </a></li>
            <?php endif; ?>
        </ul>
    </p>
    

    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->get('global.app_list'); ?>
        </div>

        <div class="panel-body table-responsive">
          <?php echo $__env->make('admin.departments.records-display', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?> 
    <?php echo $__env->make('admin.departments.records-display-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/admin/departments/index.blade.php ENDPATH**/ ?>