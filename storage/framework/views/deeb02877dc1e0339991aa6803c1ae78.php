<div class="col-md-<?php echo e($widget->columns); ?>">
    <div class="media state-media box-ws bg-4">
        <div class="media-left">
            <a href="<?php echo e(route('admin.products.index')); ?>"><div class="state-icn bg-icon-info"><i class="fa fa-database"></i></div></a>
        </div>
        <div class="media-body">
            <?php
                $products_count = \App\Models\Product::count();
            ?>
            <h4 class="card-title"><?php echo e($products_count); ?></h4>
            <a href="<?php echo e(route('admin.products.index')); ?>"><?php echo app('translator')->get('custom.dashboard.products'); ?></a>
        </div>
    </div>
    <br/>
</div>
<?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/dashboard-parts/products.blade.php ENDPATH**/ ?>