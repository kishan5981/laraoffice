<div class="col-md-<?php echo e($widget->columns); ?>">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo app('translator')->get('custom.messages.contacts'); ?><ul class="rad-panel-action">
                                                
                                                <li><i class="fa fa-rotate-right"></i></li>
                                                
                                            </ul></h3>
        </div>
        <div class="panel-body">
            <div id="ContactTypesdonutChart" class="rad-chart"></div>
        </div>
    </div>
</div>

<?php $__env->startSection('javascript'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('javascript'); ?>
<?php echo $__env->make('dashboard-parts.ContactTypesdonutChart-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?><?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/dashboard-parts/ContactTypesdonutChart.blade.php ENDPATH**/ ?>