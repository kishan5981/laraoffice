<div class="col-md-<?php echo e($widget->columns); ?>">
    <div class="media state-media box-ws bg-3">
        <div class="media-left">
            <a href="<?php echo e(route('admin.expenses.index')); ?>"><div class="state-icn bg-icon-info"><i class="fa fa-list"></i></div></a>
        </div>
        <div class="media-body">
             <?php
                $expense_amount = \App\Models\Expense::sum('amount');
            ?>
            <h4 class="card-title"><?php echo e(number_format($expense_amount,2)); ?></h4>
            <a href="<?php echo e(route('admin.expenses.index')); ?>"><?php echo app('translator')->get('custom.dashboard.total-expense'); ?></a>
        </div>
    </div>
    <br/>
</div>

<?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/dashboard-parts/expenses.blade.php ENDPATH**/ ?>