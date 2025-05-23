<?php
$delivery_address = ! empty( $contact->delivery_address ) ? json_decode( $contact->delivery_address, true ) : array();
?>
<div class="col-xs-<?php echo e(COLUMNS); ?>">
<div class="form-group">
    <?php echo Form::label('first_name_delivery', trans('global.contacts.fields.first-name'), ['class' => 'control-label']); ?>

    <?php
    $first_name = ! empty( $delivery_address['first_name'] ) ? $delivery_address['first_name'] : old('first_name');
    ?>
    <?php echo Form::text('first_name_delivery', $first_name, ['class' => 'form-control', 'placeholder' => '']); ?>

    <p class="help-block"></p>
    <?php if($errors->has('first_name_delivery')): ?>
        <p class="help-block">
            <?php echo e($errors->first('first_name_delivery')); ?>

        </p>
    <?php endif; ?>
</div>
</div>

<div class="col-xs-<?php echo e(COLUMNS); ?>">
<div class="form-group">
    <?php echo Form::label('last_name_delivery', trans('global.contacts.fields.last-name').'', ['class' => 'control-label']); ?>

    <?php
    $last_name = ! empty( $delivery_address['last_name'] ) ? $delivery_address['last_name'] : old('last_name');
    ?>
    <?php echo Form::text('last_name_delivery', $last_name, ['class' => 'form-control', 'placeholder' => '']); ?>

    <p class="help-block"></p>
    <?php if($errors->has('last_name_delivery')): ?>
        <p class="help-block">
            <?php echo e($errors->first('last_name_delivery')); ?>

        </p>
    <?php endif; ?>
</div>
</div> 

<div class="col-xs-<?php echo e(COLUMNS); ?>">
<div class="form-group">
    <?php echo Form::label('address_delivery', trans('global.contacts.address'), ['class' => 'control-label']); ?>

    <?php
    $address = ! empty( $delivery_address['address'] ) ? $delivery_address['address'] : old('address');
    ?>
    <?php echo Form::text('address_delivery', $address, ['class' => 'form-control', 'placeholder' => '']); ?>

    <p class="help-block"></p>
    <?php if($errors->has('address_delivery')): ?>
        <p class="help-block">
            <?php echo e($errors->first('address_delivery')); ?>

        </p>
    <?php endif; ?>
</div>
</div>
 
 <div class="col-xs-<?php echo e(COLUMNS); ?>">
<div class="form-group">
    <?php echo Form::label('city_delivery', trans('global.contacts.fields.city'), ['class' => 'control-label']); ?>

    <?php
    $city = ! empty( $delivery_address['city'] ) ? $delivery_address['city'] : old('city');
    ?>
    <?php echo Form::text('city_delivery', $city, ['class' => 'form-control', 'placeholder' => '']); ?>

    <p class="help-block"></p>
    <?php if($errors->has('city_delivery')): ?>
        <p class="help-block">
            <?php echo e($errors->first('city_delivery')); ?>

        </p>
    <?php endif; ?>
</div>
</div>

<div class="col-xs-<?php echo e(COLUMNS); ?>">
<div class="form-group">
    <?php echo Form::label('state_region_delivery', trans('global.contacts.fields.state-region'), ['class' => 'control-label']); ?>

    <?php
    $state_region = ! empty( $delivery_address['state_region'] ) ? $delivery_address['state_region'] : old('state_region');
    ?>
    <?php echo Form::text('state_region_delivery', $state_region, ['class' => 'form-control', 'placeholder' => '']); ?>

    <p class="help-block"></p>
    <?php if($errors->has('state_region_delivery')): ?>
        <p class="help-block">
            <?php echo e($errors->first('state_region_delivery')); ?>

        </p>
    <?php endif; ?>
</div>
</div>   
            


<div class="col-xs-<?php echo e(COLUMNS); ?>">
<div class="form-group">
    <?php echo Form::label('zip_postal_code_delivery', trans('global.contacts.fields.zip-postal-code'), ['class' => 'control-label']); ?>

    <?php
    $zip_postal_code = ! empty( $delivery_address['zip_postal_code'] ) ? $delivery_address['zip_postal_code'] : old('zip_postal_code');
    ?>
    <?php echo Form::number('zip_postal_code_delivery', $zip_postal_code, ['class' => 'form-control', 'placeholder' => '' ,'min'=>'0']); ?>

    <p class="help-block"></p>
    <?php if($errors->has('zip_postal_code_delivery')): ?>
        <p class="help-block">
            <?php echo e($errors->first('zip_postal_code_delivery')); ?>

        </p>
    <?php endif; ?>
</div>
</div>


<div class="col-xs-<?php echo e(COLUMNS); ?>">
<div class="form-group">
    <?php echo Form::label('country_id_delivery', trans('global.contacts.fields.country'), ['class' => 'control-label']); ?>

    <?php if( empty( $is_ajax ) || ( ! empty( $is_ajax ) && $is_ajax == 'no' ) ): ?>
        <?php if( Gate::allows('country_create') ): ?>
            <?php if( 'button' === $addnew_type ): ?>
            &nbsp;<button type="button" class="btn btn-danger modalForm" data-action="createcountry" data-selectedid="country_id_delivery" data-toggle="tooltip" data-placement="bottom" data-original-title="<?php echo e(trans('global.add_new_title', ['title' => strtolower( trans('global.contacts.fields.country') )])); ?>"><?php echo e(trans('global.app_add_new')); ?></button>
            <?php else: ?>        
            &nbsp;<a class="modalForm"  data-action="createcountry" data-selectedid="country_id_delivery" data-toggle="tooltip" data-placement="bottom" data-original-title="<?php echo e(trans('global.add_new_title', ['title' => strtolower( trans('global.contacts.fields.country') )])); ?>"><i class="fa fa-plus-square"></i></a>
            <?php endif; ?>
        <?php endif; ?>
    <?php endif; ?>
    <?php
    $country_id = ! empty( $delivery_address['country_id'] ) ? $delivery_address['country_id'] : old('country_id');
    ?>
    <?php echo Form::select('country_id_delivery', $countries, $country_id, ['class' => 'form-control select2 show-tick country']); ?>

    <p class="help-block"></p>
    <?php if($errors->has('country_id_delivery')): ?>
        <p class="help-block">
            <?php echo e($errors->first('country_id_delivery')); ?>

        </p>
    <?php endif; ?>
</div>
</div><?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/admin/contacts/delivery-address-fields.blade.php ENDPATH**/ ?>