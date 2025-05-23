<script>
    
$(function() {
    "use strict";
    function initializeContactTypesdonutChart() {
        Morris.Donut({
            element: 'ContactTypesdonutChart',
            data: [
            <?php $__currentLoopData = $yearly_data['contacts_chart']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact_type => $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                {label: "<?php echo e($contact_type); ?>", value: <?php echo e($count); ?>},
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            ],
            labelColor: '#23AE89',
            colors: ['#E67A77', '#D9DD81', '#79D1CF', '#95D7BB']
        });
    }
    initializeContactTypesdonutChart();

    $(window).resize(function() {        
        setTimeout(function() {
            $("#ContactTypesdonutChart").empty();
            initializeContactTypesdonutChart();
        }, 200);
    });
});
</script><?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/dashboard-parts/ContactTypesdonutChart-scripts.blade.php ENDPATH**/ ?>