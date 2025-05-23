<script>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('currency_delete_multi')): ?>
            <?php if( request('show_deleted') != 1 ): ?> window.route_mass_crud_entries_destroy = '<?php echo e(route('admin.currencies.mass_destroy')); ?>'; <?php endif; ?>
        <?php endif; ?>
        $(document).ready(function () {
            window.dtDefaultOptions.buttons = [];
            window.dtDefaultOptions.ajax = '<?php echo route('admin.currencies.index'); ?>?show_deleted=<?php echo e(request('show_deleted')); ?>';
            window.dtDefaultOptions.columns = [<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('currency_delete_multi')): ?>
                <?php if( request('show_deleted') != 1 ): ?>
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                <?php endif; ?>
                <?php endif; ?>{data: 'name', name: 'name'},
                {data: 'symbol', name: 'symbol'},
                {data: 'code', name: 'code'},
                {data: 'rate', name: 'rate'},
                {data: 'status', name: 'status'},
                {data: 'is_default', name: 'is_default'},
                
                //{data: 'actions', name: 'actions', searchable: false, sortable: false}
                <?php if( ! config('app.action_buttons_hover') ): ?>
            {data: 'actions', name: 'actions', searchable: false, sortable: false}
            <?php endif; ?>
            ];
            processAjaxTables();
        });
    </script><?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/admin/currencies/display-records-scripts.blade.php ENDPATH**/ ?>