 <table class="table table-bordered table-striped ajaxTable <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('currency_delete_multi')): ?> <?php if( request('show_deleted') != 1 ): ?> dt-select <?php endif; ?> <?php endif; ?>">
                <thead>
                    <tr>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('currency_delete_multi')): ?>
                            <?php if( request('show_deleted') != 1 ): ?><th style="text-align:center;"><input type="checkbox" id="select-all" /></th><?php endif; ?>
                        <?php endif; ?>

                        <th><?php echo app('translator')->get('global.currencies.fields.name'); ?></th>
                        <th><?php echo app('translator')->get('global.currencies.fields.symbol'); ?></th>
                        <th><?php echo app('translator')->get('global.currencies.fields.code'); ?></th>
                        <th><?php echo app('translator')->get('global.currencies.fields.rate'); ?></th>
                        <th><?php echo app('translator')->get('global.currencies.fields.status'); ?></th>
                        <th><?php echo app('translator')->get('global.currencies.fields.is_default'); ?></th>
                        <?php if( ! config('app.action_buttons_hover') ): ?>
                <?php if( request('show_deleted') == 1 ): ?>
                <th>&nbsp;</th>
                <?php else: ?>
                <th>&nbsp;</th>
                <?php endif; ?>
            <?php endif; ?>
                    </tr>
                </thead>
            </table><?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/admin/currencies/display-records.blade.php ENDPATH**/ ?>