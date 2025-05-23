<table class="table table-bordered table-striped ajaxTable <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('contact_delete_multi')): ?> <?php if( request('show_deleted') != 1 ): ?> dt-select <?php endif; ?> <?php endif; ?>">
    <thead>
        <tr>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('contact_delete_multi')): ?>
               <?php if( request('show_deleted') != 1 ): ?> <th style="text-align:center;"><input type="checkbox" id="select-all" /></th> <?php endif; ?>
            <?php endif; ?>

            <th><?php echo app('translator')->get('global.contacts.fields.name'); ?></th>
            <th><?php echo app('translator')->get('global.contacts.fields.contact-type'); ?></th>
            <th><?php echo app('translator')->get('global.contacts.fields.email'); ?></th>
            <th><?php echo app('translator')->get('global.contacts.fields.address'); ?></th>
            <!--<th>&nbsp;</th>-->
            <?php if( ! config('app.action_buttons_hover') ): ?>
                <?php if( request('show_deleted') == 1 ): ?>
                <th>&nbsp;</th>
                <?php else: ?>
                <th>&nbsp;</th>
                <?php endif; ?>
            <?php endif; ?>

        </tr>
    </thead>
</table><?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/admin/contacts/records-display.blade.php ENDPATH**/ ?>