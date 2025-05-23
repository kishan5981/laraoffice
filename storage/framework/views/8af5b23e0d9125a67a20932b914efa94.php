<div class="col-md-<?php echo e($widget->columns); ?>">
    <div class="media state-media box-ws bg-1">
        <div class="media-left">
            <a href="<?php echo e(route('admin.users.index')); ?>"><div class="state-icn bg-icon-info"><i class="fa fa-users"></i></div></a>
        </div>
        <div class="media-body">
            <?php
                $users_count = \App\Models\User::count();

            ?>
            <h4 class="card-title"><?php echo e($users_count); ?></h4>
            <a href="<?php echo e(route('admin.users.index')); ?>"><?php echo app('translator')->get('custom.dashboard.users'); ?></a>
        </div>
    </div>
    <br/>
</div>

<?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/dashboard-parts/users-count.blade.php ENDPATH**/ ?>