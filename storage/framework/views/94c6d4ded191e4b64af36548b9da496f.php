<ul class="nav nav-tabs" role="tablist">
<li role="presentation" class="active"><a href="#progress" aria-controls="progress" role="tab" data-toggle="tab"><?php echo app('translator')->get('others.statistics.progress'); ?></a></li>
<li role="presentation" class=""><a href="#circle" aria-controls="circle" role="tab" data-toggle="tab"><?php echo app('translator')->get('others.statistics.circle'); ?></a></li>
</ul>
<div class="tab-content">

<div role="tabpanel" class="tab-pane active" id="progress">
	<?php echo $__env->make('admin.invoices.canvas.canvas-progress', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<div role="tabpanel" class="tab-pane" id="circle">
	<?php echo $__env->make('admin.invoices.canvas.canvas-circle', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
</div>
</div><?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/admin/invoices/canvas/canvas-default.blade.php ENDPATH**/ ?>