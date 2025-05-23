<!-- Modal HTML -->
<div id="loadingModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content" id="loadingModalContent">                        
            <div id="loading_icon"><img src="<?php echo e(asset('images/loading.gif')); ?>"></div>
            <div id="content"></div>

            <div class="modal-footer">
		        <button id="mailSend" class="btn btn-primary"><?php echo e(trans('custom.email.send')); ?></button>
                
		        <button type="button" data-dismiss="modal" class="btn"><?php echo e(trans('custom.common.close')); ?></button>
			</div>
        </div>
    </div>
</div>


<?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/admin/contacts/mail/modal-loading.blade.php ENDPATH**/ ?>