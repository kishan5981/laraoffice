<h3 class="page-title"><?php echo app('translator')->get('global.departments.title'); ?></h3>
<?php echo Form::open(['method' => 'POST', 'route' => ['admin.departments.store'],'class'=>'formvalidation', 'id' => 'frmDepartment']); ?>


<div class="panel panel-default">
    <div class="panel-heading">
        <?php echo app('translator')->get('global.app_create'); ?>
    </div>
    <div class="alert" style="display:none" id="message_bag_department">
        <ul></ul>
    </div>
    
    <div class="panel-body">
        <?php echo $__env->make('admin.departments.form-fields', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>        
    </div>
</div>

<?php
if ( empty( $is_ajax ) ) {
  $is_ajax = 'no';
}
?>
<input type="hidden" name="is_ajax" value="<?php echo e($is_ajax); ?>">
<?php
if ( empty( $selectedid ) ) {
  $selectedid = 'country_id';
}
?>
<input type="hidden" name="selectedid" value="<?php echo e($selectedid); ?>">

<?php echo Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger wave-effect', 'id' => 'saveDepartment']); ?>

<?php echo Form::button(trans('global.app_Cancel'), ['class' => 'btn btn-secondary wave-effect','id' => 'cancelButton', 'name' => 'Cancel','value' => 'Cancel']); ?>


<?php echo Form::close(); ?>


<?php if( 'yes' === $is_ajax ): ?>
<script type="text/javascript">
  $("#saveDepartment").click(function(e){
            e.preventDefault();

            $.ajax({
                url: "<?php echo e(route('admin.departments.store')); ?>",
                type:'POST',
                data: $( '#frmDepartment' ).serializeArray(),
                success: function(data) {
                    if($.isEmptyObject(data.error)){
                        notifyMe('success', data.success);
                        $('#loadingModal').modal('hide');

                        var value = data.record.id;
                        var title = data.record.name;
                        $('#' + data.record.selectedid).append('<option value="'+value+'" selected="selected">'+title+'</option>');
                    }else{
                        printErrorMsg(data.error);
                    }
                }
            });
  });

  function printErrorMsg (msg) {
      $("#message_bag_department").find("ul").html('');
      $("#message_bag_department").css('display','block');
      $("#message_bag_department").addClass('alert-danger');
      $.each( msg, function( key, value ) {
          $("#message_bag_department").find("ul").append('<li>'+value+'</li>');
      });
  }
</script>
<?php endif; ?>
<?php $__env->startSection('javascript'); ?> 

<?php echo \Illuminate\View\Factory::parentPlaceholder('javascript'); ?>
<?php echo $__env->make('admin.common.modal-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?><?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/admin/departments/create-form.blade.php ENDPATH**/ ?>