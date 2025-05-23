<?php $__env->startSection('content'); ?>

    <h3 class="page-title"><?php echo app('translator')->get('global.invoices.title'); ?></h3>
    <?php echo Form::open(['method' => 'POST', 'route' => ['admin.invoices.store'],'class'=>'formvalidation']); ?>


    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->get('global.app_create'); ?>
        </div>
        
        <div class="panel-body invoice-create">
            <?php echo $__env->make('admin.invoices.form-fields', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger wave-effect']); ?>

    <?php echo Form::submit(trans('custom.common.save-manage'), ['class' => 'btn btn-info wave-effect', 'name' => 'btnsavemanage', 'value' => 'savemanage']); ?>

    <?php echo Form::submit(trans('custom.common.save-send'), ['class' => 'btn btn-success wave-effect', 'name' => 'btnsavesend', 'value' => 'savesend']); ?>

    <?php echo Form::button(trans('global.app_Cancel'), ['class' => 'btn btn-secondary wave-effect','id' => 'cancelButton', 'name' => 'Cancel','value' => 'Cancel']); ?>

    <?php echo Form::close(); ?>

    <?php echo $__env->make('admin.common.modal-loading-submit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
</div>

    </div>

   

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('javascript'); ?>
    
    <?php echo $__env->make('admin.common.standard-ckeditor', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('admin.common.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.common.modal-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script src="<?php echo e(asset('adminlte/plugins/datetimepicker/moment-with-locales.min.js')); ?>"></script>
    <script src="<?php echo e(asset('adminlte/plugins/datetimepicker/bootstrap-datetimepicker.min.js')); ?>"></script>
    <script>
        $(function(){
            moment.updateLocale('<?php echo e(App::getLocale()); ?>', {
                week: { dow: 1 } // Monday is the first day of the week
            });
            
            $('.date').datetimepicker({
                format: "<?php echo e(config('app.date_format_moment')); ?>",
                locale: "<?php echo e(App::getLocale()); ?>",
            });
            
        });
    </script>

    <script>
        $("#selectbtn-allowed_paymodes").click(function(){
            $("#selectall-allowed_paymodes > option").prop("selected","selected");
            $("#selectall-allowed_paymodes").trigger("change");
        });
        $("#deselectbtn-allowed_paymodes").click(function(){
            $("#selectall-allowed_paymodes > option").prop("selected","");
            $("#selectall-allowed_paymodes").trigger("change");
        });
        _token: '<?php echo e(csrf_token()); ?>'
    </script>            
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/admin/invoices/create.blade.php ENDPATH**/ ?>