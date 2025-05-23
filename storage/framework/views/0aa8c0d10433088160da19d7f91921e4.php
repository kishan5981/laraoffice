<script src="<?php echo e(asset('adminlte/plugins/ckeditor/ckeditor.js')); ?>"></script>
<script type="text/javascript">
	function modalForm( action, id ) {
		$('#loadingModal #content').html('');
		$('#loading_icon').show();

		$('#loadingModal').modal();

		loadFormTemplate( action, id );
	}

	$('.modalForm').click(function() {
		
		var action = $(this).data('action');
		var id = $(this).data('id');
		var selectedid = $(this).data('selectedid');

		$('#loadingModal #content').html('');
		$('#loading_icon').show();

		$('#loadingModal').modal();

		loadFormTemplate( action, id, selectedid );			
	});

	function loadFormTemplate( action, id, selectedid ) {
		$('#loading_icon').show();

		jQuery.ajax({
	        url: '<?php echo e(route("admin.home.load-modal")); ?>',
	        type: 'POST',
	        data: {
	        	'_token': crsf_hash,
	        	id: id,
	        	action: action,
	        	selectedid: selectedid
	        },
	        
	        beforeSend: function() {
	            
	        },
	        success: function (data) {
	            $('#loading_icon').hide();
	            $('#loadingModal #content').html( data ).find('.select2').select2();
	            
	        },
	        error: function (data) {
	            $("#notify .message").html("<strong>" + data.status + "</strong>: " + data.message);
	            $("#notify").removeClass("alert-success").addClass("alert-danger").fadeIn();
	            $("html, body").scrollTop($("body").offset().top);
	        }
	    });
	}
</script>
<script>
    document.getElementById('cancelButton').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the default form submission behavior
        window.history.back(); // Go back in the browser's history
    });
</script><?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/admin/common/modal-scripts.blade.php ENDPATH**/ ?>