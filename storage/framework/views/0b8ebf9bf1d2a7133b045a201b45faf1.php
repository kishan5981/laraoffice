<script>
        
        window.route_mass_crud_entries_destroy = '<?php echo e(route('admin.user_actions.mass_destroy')); ?>';
        $(document).ready(function () {

            <?php if( ! empty( $type ) && ! empty( $type_id ) ): ?>
                window.dtDefaultOptionsNew.ajax.url = '<?php echo route('admin.list_user_actions.index', [ 'type' => $type, 'type_id' => $type_id ] ); ?>?show_deleted=<?php echo e(request('show_deleted')); ?>';
            <?php else: ?>
                window.dtDefaultOptionsNew.ajax = '<?php echo route('admin.user_actions.index'); ?>?show_deleted=<?php echo e(request('show_deleted')); ?>';
            <?php endif; ?>

            window.dtDefaultOptionsNew.columns = [
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'user.name', name: 'user.name'},
                    {data: 'action', name: 'action'},
                    {data: 'action_model', name: 'action_model'},
                    {data: 'action_id', name: 'action_id'},
                    //{data: 'actions', name: 'actions', searchable: false, sortable: false}
                    <?php if( ! config('app.action_buttons_hover') ): ?>
            {data: 'actions', name: 'actions', searchable: false, sortable: false}
            <?php endif; ?>
            ];
            processAjaxTablesNew();
        });
</script><?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/admin/user_actions/records-display-scripts.blade.php ENDPATH**/ ?>