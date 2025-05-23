<?php $request = app('Illuminate\Http\Request'); ?>


<?php $__env->startSection('content'); ?>

    <h3 class="page-title">
    <?php if( ! empty( $type_id ) ): ?>
        <?php
        $details = \App\Models\ContactType::find( $type_id );
        

        ?>
        <?php if( $details ): ?>
            <?php echo e(str_plural($details->title)); ?>

        <?php else: ?>
            <?php echo app('translator')->get('global.contacts.title'); ?>
        <?php endif; ?>
    <?php else: ?>
        <?php echo app('translator')->get('global.contacts.title'); ?>
    <?php endif; ?>
</h3>
    
    <p>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('contact_create')): ?>
        <?php if( ! empty( $type_id ) ): ?>
            <a href="<?php echo e(route('admin.contacts.create', $type_id)); ?>" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;<?php echo app('translator')->get('global.app_add_new'); ?></a>
        <?php else: ?>
            <a href="<?php echo e(route('admin.contacts.create')); ?>" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;<?php echo app('translator')->get('global.app_add_new'); ?></a>
        <?php endif; ?>

        <a href="#" class="btn btn-warning" style="margin-left:5px;" data-toggle="modal" data-target="#myModal"><i class="fa fa-file-o"></i>&nbsp;<?php echo app('translator')->get('global.app_csvImport'); ?></a>
        
        <?php endif; ?>
        <?php echo $__env->make('admin.contacts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('csvImport.modal', ['model' => 'Contact', 'csvtemplatepath' => 'contacts.csv', 'duplicatecheck' => 'email', 'contact_type' => ( ! empty( $type_id ) ) ? $type_id : CUSTOMERS_TYPE], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </p>
    



    <p>
        <ul class="list-inline">
            <?php
            $route = route('admin.contacts.index');
            if ( ! empty( $type_id ) ) {
                $route = route('admin.list_contacts.index', [ 'type' => 'contact_type', 'type_id' => $type_id ]);
            }
            ?>
            <li><a href="<?php echo e($route); ?>" style="<?php echo e(request('show_deleted') == 1 ? '' : 'font-weight: 700'); ?>">
            <?php echo app('translator')->get('global.app_all'); ?>
            <span class="badge">
               <?php if( ! empty( $type_id ) ): ?>
                <?php echo e(\App\Models\Contact::whereHas("contact_type",
                function ($query) use( $type_id ) {
                    $query->where('id', $type_id);
                })->count()); ?>

               <?php else: ?>
                <?php echo e(\App\Models\Contact::count()); ?>

               <?php endif; ?>
            </span>
            </a></li>
            
            |
            <?php
            $route = route('admin.contacts.index') . '?show_deleted=1';
            if ( ! empty( $type_id ) ) {
                $route = route('admin.list_contacts.index', [ 'type' => 'contact_type', 'type_id' => $type_id ]) . '?show_deleted=1';
            }
            ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('contact_delete')): ?>
            <li><a href="<?php echo e($route); ?>" style="<?php echo e(request('show_deleted') == 1 ? 'font-weight: 700' : ''); ?>"><?php echo app('translator')->get('global.app_trash'); ?>
            <span class="badge">
               <?php if( ! empty( $type_id ) ): ?>
                <?php echo e(\App\Models\Contact::whereHas("contact_type",
                function ($query) use( $type_id ) {
                    $query->where('id', $type_id);
                })->onlyTrashed()->count()); ?>

               <?php else: ?>
                <?php echo e(\App\Models\Contact::onlyTrashed()->count()); ?>

               <?php endif; ?>
            </span>
            </a></li>
            <?php endif; ?>
        </ul>
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->get('global.app_list'); ?>
        </div>

        <div class="panel-body table-responsive">
            <?php echo $__env->make('admin.contacts.records-display', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
    <?php echo $__env->make('admin.contacts.mail.modal-loading', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?> 
    <?php echo $__env->make('admin.contacts.records-display-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/admin/contacts/index.blade.php ENDPATH**/ ?>