<script>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_delete_multi')): ?>
            window.route_mass_crud_entries_destroy = '<?php echo e(route('admin.users.mass_destroy')); ?>';
        <?php endif; ?>
        $(document).ready(function () {
         <?php if( ! empty( $type ) && ! empty( $type_id ) ): ?>
            window.dtDefaultOptionsNew.ajax.url = '<?php echo route('admin.list_users.index', [ 'type' => $type, 'type_id' => $type_id ] ); ?>?show_deleted=<?php echo e(request('show_deleted')); ?>';
        <?php else: ?>
            window.dtDefaultOptionsNew.ajax.url = '<?php echo route('admin.users.index'); ?>?show_deleted=<?php echo e(request('show_deleted')); ?>';
        <?php endif; ?>
            
            window.dtDefaultOptionsNew.columns = [<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_delete_multi')): ?>
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                <?php endif; ?>{data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'role.title', name: 'role.title'},
                {data: 'status', name: 'status'},                
               //{data: 'actions', name: 'actions', searchable: false, sortable: false}
                <?php if( ! config('app.action_buttons_hover') ): ?>
            {data: 'actions', name: 'actions', searchable: false, sortable: false}
            <?php endif; ?>

            ];
            processAjaxTablesNew();
        });
    </script>


  <?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/admin/users/records-display-scripts.blade.php ENDPATH**/ ?>