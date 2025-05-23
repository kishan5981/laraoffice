<?php $__env->startSection('content'); ?>
    <h3 class="page-title"><?php echo app('translator')->get('global.contacts.title_contact'); ?></h3>
    <?php echo Form::model($contact, ['method' => 'PUT', 'route' => ['admin.contacts.update', $contact->id], 'files' => true,'class'=>'formvalidation']); ?>


    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->get('global.app_edit'); ?>
        </div>

        <div class="panel-body">
            <?php echo $__env->make('admin.contacts.form-fields', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>

    <?php echo Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger wave-effect']); ?>

        <?php echo Form::submit(trans('global.app_Cancel'), ['class' => 'btn btn-secondary wave-effect', 'name' => 'Cancel','value' => 'Cancel']); ?>


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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/admin/contacts/edit.blade.php ENDPATH**/ ?>