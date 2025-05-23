<?php
$tasks = \App\Models\Task::where('due_date', '>=', \Carbon\Carbon::now()->toDateString())->get()->sortBy('due_date');
?>
<?php if( $tasks->count() > 0 ): ?>
<div class="col-md-<?php echo e($widget->columns); ?>">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo app('translator')->get('custom.messages.upcoming-tasks'); ?>
                <ul class="rad-panel-action">
                    <li><i class="fa fa-rotate-right"></i></li>
                </ul>
            </h3>
        </div>


        <div class="panel-body">
            <div class="rad-activity-body">
                <div class="rad-list-group group">
                    <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="rad-list-group-item">
                            <div class="rad-list-icon icon-shadow rad-bg-danger pull-left"><i class="fa fa-pencil"></i></div>
                            <div class="rad-list-content"><strong><a href="<?php echo e(route('admin.tasks.show', $task->id)); ?>" target="_blank"><?php echo e($task->name); ?></a></strong>
                                <div class="md-text"><?php echo e($task->description); ?><br><?php echo e(digiDate($task->due_date)); ?></div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/dashboard-parts/dashboard-tasks.blade.php ENDPATH**/ ?>