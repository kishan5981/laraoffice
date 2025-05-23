<!-- summary -->
<?php
$statistics_type = getSetting( 'statistics-type', 'site_settings', 'default');

if ( 'progress' === $statistics_type ) {
?>
 <?php echo $__env->make('admin.invoices.canvas.canvas-progress', ['currency_id' => $currency_id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php
} elseif ( 'circle' === $statistics_type ) {
 ?>
 <!-- summary -->
<div class="panel panel-default">
	<div class="panel-body table-responsive">
		<?php echo $__env->make('admin.invoices.canvas.canvas-circle', ['currency_id' => $currency_id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  
	</div>
</div>          
<?php } else {
  ?>
	<?php echo $__env->make('admin.invoices.canvas.canvas-default', ['currency_id' => $currency_id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  
  <?php
} ?><?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/admin/invoices/canvas/canvas-panel-body.blade.php ENDPATH**/ ?>