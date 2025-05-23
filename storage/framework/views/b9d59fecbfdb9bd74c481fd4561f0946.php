<div class="row">
    <div class="col-xs-6">
    <div class="form-group">
        <?php echo Form::label('name', trans('global.departments.fields.name').'*', ['class' => 'control-label form-label']); ?>

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

    <div class="col-xs-6">
    <div class="form-group">
        <?php echo Form::label('description', trans('global.departments.fields.description').'', ['class' => 'control-label']); ?>

        <?php echo Form::textarea('description', old('description'), ['class' => 'form-control ', 'placeholder' => 'Description','rows'=>'3']); ?>

        <p class="help-block"></p>
        <?php if($errors->has('description')): ?>
            <p class="help-block">
                <?php echo e($errors->first('description')); ?>

            </p>
        <?php endif; ?>
    </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/admin/departments/form-fields.blade.php ENDPATH**/ ?>