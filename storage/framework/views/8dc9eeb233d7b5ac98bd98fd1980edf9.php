 <table class="table table-bordered table-striped ajaxTable <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_delete_multi')): ?> dt-select <?php endif; ?>">
                <thead>
                    <tr>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_delete_multi')): ?>
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <?php endif; ?>

                        <th><?php echo app('translator')->get('global.users.fields.name'); ?></th>
                        <th><?php echo app('translator')->get('global.users.fields.email'); ?></th>
                        <th><?php echo app('translator')->get('global.users.fields.role'); ?></th>                        
                        <th><?php echo app('translator')->get('global.users.fields.status'); ?></th>
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
            </table><?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/admin/users/records-display.blade.php ENDPATH**/ ?>