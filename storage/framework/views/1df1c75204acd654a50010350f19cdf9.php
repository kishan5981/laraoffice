<div class="row">
    <div class="col-xs-<?php echo e(COLUMNS); ?>">
    <div class="form-group">
        <?php echo Form::label('name', trans('global.contact-companies.fields.name').'*', ['class' => 'control-label form-label']); ?>

        <div class="form-line">
        <?php echo Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']); ?>

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
        <?php echo Form::label('email', trans('global.contact-companies.fields.email').'', ['class' => 'control-label form-label']); ?>

        <div class="form-line">
        <?php echo Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => '']); ?>

        <p class="help-block"></p>
        <?php if($errors->has('email')): ?>
            <p class="help-block">
                <?php echo e($errors->first('email')); ?>

            </p>
        <?php endif; ?>
    </div>
</div>
    </div>
	
	<div class="col-xs-<?php echo e(COLUMNS); ?>">
    <div class="form-group">
        <?php echo Form::label('country', trans('global.contacts.fields.country').'', ['class' => 'control-label']); ?>

        <?php echo Form::select('country_id', $countries, old('country_id'), ['class' => 'form-control select2','data-live-search' => 'true','data-show-subtext' => 'true']); ?>

        <p class="help-block"></p>
        <?php if($errors->has('country_id')): ?>
            <p class="help-block">
                <?php echo e($errors->first('country_id')); ?>

            </p>
        <?php endif; ?>
    </div>
    </div>
	
	<div class="col-xs-<?php echo e(COLUMNS); ?>">
    <div class="form-group">
        <?php echo Form::label('website', trans('global.companies.fields.url').'', ['class' => 'control-label form-label']); ?>

        <div class="form-line">
        <?php echo Form::text('website', old('website'), ['class' => 'form-control', 'placeholder' => '']); ?>

        <p class="help-block"></p>
        <?php if($errors->has('website')): ?>
            <p class="help-block">
                <?php echo e($errors->first('website')); ?>

            </p>
        <?php endif; ?>
    </div>
</div>
    </div>
</div>
<div class="row">
    <div class="col-xs-6">
    <div class="form-group">
        <?php echo Form::label('address', trans('global.contact-companies.fields.address').'', ['class' => 'control-label']); ?>

        <?php echo Form::textarea('address', old('address'), ['class' => 'form-control', 'placeholder' => '', 'rows' => 4]); ?>

        <p class="help-block"></p>
        <?php if($errors->has('address')): ?>
            <p class="help-block">
                <?php echo e($errors->first('address')); ?>

            </p>
        <?php endif; ?>
    </div>
</div>

    
</div><?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/admin/contact_companies/form-fields.blade.php ENDPATH**/ ?>