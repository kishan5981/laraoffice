<?php $request = app('Illuminate\Http\Request'); ?>


<?php $__env->startSection('content'); ?>

    <h3 class="page-title"><?php echo app('translator')->get('global.master-settings.title'); ?></h3>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('master_setting_create')): ?>
    <p>
        <a href="<?php echo e(route('admin.master_settings.create')); ?>" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;<?php echo app('translator')->get('global.app_add_new'); ?></a>
        
    </p>
    <?php endif; ?>

    <p>
        <ul class="list-inline">
            <li><a href="<?php echo e(route('admin.master_settings.index')); ?>" style="<?php echo e(request('show_deleted') == 1 ? '' : 'font-weight: 700'); ?>"><?php echo app('translator')->get('global.app_all'); ?>
                   <span class="badge"> 
            
               <?php echo e(\App\Models\MasterSetting::count()); ?>

                        </span>
            </a></li> 
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('master_setting_delete')): ?>
            |
            <li><a href="<?php echo e(route('admin.master_settings.index')); ?>?show_deleted=1" style="<?php echo e(request('show_deleted') == 1 ? 'font-weight: 700' : ''); ?>"><?php echo app('translator')->get('global.app_trash'); ?>

                 <span class="badge"> 
           
               <?php echo e(\App\Models\MasterSetting::onlyTrashed()->count()); ?>

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
            <table class="table table-bordered table-striped ajaxTable <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('master_setting_delete_multi')): ?> <?php if( request('show_deleted') != 1 ): ?> dt-select <?php endif; ?> <?php endif; ?>">
                <thead>
                    <tr>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('master_setting_delete_multi')): ?>
                            <?php if( request('show_deleted') != 1 ): ?><th style="text-align:center;"><input type="checkbox" id="select-all" /></th><?php endif; ?>
                        <?php endif; ?>

                        <th><?php echo app('translator')->get('global.master-settings.fields.module'); ?></th>
                        <th><?php echo app('translator')->get('global.master-settings.fields.key'); ?></th>
                        <th><?php echo app('translator')->get('custom.settings.moduletype'); ?></th>
                        <th><?php echo app('translator')->get('global.master-settings.fields.description'); ?></th>
                        <?php if( ! config('app.action_buttons_hover') ): ?>
                <?php if( request('show_deleted') == 1 ): ?>
                <th>&nbsp;</th>
                <?php else: ?>
                <th>&nbsp;</th>
                <?php endif; ?>
            <?php endif; ?>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?> 
    <script>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('master_setting_delete_multi')): ?>
            <?php if( request('show_deleted') != 1 ): ?> window.route_mass_crud_entries_destroy = '<?php echo e(route('admin.master_settings.mass_destroy')); ?>'; <?php endif; ?>
        <?php endif; ?>
        $(document).ready(function () {
            window.dtDefaultOptions.ajax = '<?php echo route('admin.master_settings.index'); ?>?show_deleted=<?php echo e(request('show_deleted')); ?>';
            window.dtDefaultOptions.columns = [<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('master_setting_delete_multi')): ?>
                <?php if( request('show_deleted') != 1 ): ?>
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                <?php endif; ?>
                <?php endif; ?>{data: 'module', name: 'module'},
                {data: 'key', name: 'key'},
                {data: 'moduletype', name: 'moduletype'},
                {data: 'description', name: 'description'},
                
                //{data: 'actions', name: 'actions', searchable: false, sortable: false}
                <?php if( ! config('app.action_buttons_hover') ): ?>
            {data: 'actions', name: 'actions', searchable: false, sortable: false}
            <?php endif; ?>
            ];
            processAjaxTables();
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/admin/master_settings/index.blade.php ENDPATH**/ ?>