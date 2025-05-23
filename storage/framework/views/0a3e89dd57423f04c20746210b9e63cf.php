<table class="table table-bordered table-striped <?php echo e(count($roles) > 0 ? 'datatable' : ''); ?> <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role_delete_multi')): ?> dt-select <?php endif; ?>">
                <thead>
                    <tr>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role_delete_multi')): ?>
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <?php endif; ?>

                        <th><?php echo app('translator')->get('global.roles.fields.title'); ?></th>
                        <th><?php echo app('translator')->get('global.roles.title-module'); ?></th>
                        <?php if( ! config('app.action_buttons_hover') ): ?>
                            <th>&nbsp;</th>
                        <?php endif; ?>

                    </tr>
                </thead>
                
                <tbody>
                    <?php if(count($roles) > 0): ?>
                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr data-entry-id="<?php echo e($role->id); ?>">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role_delete_multi')): ?>
                                    <td></td>
                                <?php endif; ?>

                                <td field-key='title'>
                                    <?php echo e($role->title); ?>

                                    <?php if( config('app.action_buttons_hover') ): ?>
                                        <br><?php echo view('actionsTemplateHover', ['row' => $role, 'gateKey' => 'role_', 'routeKey' => 'admin.roles']); ?>

                                    <?php endif; ?>
                                </td>
                                <td field-key='permission'>
                                    
                                    <?php $__currentLoopData = $role->permission->groupBy('module'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module => $singlePermission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <span class="label label-info label-many"><?php echo e($module); ?></span>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                                <?php if( ! config('app.action_buttons_hover') ): ?>
                                <td>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role_view')): ?>
                                    <a href="<?php echo e(route('admin.roles.show',[$role->id])); ?>" class="btn btn-xs btn-primary"><?php echo app('translator')->get('global.app_view'); ?></a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role_edit')): ?>
                                    <a href="<?php echo e(route('admin.roles.edit',[$role->id])); ?>" class="btn btn-xs btn-info"><?php echo app('translator')->get('global.app_edit'); ?></a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role_delete_multi')): ?>
                            <?php echo Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.roles.destroy', $role->id])); ?>

                                    <?php echo Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')); ?>

                                    <?php echo Form::close(); ?>

                                    <?php endif; ?>
                                </td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7"><?php echo app('translator')->get('global.app_no_entries_in_table'); ?></td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table><?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/admin/roles/records-display.blade.php ENDPATH**/ ?>