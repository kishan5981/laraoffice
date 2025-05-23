<script>
        $(document).ready(function () {
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role_delete_multi')): ?>
                window.route_mass_crud_entries_destroy = '<?php echo e(route('admin.roles.mass_destroy')); ?>';
            <?php endif; ?>
            window.dtDefaultOptions.buttons = [];
        });
</script><?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/admin/roles/records-display-scripts.blade.php ENDPATH**/ ?>