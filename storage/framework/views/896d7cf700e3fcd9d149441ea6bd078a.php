<table class="table table-bordered table-striped ajaxTable <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('client_project_delete_multi')): ?> <?php if( request('show_deleted') != 1 ): ?> dt-select <?php endif; ?> <?php endif; ?>">
    <thead>
        <tr>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('client_project_delete_multi')): ?>
                <?php if( request('show_deleted') != 1 ): ?><th style="text-align:center;"><input type="checkbox" id="select-all" /></th><?php endif; ?>
            <?php endif; ?>

            <th><?php echo app('translator')->get('global.client-projects.fields.title'); ?></th>
            <th><?php echo app('translator')->get('global.client-projects.fields.client'); ?></th>
            <th><?php echo app('translator')->get('global.client-projects.fields.assigned-to'); ?></th>
            <th><?php echo app('translator')->get('global.client-projects.fields.start-date'); ?></th>
            <th><?php echo app('translator')->get('global.client-projects.fields.due-date'); ?></th>
            <th><?php echo app('translator')->get('global.client-projects.fields.priority'); ?></th>
            <th><?php echo app('translator')->get('global.client-projects.fields.status'); ?></th>
            <th><?php echo app('translator')->get('global.purchase-orders.fields.currency'); ?></th>
            
            <?php if( ! config('app.action_buttons_hover') ): ?>
                <?php if( request('show_deleted') == 1 ): ?>
                <th>&nbsp;</th>
                <?php else: ?>
                <th>&nbsp;</th>
                <?php endif; ?>
            <?php endif; ?>
        </tr>
    </thead>
</table><?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/admin/client_projects/records-display.blade.php ENDPATH**/ ?>