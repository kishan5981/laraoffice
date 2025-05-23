<script>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('department_delete_multi')): ?>
            <?php if( request('show_deleted') != 1 ): ?> window.route_mass_crud_entries_destroy = '<?php echo e(route('admin.departments.mass_destroy')); ?>'; <?php endif; ?>
        <?php endif; ?>
        $(document).ready(function () {
            window.dtDefaultOptions.buttons = [];
            window.dtDefaultOptionsNew.ajax.url = '<?php echo route('admin.departments.index'); ?>?show_deleted=<?php echo e(request('show_deleted')); ?>';
            window.dtDefaultOptionsNew.columns = [<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('department_delete_multi')): ?>
                <?php if( request('show_deleted') != 1 ): ?>
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                <?php endif; ?>
                <?php endif; ?>{data: 'name', name: 'name'},
                {data: 'created_by.name', name: 'created_by.name'},
                
                //{data: 'actions', name: 'actions', searchable: false, sortable: false}
                <?php if( ! config('app.action_buttons_hover') ): ?>
            {data: 'actions', name: 'actions', searchable: false, sortable: false}
            <?php endif; ?>
            ];
            processAjaxTablesNew();
        });
</script><?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/admin/departments/records-display-scripts.blade.php ENDPATH**/ ?>