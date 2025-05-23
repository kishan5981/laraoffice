<?php
$controller = getController( 'controller' );
?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check($gateKey.'delete')): ?>
    <?php
    $id = $row->id;
    if ( in_array($controller, array( 'InvoiceTasksController', 'InvoiceRemindersController', 'InvoiceNotesController' )) ) {
        $route = [$routeKey.'.restore', $id ];
    } elseif ( in_array($controller, array( 'ProjectTasksController', 'TimeEntriesController', 'ProjectRemindersController', 'ProjectNotesController', 'MileStonesController', 'ProjectDiscussionController' )) ) {
        $route = [$routeKey.'.restore',$row->project_id, $id ];
    } else {
        $route = [$routeKey.'.restore', $id];
    }
    ?>
    
    <?php echo Form::open(array(
        'style' => 'display: inline-block;',
        'method' => 'POST',
        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
        'route' => $route)); ?>

    <?php echo Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')); ?>

    <?php echo Form::close(); ?>

<?php endif; ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check($gateKey.'delete')): ?>
    <?php
    $id = $row->id;
    if ( in_array($controller, array( 'InvoiceTasksController', 'InvoiceRemindersController', 'InvoiceNotesController' )) ) {
        $route = [$routeKey.'.perma_del', $id ];
    } elseif ( in_array($controller, array( 'ProjectTasksController', 'TimeEntriesController', 'ProjectRemindersController', 'ProjectNotesController', 'MileStonesController', 'ProjectDiscussionController' )) ) {
        $route = [$routeKey.'.perma_del',$row->project_id, $id ];
    } else {
        $route = [$routeKey.'.perma_del', $id];
    }
    ?>
    <?php echo Form::open(array(
        'style' => 'display: inline-block;',
        'method' => 'DELETE',
        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
        'route' => $route)); ?>

    <?php echo Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')); ?>

    <?php echo Form::close(); ?>

<?php endif; ?><?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/restoreTemplate.blade.php ENDPATH**/ ?>