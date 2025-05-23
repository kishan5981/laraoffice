<?php $__env->startSection('content'); ?>
<link type="text/css" href="<?php echo e(asset('css/dashboard.css')); ?>" rel="stylesheet" >

<div id="page-wrapper">
            <div class="container-fluid">
            <div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb">                             
                            <li><i class="fa fa-home"></i> <?php echo app('translator')->get('custom.dashboard.title'); ?></li>
                        </ol>
                    </div>
                </div>
<?php
$OrdersYearsDataAreaChart = ! empty( $yearly_data['areachart'] ) ? $yearly_data['areachart'] : array();
$InvoicesYearsDataAreaChart = ! empty( $yearly_data['areachart_invoices'] ) ? $yearly_data['areachart_invoices'] : array();
?>  
       

             <?php if( ! empty( $widgets ) ): ?>
                    
                     <?php $__currentLoopData = $widgets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $widgetSingle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if( ! empty( $widgetSingle->slug ) ): ?>
                            <?php echo $__env->make('dashboard-parts.' . $widgetSingle->slug, ['widget' => $widgetSingle], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>                            
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                
                <?php endif; ?>
            

        </div>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>

<?php echo $__env->make('dashboard-parts.dashboard-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script src="<?php echo e(asset('js/cdn-js-files/chartjs250/raphael-min.js')); ?>"></script>
<script src="<?php echo e(asset('js/cdn-js-files/chartjs250/morris.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/dashboard.blade.php ENDPATH**/ ?>