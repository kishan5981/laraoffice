<script>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('client_project_delete_multi')): ?>
        <?php if( request('show_deleted') != 1 ): ?> window.route_mass_crud_entries_destroy = '<?php echo e(route('admin.client_projects.mass_destroy')); ?>'; <?php endif; ?>
    <?php endif; ?>
    $(document).ready(function () {
        <?php if( ! empty( $type ) && ! empty( $type_id ) ): ?>
            window.dtDefaultOptionsNew.ajax.url = '<?php echo route('admin.list_client_projects.index', [ 'type' => $type, 'type_id' => $type_id ]); ?>?show_deleted=<?php echo e(request('show_deleted')); ?>';
        <?php else: ?>
            window.dtDefaultOptionsNew.ajax.url = '<?php echo route('admin.client_projects.index'); ?>?show_deleted=<?php echo e(request('show_deleted')); ?>';
        <?php endif; ?>
        window.dtDefaultOptionsNew.columns = [<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('client_project_delete_multi')): ?>
            <?php if( request('show_deleted') != 1 ): ?>
                {data: 'massDelete', name: 'id', searchable: false, sortable: false},
            <?php endif; ?>
            <?php endif; ?>{data: 'title', name: 'title'},
            {data: 'client.first_name', name: 'client.first_name'},
            {data: 'assigned_to.name', name: 'assigned_to.name', sortable: false},
            {data: 'start_date', name: 'start_date'},
            {data: 'due_date', name: 'due_date'},
            {data: 'priority', name: 'priority'},
            {data: 'status.name', name: 'status.name'}, 
            {data: 'currency.name', name: 'currency.name'},           
            //{data: 'actions', name: 'actions', searchable: false, sortable: false}
            <?php if( ! config('app.action_buttons_hover') ): ?>
            {data: 'actions', name: 'actions', searchable: false, sortable: false}
            <?php endif; ?>
        ];
        processAjaxTablesNew();
    });
</script><?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/admin/client_projects/records-display-scripts.blade.php ENDPATH**/ ?>