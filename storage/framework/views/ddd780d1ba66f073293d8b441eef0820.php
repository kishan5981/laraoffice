<?php $request = app('Illuminate\Http\Request'); ?>


<?php $__env->startSection('content'); ?>

    <h3 class="page-title"><?php echo app('translator')->get('global.dynamic-options.title'); ?></h3>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('dynamic_option_create')): ?>
    <p>
        <a href="<?php echo e(route('admin.dynamic_options.create')); ?>" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;<?php echo app('translator')->get('global.app_add_new'); ?></a>        
    </p>
    <?php endif; ?>

    <p>
        <ul class="list-inline">
            <li><a href="<?php echo e(route('admin.dynamic_options.index')); ?>" style="<?php echo e(request('show_deleted') == 1 ? '' : 'font-weight: 700'); ?>"><?php echo app('translator')->get('global.app_all'); ?>
                 <span class="badge"> <?php echo e(\Modules\DynamicOptions\Entities\DynamicOption::count()); ?></span>

            </a></li> 
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('dynamic_option_delete')): ?>
            |
            <li><a href="<?php echo e(route('admin.dynamic_options.index')); ?>?show_deleted=1" style="<?php echo e(request('show_deleted') == 1 ? 'font-weight: 700' : ''); ?>"><?php echo app('translator')->get('global.app_trash'); ?>
                 <span class="badge">
               <?php echo e(\Modules\DynamicOptions\Entities\DynamicOption::onlyTrashed()->count()); ?></span>

            </a></li>
            <?php endif; ?>
        </ul>
    </p>
    

    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->get('global.app_list'); ?>
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped ajaxTable <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('dynamic_option_delete_multi')): ?> <?php if( request('show_deleted') != 1 ): ?> dt-select <?php endif; ?> <?php endif; ?>">
                <thead>
                    <tr>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('dynamic_option_delete_multi')): ?>
                            <?php if( request('show_deleted') != 1 ): ?><th style="text-align:center;"><input type="checkbox" id="select-all" /></th><?php endif; ?>
                        <?php endif; ?>

                        <th><?php echo app('translator')->get('global.recurring-periods.fields.title'); ?></th>
                        <th><?php echo app('translator')->get('global.dynamic-options.fields.module'); ?></th>
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
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('dynamic_option_delete_multi')): ?>
            <?php if( request('show_deleted') != 1 ): ?> window.route_mass_crud_entries_destroy = '<?php echo e(route('admin.dynamic_options.mass_destroy')); ?>'; <?php endif; ?>
        <?php endif; ?>
        $(document).ready(function () {
            window.dtDefaultOptions.buttons = [];
            window.dtDefaultOptions.ajax = '<?php echo route('admin.dynamic_options.index'); ?>?show_deleted=<?php echo e(request('show_deleted')); ?>';
            window.dtDefaultOptions.columns = [<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('dynamic_option_delete_multi')): ?>
                <?php if( request('show_deleted') != 1 ): ?>
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                <?php endif; ?>
                <?php endif; ?>{data: 'title', name: 'title'},
                {data: 'module', name: 'module'},
                
                //{data: 'actions', name: 'actions', searchable: false, sortable: false}
                <?php if( ! config('app.action_buttons_hover') ): ?>
            {data: 'actions', name: 'actions', searchable: false, sortable: false}
            <?php endif; ?>
            ];
            processAjaxTables();
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laraoffice\Modules\DynamicOptions\Providers/../Resources/views/admin/dynamic_options/index.blade.php ENDPATH**/ ?>