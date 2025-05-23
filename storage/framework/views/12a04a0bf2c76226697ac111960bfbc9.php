<button class="pull-right btn-summary" data-toggle="collapse" data-target=".filters" aria-expanded="true"><i class="fa fa-filter"></i>&nbsp;<?php echo app('translator')->get('others.statistics.filter'); ?></button>

<button class="pull-right btn-summary" data-toggle="collapse" data-target=".canvas" aria-expanded="true"><i class="fa fa-bar-chart"></i>&nbsp;<?php echo app('translator')->get('others.statistics.summary'); ?></button>&nbsp;


<div id="canvas" class="collapse canvas">
    <div class="panel panel-default canvas">
        <div class="panel-heading">
        	<?php echo app('translator')->get('others.statistics.invoices-summary'); ?> 
       <div class="col-sm-2 pull-right" style="margin-top:-7px;">
            <?php
            
            $contact_currency = '';
            $default_currency = getDefaultCurrency('id');
            if ( ! empty( $project->client->currency_id ) ) {
                $contact_currency = $project->client->currency_id;
            }
            if ( ! empty( $contact_currency ) ) {
                $currencies = \App\Models\Currency::where('id', $contact_currency)->get()->pluck('name', 'id');
            } else {
                $currencies = \App\Models\Currency::get()->pluck('name', 'id');
            }

            if ( empty( $contact_currency ) ) {
                $contact_currency = $default_currency;
            }
            $disable = '';
            if ( isCustomer() ) {
                $contact_currency = ! empty(Auth::user()->currency_id) ? Auth::user()->currency_id : $contact_currency;
                $disable = ' disabled';
            }
            ?>
            <?php echo Form::select('currency_id', $currencies, $default_currency, ['class' => 'form-control select2', 'required' => '', 'data-live-search' => 'true', 'data-show-subtext' => 'true', 'id' => 'currency_id', 'data-target' => route('admin.invoices.refresh-stats'), $disable]); ?>

        </div>
        </div>
   
        <div class="panel-body table-responsive" id="canvas-panel-body">
			 <?php echo $__env->make('admin.invoices.canvas.canvas-panel-body', ['currency_id' => $contact_currency], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		</div>
	</div>
</div>
<?php $__env->startSection('javascript'); ?> 
<?php echo \Illuminate\View\Factory::parentPlaceholder('javascript'); ?>
<script>
	$('#currency_id').change(function() {
		$.ajax({
            method: 'POST',
            url: $(this).data('target'),
            data: {
                _token: _token,
                currency: $(this).val(),
                project_id: '<?php echo e(!empty( $project ) ? $project->id : 0); ?>'
            }
        }).done(function ( data ) {
            $('#canvas-panel-body').html( data );
        });
	});
</script>
<?php $__env->stopSection(); ?><?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/admin/invoices/canvas/canvas.blade.php ENDPATH**/ ?>