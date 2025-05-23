<?php $__env->startSection('content'); ?>
    <h3 class="page-title"><?php echo app('translator')->get('global.master-settings.title'); ?></h3>
    
    <?php echo Form::model($master_setting, ['method' => 'PUT', 'route' => ['admin.master_settings.update', $master_setting->id],'class'=>'formvalidation']); ?>


    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->get('global.app_edit'); ?>
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-<?php echo e(COLUMNS); ?>">
                <div class="form-group">
                    <?php echo Form::label('module', trans('global.master-settings.fields.module').'*', ['class' => 'control-label form-label']); ?>

                    <div class="form-line">
                    <?php echo Form::text('module', old('module'), ['class' => 'form-control', 'placeholder' => 'Module', 'required' => '']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('module')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('module')); ?>

                        </p>
                    <?php endif; ?>
                </div>
                </div>
                </div>
            
                <div class="col-xs-<?php echo e(COLUMNS); ?>">
                <div class="form-group">
                    <?php echo Form::label('key', trans('global.master-settings.fields.key').'*', ['class' => 'control-label form-label']); ?>

                    <div class="form-line">
                    <?php echo Form::text('key', old('key'), ['class' => 'form-control', 'placeholder' => 'Key', 'required' => '']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('key')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('key')); ?>

                        </p>
                    <?php endif; ?>
                </div>
                </div>
                </div>
            
                <div class="col-xs-<?php echo e(COLUMNS); ?>">
                <div class="form-group">
                    <?php echo Form::label('moduletype', trans('custom.settings.moduletype').'*', ['class' => 'control-label']); ?>

                    <?php echo Form::select('moduletype', $enum_moduletype, old('moduletype'), ['class' => 'form-control select2', 'required' => '']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('moduletype')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('moduletype')); ?>

                        </p>
                    <?php endif; ?>
                </div>
                </div>
                <?php
                $statuses = array(
                    'Active' => trans( 'custom.common.active' ),
                'Inactive' => trans( 'custom.common.inactive' ),
                );
                ?>
                <div class="col-xs-<?php echo e(COLUMNS); ?>">
                <div class="form-group">
                    <?php echo Form::label('status', trans('custom.settings.status').'*', ['class' => 'control-label']); ?>

                    <?php echo Form::select('status', $statuses, old('status'), ['class' => 'form-control select2', 'required' => '']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('status')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('status')); ?>

                        </p>
                    <?php endif; ?>
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                <div class="form-group">

                    <?php echo Form::label('description', trans('global.master-settings.fields.description').'', ['class' => 'control-label']); ?>

                    <?php echo Form::textarea('description', old('description'), ['class' => 'form-control ', 'placeholder' => 'Description','rows'=>'4']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('description')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('description')); ?>

                        </p>
                    <?php endif; ?>
                </div>
                </div>
            </div>
            
        </div>
    </div>

    <?php echo Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger wave-effect']); ?>

    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/admin/master_settings/edit.blade.php ENDPATH**/ ?>