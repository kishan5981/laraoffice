<?php $request = app('Illuminate\Http\Request'); ?>


<?php $__env->startSection('content'); ?>

    <h3 class="page-title"><?php echo app('translator')->get('global.permissions.title'); ?></h3>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission_create')): ?>
    <p>
        <a href="<?php echo e(route('admin.permissions.create')); ?>" class="btn btn-success"><?php echo app('translator')->get('global.app_add_new'); ?></a>        
    </p>
    <?php endif; ?>

    

    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->get('global.app_list'); ?>
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped ajaxTable <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission_delete_multi')): ?> dt-select <?php endif; ?>">
                <thead>
                    <tr>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission_delete_multi')): ?>
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <?php endif; ?>

                        <th><?php echo app('translator')->get('global.permissions.fields.title'); ?></th>
                                                <!--<th>&nbsp;</th>-->
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
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission_delete_multi')): ?>
            window.route_mass_crud_entries_destroy = '<?php echo e(route('admin.permissions.mass_destroy')); ?>';
        <?php endif; ?>
        $(document).ready(function () {
            window.dtDefaultOptions.ajax = '<?php echo route('admin.permissions.index'); ?>';
            window.dtDefaultOptions.columns = [<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission_delete_multi')): ?>
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                <?php endif; ?>{data: 'title', name: 'title'},
                
                //{data: 'actions', name: 'actions', searchable: false, sortable: false}
                <?php if( ! config('app.action_buttons_hover') ): ?>
            {data: 'actions', name: 'actions', searchable: false, sortable: false}
            <?php endif; ?>
            ];
            processAjaxTables();
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/admin/permissions/index.blade.php ENDPATH**/ ?>