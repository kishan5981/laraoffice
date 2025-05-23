<script>
    
$(function() {
    "use strict";
    function initializeOrdersYearsDataAreaChart() {
        /**
        Orders years quarterly area chart
        */
        Morris.Area({
            element: 'OrdersYearsDataAreaChart',
            behaveLikeLine: true,
            padding: 10,
            fillOpacity: .7,
            lineColors: ['#ED5D5D', '#D6D23A', '#E67A77', '#79D1CF'],
            gridEnabled: false,
            gridLineColor: '#dddddd',
            axes: true,
            data: [
            <?php $__currentLoopData = $OrdersYearsDataAreaChart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            {
                y: '<?php echo e($year); ?>',
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quarter => $quarter_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($quarter); ?>: <?php echo e($quarter_data['amount']); ?>,
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            }, 
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>            
            ],
            xkey: 'y',
            ykeys: [
            <?php $__currentLoopData = $quarters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $q): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                '<?php echo e($q["title"]); ?>',
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            ],
            labels: [
            <?php $__currentLoopData = $quarters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $q): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                '<?php echo e($q["quarter_months"]); ?>',
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            ],
            pointSize: 0,
            lineWidth: 0,
            hideHover: 'auto'
        });        
    }
    initializeOrdersYearsDataAreaChart();

    $(window).resize(function() {        
        setTimeout(function() {
            $("#OrdersYearsDataAreaChart").empty();
            initializeOrdersYearsDataAreaChart();
        }, 200);
    });
});
</script><?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/dashboard-parts/yearly-orders-amount-scripts.blade.php ENDPATH**/ ?>