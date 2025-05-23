<?php $__env->startSection('content'); ?>
    <h3 class="page-title"><?php echo app('translator')->get('global.currencies.title'); ?></h3>
    
    <?php echo Form::model($currency, ['method' => 'PUT', 'route' => ['admin.currencies.update', $currency->id],'class'=>'formvalidation']); ?>


    <div class="panel panel-default">
        <p style="padding: 10px;"><?php echo app('translator')->get('custom.currencies.currency_layer_message', ['url' => '<a href="https://currencylayer.com" target="_blank">https://currencylayer.com</a>', 'settings_url' => '<a href="'.url('admin/mastersettings/settings/view/currency-settings').'" target="_blank">here</a>']); ?></p>
        <div class="panel-heading">
            <?php echo app('translator')->get('global.app_edit'); ?>
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-<?php echo e(COLUMNS); ?>">
                <div class="form-group">
                    <?php echo Form::label('name', trans('global.currencies.fields.name').'*', ['class' => 'control-label form-label']); ?>

                    <div class="form-line">
                    <?php echo Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Name', 'required' => '']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('name')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('name')); ?>

                        </p>
                    <?php endif; ?>
                </div>
                    </div>
                </div>
            
                <div class="col-xs-<?php echo e(COLUMNS); ?>">
                <div class="form-group">
                    <?php echo Form::label('symbol', trans('global.currencies.fields.symbol').'*', ['class' => 'control-label form-label']); ?>

                    <div class="form-line">
                    <?php echo Form::text('symbol', old('symbol'), ['class' => 'form-control', 'placeholder' => 'Symbol', 'required' => '']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('symbol')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('symbol')); ?>

                        </p>
                    <?php endif; ?>
                </div>
                    </div>
                </div>
            
                <div class="col-xs-<?php echo e(COLUMNS); ?>">
                <div class="form-group">
                    <?php echo Form::label('code', trans('global.currencies.fields.code').'*', ['class' => 'control-label form-label']); ?>

                    <div class="form-line">
                    <?php echo Form::text('code', old('code'), ['class' => 'form-control', 'placeholder' => 'Code', 'required' => '']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('code')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('code')); ?>

                        </p>
                    <?php endif; ?>
                </div>
                    </div>
                </div>
            
                <div class="col-xs-<?php echo e(COLUMNS); ?>">
                <div class="form-group">
                    <?php echo Form::label('rate', trans('global.currencies.fields.rate').'*', ['class' => 'control-label form-label']); ?>

                    <div class="form-line">
                    <?php echo Form::number('rate', old('rate'), ['class' => 'form-control', 'placeholder' => 'Rate', 'required' => '','min'=>'1','step'=>'0.01']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('rate')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('rate')); ?>

                        </p>
                    <?php endif; ?>
                </div>
                </div>
                </div>
            
                <div class="col-xs-4">
                <div class="form-group">
                    <?php echo Form::label('status', trans('global.currencies.fields.status').'*', ['class' => 'control-label']); ?>

                    <?php echo Form::select('status', $enum_status, old('status'), ['class' => 'form-control select2', 'required' => '']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('status')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('status')); ?>

                        </p>
                    <?php endif; ?>
                </div>
                </div>
            
                <div class="col-xs-4">
                <div class="form-group">
                    
                    <?php echo Form::label('is_default', trans('global.currencies.fields.is_default').'*', ['class' => 'control-label']); ?>

                    <?php echo Form::select('is_default', $enum_is_default, old('is_default'), ['class' => 'form-control select2', 'required' => '']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('is_default')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('is_default')); ?>

                        </p>
                    <?php endif; ?>
                </div>
                </div>
           
                <div class="col-xs-4">
                <div class="form-group">
                    
                    <?php echo Form::label('update_currency_online', trans('custom.currencies.update_currency_online'), ['class' => 'control-label']); ?>

                    <?php echo Form::select('update_currency_online', $enum_is_default, 'no', ['class' => 'form-control select2', 'required' => '']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('update_currency_online')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('update_currency_online')); ?>

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


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/admin/currencies/edit.blade.php ENDPATH**/ ?>