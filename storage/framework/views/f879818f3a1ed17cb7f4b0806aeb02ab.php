<?php $__env->startSection('content'); ?>

    <h3 class="page-title"><?php echo app('translator')->get('global.users.title'); ?></h3>
    <?php echo Form::open(['method' => 'POST', 'route' => ['admin.users.store', $contact_id],'class'=>'formvalidation'
]); ?>


    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->get('global.app_create'); ?>
        </div>
        
        <div class="panel-body">
            <div class="row">
                            
                <div class="col-xs-<?php echo e(COLUMNS); ?>">
                <div class="form-group">
                    <?php echo Form::label('name', trans('global.users.fields.name').'*', ['class' => 'control-label form-label']); ?>

                  <div class="form-line">
                    <?php echo Form::text('name', old('name', $contact->name), ['class' => 'form-control', 'placeholder' => 'Name', 'required' => '', 'readonly' => true]); ?>

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
                    <?php echo Form::label('email', trans('global.users.fields.email').'*', ['class' => 'control-label form-label']); ?>

                    <div class="form-line">
                    <?php echo Form::email('email', old('email', $contact->email), ['class' => 'form-control', 'placeholder' => 'Email', 'required' => '', 'readonly' => true]); ?>

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
                    <?php echo Form::label('password', trans('global.users.fields.password').'', ['class' => 'control-label form-label']); ?><?php echo digi_get_help( trans( 'global.users.password_help' ) ); ?>

                     <div class="form-line">
                    <?php echo Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('password')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('password')); ?>

                        </p>
                    <?php endif; ?>
                </div>
                </div>
                </div>
                </div>
                    <div class="row">
                   <div class="col-xs-6">
                <div class="form-group">
                    <?php echo Form::label('role', trans('global.users.fields.role').'*', ['class' => 'control-label']); ?>

                    <button type="button" class="btn btn-primary btn-xs" id="selectbtn-role">
                        <?php echo e(trans('global.app_select_all')); ?>

                    </button>
                    <button type="button" class="btn btn-primary btn-xs" id="deselectbtn-role">
                        <?php echo e(trans('global.app_deselect_all')); ?>

                    </button>
                    <?php echo Form::select('role[]', $roles, old('role', $role_ids), ['class' => 'form-control select2', 'multiple' => 'multiple', 'id' => 'selectall-role' , 'required' => '']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('role')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('role')); ?>

                        </p>
                    <?php endif; ?>
                </div>
                </div>
                 <div class="col-xs-<?php echo e(COLUMNS); ?>">
                <div class="form-group">
                    
                    <?php echo Form::label('department_id', trans('global.users.fields.department').'', ['class' => 'control-label']); ?>

                    <?php if( Gate::allows('department_create')): ?> 
                        <?php if( 'button' === $addnew_type ): ?>
                        &nbsp;<button type="button" class="btn btn-danger modalForm" data-toggle="modal"  data-action="createdepartment" data-selectedid="department_id"><?php echo e(trans('global.app_add_new')); ?></button>
                        <?php else: ?>        
                        &nbsp;<a class="modalForm" data-toggle="modal"  data-action="createdepartment" data-selectedid="department_id"><i class="fa fa-plus-square"></i></a>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php echo Form::select('department_id', $departments, old('department_id'), ['class' => 'form-control select2']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('department_id')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('department_id')); ?>

                        </p>
                    <?php endif; ?>
                </div>
                </div>

                <?php
                $options = array(
                    '0' => 'No',
                    '1' => 'Yes',
                );
                ?>

           <!--  -->
               

                <div class="col-xs-<?php echo e(COLUMNS); ?>">
                    <div class="form-group">
                        <?php
                        $useroptions = array(
                            'yesinactivate' => trans('custom.common.yesinactivate'),
                            'yesactivate' => trans('custom.common.yesactivate'),
                        );
                        ?>
                        <?php echo Form::label('create_user', trans('global.users.action'), ['class' => 'control-label']); ?>

                        <?php echo Form::select('create_user', $useroptions, old('create_user'), ['class' => 'form-control select2', 'required' => '','data-live-search' => 'true','data-show-subtext' => 'true']); ?>

                        <p class="help-block"></p>
                        <?php if($errors->has('create_user')): ?>
                            <p class="help-block">
                                <?php echo e($errors->first('create_user')); ?>

                            </p>
                        <?php endif; ?>
                    </div>
                </div>
                </div>

                <div class="row">
               
            <div class="col-xs-<?php echo e(COLUMNS); ?>">
                <div class="form-group">
                    <?php echo Form::label('hourly_rate', trans('global.users.fields.hourly_rate').'', ['class' => 'control-label form-label']); ?><?php echo digi_get_help( trans( 'global.users.hourly_rate_help') ); ?>

                    <div class="form-line">
                    <?php echo Form::number('hourly_rate', old('hourly_rate'), ['class' => 'form-control','min'=>'0','step'=>'0.01', 'placeholder' => trans('global.users.fields.hourly_rate'), 'required' => '',]); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('hourly_rate')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('hourly_rate')); ?>

                        </p>
                    <?php endif; ?>
                </div>
                </div>
                </div>

                <?php
                $theme = 'default';
                if (\Cookie::get('theme')) { 
                    $theme = \Cookie::get('theme');
                }
                ?>
                <?php if( 'default' === $theme ): ?>
                <div class="col-xs-<?php echo e(COLUMNS); ?>">
                <div class="form-group">
                    <?php echo Form::label('color_theme', trans('global.users.fields.color-theme').'', ['class' => 'control-label']); ?>

                    <?php
                    $themes = [
                        'default' => trans( 'global.users.default' ),
                        'darkgray theme.css' => trans( 'global.users.darkgray-theme' ),
                        'gradient blue theme.css' => trans( 'global.users.gradient-blue-theme' ),
                        'light blue theme.css' => trans( 'global.users.light-blue-theme' ),
                        'darkgray theme.css' => trans( 'global.users.white' ),
                    ];
                    ?>
                    <?php echo Form::select('color_theme', $themes, old('color_theme'), ['class' => 'form-control select2', 'id' => 'color_theme']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('color_theme')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('color_theme')); ?>

                        </p>
                    <?php endif; ?>
                </div>
                </div>

                <div class="col-xs-<?php echo e(COLUMNS); ?>">
                <div class="form-group">
                    <?php echo Form::label('color_skin', trans('global.users.fields.color-skin').'', ['class' => 'control-label']); ?>

                    <?php
                    $skins = [
                        'skin-blue' => trans( 'global.users.default' ),
                        'skin-blue-light' => trans( 'global.users.skin-blue-light' ),
                        'skin-yellow' => trans( 'global.users.skin-yellow' ),
                        'skin-yellow-light' => trans( 'global.users.skin-yellow-light' ),
                        'skin-green' => trans( 'global.users.skin-green' ),

                        'skin-green-light' => trans( 'global.users.skin-green-light' ),
                        'skin-purple' => trans( 'global.users.skin-purple' ),
                        'skin-purple-light' => trans( 'global.users.skin-purple-light' ),
                        'skin-red' => trans( 'global.users.skin-red' ),
                        'skin-red-light' => trans( 'global.users.skin-red-light' ),

                        'skin-black' => trans( 'global.users.skin-black' ),
                        'skin-black-light' => trans( 'global.users.skin-black-light' ),
                    ];
                    ?>
                    <?php echo Form::select('color_skin', $skins, old('color_skin'), ['class' => 'form-control select2', 'id' => 'color_skin']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('color_skin')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('color_skin')); ?>

                        </p>
                    <?php endif; ?>
                </div>
                </div>
                <?php endif; ?>
                
              
              
                <div class="col-xs-<?php echo e(COLUMNS); ?>">
                    <div class="form-group">
                        
                        <?php echo Form::label('ticketit_admin', trans('others.users.is-support-admin').'', ['class' => 'control-label']); ?>

                        <?php echo Form::select('ticketit_admin', $options, old('ticketit_admin'), ['class' => 'form-control select2']); ?>

                        <p class="help-block"></p>
                        <?php if($errors->has('ticketit_admin')): ?>
                            <p class="help-block">
                                <?php echo e($errors->first('ticketit_admin')); ?>

                            </p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-xs-<?php echo e(COLUMNS); ?>">
                    <div class="form-group">                        
                        <?php echo Form::label('ticketit_agent', trans('others.users.is-support-agent').'', ['class' => 'control-label']); ?>

                        <?php echo Form::select('ticketit_agent', $options, old('ticketit_agent'), ['class' => 'form-control select2']); ?>

                        <p class="help-block"></p>
                        <?php if($errors->has('ticketit_agent')): ?>
                            <p class="help-block">
                                <?php echo e($errors->first('ticketit_agent')); ?>

                            </p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <?php echo Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger wave-effect']); ?>

    <?php echo Form::submit(trans('global.app_Cancel'), ['class' => 'btn btn-secondary wave-effect', 'name' => 'Cancel','value' => 'Cancel']); ?>


    <?php echo Form::close(); ?>


    <?php echo $__env->make('admin.common.modal-loading-submit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('javascript'); ?>

    <script>
        $("#selectbtn-role").click(function(){
            $("#selectall-role > option").prop("selected","selected");
            $("#selectall-role").trigger("change");
        });
        $("#deselectbtn-role").click(function(){
            $("#selectall-role > option").prop("selected","");
            $("#selectall-role").trigger("change");
        });

        $('#contact_reference_id').change(function() {
            $.ajax({
                url: '<?php echo e(route("admin.users.getuserbyid")); ?>',
                dataType: "json",
                method: 'post',
                data: {                            
                    '_token': crsf_hash,
                    contact_reference_id: $(this).val(),
                },
                success: function (result) {
                    
                    if ( result.data.contact ) {
                        $('.error').remove();
                        $('#name').val(result.data.contact.first_name);
                        $('#email').val(result.data.contact.email);
                    }
                    if ( 'danger' === result.status ) {                        
                        $('#contact_reference_id').closest('div.form-group').find('.help-block').html('<span class="error">'+result.edit_message+'</span>');
                        notifyMe(result.status, result.message);
                    }
                }
            });
        });
    </script>
    <?php echo $__env->make('admin.common.modal-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/admin/users/create.blade.php ENDPATH**/ ?>