<table class="table table-bordered table-striped ajaxTable dt-select" >
                <thead>
                    <tr>
                         
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th><?php echo app('translator')->get('global.user-actions.created_at'); ?></th>
                        <th><?php echo app('translator')->get('global.user-actions.fields.user'); ?></th>
                        <th><?php echo app('translator')->get('global.user-actions.fields.action'); ?></th>
                        <th><?php echo app('translator')->get('global.user-actions.fields.action-model'); ?></th>
                        <th><?php echo app('translator')->get('global.user-actions.fields.action-id'); ?></th>
                        
                        <?php if( ! config('app.action_buttons_hover') ): ?>
                <?php if( request('show_deleted') == 1 ): ?>
                <th>&nbsp;</th>
                <?php else: ?>
                <th>&nbsp;</th>
                <?php endif; ?>
            <?php endif; ?>
                    </tr>
                </thead>
                
                
</table><?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/admin/user_actions/records-display.blade.php ENDPATH**/ ?>