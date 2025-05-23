<?php $__env->startSection('content'); ?>

    <h2 style="margin-top:0px;"><?php echo $__env->yieldContent('title'); ?></h2>

    <div class="row msg-row" style="margin:15px;">

        
        <div class="col-xs-4">
            <a href="<?php echo e(route('admin.messenger.create')); ?>" class="btn btn-primary btn-group-justified">New message</a>

            <div class="list-group" style="margin-top:8px;">
                <a href="<?php echo e(route('admin.messenger.index')); ?>" class="list-group-item">All Messages</a>
                <?php ($unread = App\Models\MessengerTopic::unreadInboxCount()); ?>
                <a href="<?php echo e(route('admin.messenger.inbox')); ?>" class="list-group-item <?php echo e(($unread > 0 ? 'unread' : '')); ?>">
                    Inbox
                    <?php echo e(($unread > 0 ? '('.$unread.')' : '')); ?>

                </a>
                <a href="<?php echo e(route('admin.messenger.outbox')); ?>" class="list-group-item">Outbox</a>
            </div>
        </div>


        
        <div class="col-xs-8 msg-mt">
            <?php echo $__env->yieldContent('messenger-content'); ?>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<style>
.msg-mt{
    margin-top: 50px;

}
.btn-group-justified{
    width: 100% !important;
}

@media   (min-width:320px) and (max-width:429px) {
    .msg-row {
    display: flex;
    flex-direction: column;
}
    .msg-row .col-xs-4  {
    width:100%;
}
    .msg-row .col-xs-8 {
    width:100%;
}
    .msg-row .col-xs-4 .list-group{
        display:flex;
    }
}
</style>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/admin/messenger/template.blade.php ENDPATH**/ ?>