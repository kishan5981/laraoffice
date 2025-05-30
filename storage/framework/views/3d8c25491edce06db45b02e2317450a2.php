<h3 class="page-title">

    <?php
    if (empty($type)) {
        $type = CUSTOMERS_TYPE;
    }
    $details = \App\Models\ContactType::find($type);
    if ($details) {
        echo $details->name;
    } else {
        echo trans('global.contacts.title');
    }
    ?>
</h3>
<?php echo Form::open(['method' => 'POST', 'route' => ['admin.contacts.store'], 'files' => true,'class'=>'formvalidation', 'id' => 'frmCustomer']); ?>


<div class="panel panel-default">
    <div class="panel-heading">
        <?php echo app('translator')->get('global.app_create'); ?>
    </div>

    <div class="alert" style="display:none" id="message_bag_customer">
        <ul></ul>
    </div>

    <div class="panel-body">
        <?php echo $__env->make('admin.contacts.form-fields', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>
<?php
if (empty($is_ajax)) {
    $is_ajax = 'no';
}
?>
<input type="hidden" name="is_ajax" value="<?php echo e($is_ajax); ?>">
<?php
if (empty($selectedid)) {
    $selectedid = 'customer_id';
}
?>
<input type="hidden" name="selectedid" value="<?php echo e($selectedid); ?>">
<?php echo Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger wave-effect', 'id' => 'saveCustomer']); ?>

<?php echo Form::submit(trans('global.app_Cancel'), ['class' => 'btn btn-secondary wave-effect', 'name' => 'Cancel','value' => 'Cancel']); ?>


<?php echo Form::close(); ?>


<script type="text/javascript">
    $("#selectbtn-contact_type").click(function() {
        $("#selectall-contact_type > option").prop("selected", "selected");
        $("#selectall-contact_type").trigger("change");
    });
    $("#deselectbtn-contact_type").click(function() {
        $("#selectall-contact_type > option").prop("selected", "");
        $("#selectall-contact_type").trigger("change");
    });
</script>
<script>
    $("#selectbtn-language").click(function() {
        $("#selectall-language > option").prop("selected", "selected");
        $("#selectall-language").trigger("change");
    });
    $("#deselectbtn-language").click(function() {
        $("#selectall-language > option").prop("selected", "");
        $("#selectall-language").trigger("change");
    });
</script>

<?php if( 'yes' === $is_ajax ): ?>
<script type="text/javascript">
    $("#saveCustomer").click(function(e) {
        e.preventDefault();

        $.ajax({
            url: "<?php echo e(route('admin.contacts.store')); ?>",
            type: 'POST',
            data: $('#frmCustomer').serializeArray(),
            success: function(data) {
                if ($.isEmptyObject(data.error)) {
                    notifyMe('success', data.success);
                    $('#loadingModal').modal('hide');

                    var value = data.record.id;
                    var title = data.record.name;
                    $('#' + data.record.selectedid).append('<option value="' + value + '" selected="selected">' + title + '</option>');
                    if (data.record.fetchaddress == 'yes') {
                        $('#' + data.record.selectedid).trigger('change');
                    }
                } else {
                    printErrorMsg(data.error);
                }
            }
        });
    });

    function printErrorMsg(msg) {
        $("#message_bag_customer").find("ul").html('');
        $("#message_bag_customer").css('display', 'block');
        $("#message_bag_customer").addClass('alert-danger');
        $.each(msg, function(key, value) {
            $("#message_bag_customer").find("ul").append('<li>' + value + '</li>');
        });
    }
</script>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/admin/contacts/create-form.blade.php ENDPATH**/ ?>