<?php $__env->startSection('content'); ?>

    <h3 class="page-title">
    <?php
    if ( empty( $type ) ) {
    //   $type = CUSTOMERS_TYPE;
    }
    $details = \App\Models\ContactType::find( $type );
    if ( $details ) {
        echo $details->name;
    } else {
        echo trans('global.contacts.title');
    }
    ?>
    </h3>
    <?php echo Form::open(['method' => 'POST', 'route' => ['admin.contacts.store'], 'files' => true,'class'=>'formvalidation']); ?>


    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->get('global.app_create'); ?>
        </div>
        
        <div class="panel-body">
            <?php echo $__env->make('admin.contacts.form-fields', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>


    <?php echo Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger wave-effect']); ?>

    <?php echo Form::button(trans('global.app_Cancel'), ['class' => 'btn btn-secondary wave-effect','id' => 'cancelButton', 'name' => 'Cancel','value' => 'Cancel']); ?>

    <?php echo Form::close(); ?>


    <?php echo $__env->make('admin.common.modal-loading-submit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('javascript'); ?>

    <script>
        $("#selectbtn-contact_type").click(function(){
            $("#selectall-contact_type > option").prop("selected","selected");
            $("#selectall-contact_type").trigger("change");
        });
        $("#deselectbtn-contact_type").click(function(){
            $("#selectall-contact_type > option").prop("selected","");
            $("#selectall-contact_type").trigger("change");
        });
    </script>

    <script>
        $("#selectbtn-language").click(function(){
            $("#selectall-language > option").prop("selected","selected");
            $("#selectall-language").trigger("change");
        });
        $("#deselectbtn-language").click(function(){
            $("#selectall-language > option").prop("selected","");
            $("#selectall-language").trigger("change");
        });
    </script>
    <?php echo $__env->make('admin.common.modal-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/admin/contacts/create.blade.php ENDPATH**/ ?>