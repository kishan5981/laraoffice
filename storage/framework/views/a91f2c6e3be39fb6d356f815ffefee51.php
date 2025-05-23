<button class="pull-right btn-summary" data-toggle="collapse" data-target=".filters" aria-expanded="true"><i class="fa fa-filter"></i>&nbsp;<?php echo app('translator')->get('others.statistics.filter'); ?></button>
<button class="pull-right btn-summary" data-toggle="collapse" data-target=".canvas" aria-expanded="true"><i class="fa fa-bar-chart"></i>&nbsp;<?php echo app('translator')->get('others.statistics.summary'); ?></button>&nbsp;
<div id="canvas" class="collapse canvas">
    <div class="panel panel-default canvas">
        <div class="panel-heading">
        	<?php echo app('translator')->get('others.statistics.client-projects-summary'); ?> 
        	<div class="col-sm-2 pull-right" style="margin-top:-7px;">
        		<?php
                   $currencies = \App\Models\Currency::get()->pluck('name', 'id');
                   $default_currency = getDefaultCurrency('id');
               ?>

                 <?php echo Form::select('currency_id', $currencies, $default_currency, ['class' => 'form-control select2', 'required' => '', 'data-live-search' => 'true', 'data-show-subtext' => 'true', 'id' => 'currency_id', 'data-target' => route('admin.client_projects.refresh-stats')]); ?>


        	</div>
    
        </div>
   
        <div class="panel-body table-responsive" id="canvas-panel-body">
			 <?php echo $__env->make('admin.client_projects.canvas.canvas-panel-body',['currency_id' => $default_currency], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                  currency: $(this).val()
              }
          }).done(function ( data ) {
              $('#canvas-panel-body').html( data );
          });
   });
</script>
<?php $__env->stopSection(); ?>
<?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/admin/client_projects/canvas/canvas.blade.php ENDPATH**/ ?>