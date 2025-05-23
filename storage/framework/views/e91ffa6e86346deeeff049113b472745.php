<?php if( ! empty( $yearly_data['income_monthwise'] ) && $yearly_data['income_monthwise']->count() > 0 ): ?>
<div class="col-md-<?php echo e($widget->columns); ?>">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo app('translator')->get('custom.messages.last-12-months-income'); ?>
                <ul class="rad-panel-action">
           
            <li><i class="fa fa-rotate-right"></i></li>
            
        </ul></h3>
        </div>
        <div class="panel-body">
            <div id="last12monthsincome" class="rad-chart"></div>
        </div>
    </div>
</div>

<?php $__env->startSection('javascript'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('javascript'); ?>
<?php echo $__env->make('dashboard-parts.last12monthsincome-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/dashboard-parts/last12monthsincome.blade.php ENDPATH**/ ?>