<script>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('invoice_delete_multi')): ?>
        <?php if( request('show_deleted') != 1 ): ?> window.route_mass_crud_entries_destroy = '<?php echo e(route('admin.invoices.mass_destroy')); ?>'; 
        <?php endif; ?>
    <?php endif; ?>
    $(document).ready(function () {
        <?php if( ! empty( $type ) && ! empty( $type_id ) ): ?>
            window.dtDefaultOptionsNew.ajax.url = '<?php echo route('admin.list_invoices.index', [ 'type' => $type, 'type_id' => $type_id ]); ?>?show_deleted=<?php echo e(request('show_deleted')); ?>';
        <?php else: ?>
            window.dtDefaultOptionsNew.ajax.url = '<?php echo route('admin.invoices.index'); ?>?show_deleted=<?php echo e(request('show_deleted')); ?>';
        <?php endif; ?>
        window.dtDefaultOptionsNew.columns = [<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('invoice_delete_multi')): ?>
            <?php if( request('show_deleted') != 1 ): ?>
                {data: 'massDelete', name: 'id', searchable: false, sortable: false},
            <?php endif; ?>
            <?php endif; ?>
            {data: 'invoice_no', name: 'invoice_no'},
            {data: 'customer.first_name', name: 'customer.first_name'},
            {data: 'paymentstatus', name: 'paymentstatus'},
            {data: 'title', name: 'title'},
            
            {data: 'status', name: 'status'},
            {data: 'invoice_date', name: 'invoice_date'},
            {data: 'invoice_due_date', name: 'invoice_due_date'},
            {data: 'amount', name: 'amount'},
            <?php if( ! config('app.action_buttons_hover') ): ?>
            {data: 'actions', name: 'actions', searchable: false, sortable: false}
            <?php endif; ?>
        ];
        processAjaxTablesNew();
    });
</script><?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/admin/invoices/records-display-scripts.blade.php ENDPATH**/ ?>