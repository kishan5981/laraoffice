<div class="col-md-<?php echo e($widget->columns); ?>">
    <div class="media state-media box-ws bg-2">
        <div class="media-left">
            <a href="<?php echo e(route('admin.incomes.index')); ?>"><div class="state-icn bg-icon-info"><i class="fa fa-usd"></i></div></a>
        </div>
        <div class="media-body">
             <?php
                $income_amount = \App\Models\Income::sum('amount');
            ?>
            <h4 class="card-title"><?php echo e(number_format($income_amount,2)); ?></h4>
            <a href="<?php echo e(route('admin.incomes.index')); ?>"><?php echo app('translator')->get('custom.dashboard.total-income'); ?></a>
        </div>
    </div>
    <br/>
</div>

<?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/dashboard-parts/income-amount.blade.php ENDPATH**/ ?>