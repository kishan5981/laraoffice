<script>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('contact_delete_multi')): ?>
       <?php if( request('show_deleted') != 1 ): ?> window.route_mass_crud_entries_destroy = '<?php echo e(route('admin.contacts.mass_destroy')); ?>';
        <?php endif; ?>
    <?php endif; ?>
    $(document).ready(function () {
        <?php if( ! empty( $type ) && ! empty( $type_id ) ): ?>
            window.dtDefaultOptionsNew.ajax.url = '<?php echo route('admin.list_contacts.index', [ 'type' => $type, 'type_id' => $type_id ] ); ?>?show_deleted=<?php echo e(request('show_deleted')); ?>';
        <?php else: ?>
            window.dtDefaultOptionsNew.ajax.url = '<?php echo route('admin.contacts.index'); ?>?show_deleted=<?php echo e(request('show_deleted')); ?>';
        <?php endif; ?>
        window.dtDefaultOptionsNew.columns = [<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('contact_delete_multi')): ?>
             <?php if( request('show_deleted') != 1 ): ?>
                {data: 'massDelete', name: 'id', searchable: false, sortable: false},
              <?php endif; ?>  
            <?php endif; ?>
            {data: 'contacts.name', name: 'contacts.name'},
            
            {data: 'contact_type.title', name: 'contact_type.title', sortable: false},

            

           
            {data: 'email', name: 'email'},
            {data: 'fulladdress', name: 'fulladdress'},
            
            
            //{data: 'actions', name: 'actions', searchable: false, sortable: false}
            <?php if( ! config('app.action_buttons_hover') ): ?>
            {data: 'actions', name: 'actions', searchable: false, sortable: false}
            <?php endif; ?>
        ];
        processAjaxTablesNew();
        
    });
</script>
<script src="<?php echo e(asset('adminlte/plugins/ckeditor/ckeditor.js')); ?>"></script>
<?php echo $__env->make('admin.contacts.mail.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/admin/contacts/records-display-scripts.blade.php ENDPATH**/ ?>