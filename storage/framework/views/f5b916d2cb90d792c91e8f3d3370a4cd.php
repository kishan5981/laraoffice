<table class="table table-bordered table-striped ajaxTable <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('invoice_delete_multi')): ?> <?php if( request('show_deleted') != 1 ): ?> dt-select <?php endif; ?> <?php endif; ?>">
    <thead>
        <tr>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('invoice_delete_multi')): ?>
                <?php if( request('show_deleted') != 1 ): ?><th style="text-align:center;"><input type="checkbox" id="select-all" /></th><?php endif; ?>
            <?php endif; ?>

            <th><?php echo app('translator')->get('global.invoices.fields.invoice-no'); ?></th>
            <th><?php echo app('translator')->get('global.invoices.fields.customer'); ?></th>
            <th><?php echo app('translator')->get('global.invoices.fields.paymentstatus'); ?></th>
            <th><?php echo app('translator')->get('global.invoices.fields.title'); ?></th>                        
            <th><?php echo app('translator')->get('global.invoices.fields.status'); ?></th>
            <th><?php echo app('translator')->get('global.invoices.fields.invoice-date'); ?></th>
            <th><?php echo app('translator')->get('global.invoices.fields.invoice-due-date'); ?></th>
            <th><?php echo app('translator')->get('global.invoices.fields.amount'); ?></th>
            <?php if( ! config('app.action_buttons_hover') ): ?>
                <?php if( request('show_deleted') == 1 ): ?>
                <th>&nbsp;</th>
                <?php else: ?>
                <th>&nbsp;</th>
                <?php endif; ?>
            <?php endif; ?>
        </tr>
    </thead>
</table><?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/admin/invoices/records-display.blade.php ENDPATH**/ ?>