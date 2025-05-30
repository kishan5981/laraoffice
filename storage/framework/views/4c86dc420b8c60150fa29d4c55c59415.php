<?php $__env->startSection('content'); ?>
<h3 class="page-title"><?php echo app('translator')->get('custom.qa_change_password'); ?></h3>

<?php if(session('success')): ?>
<!-- If password successfully show message -->
<div class="row">
	<div class="alert alert-success">
		<?php echo e(session('success')); ?>

	</div>
</div>
<?php else: ?>
<?php echo Form::open(['method' => 'PATCH', 'route' => ['auth.change_password']]); ?>

<!-- If no success message in flash session show change password form  -->
<div class="panel panel-default">
	<div class="panel-heading">
		<?php echo app('translator')->get('quickadmin.qa_edit'); ?>
	</div>

	<div class="panel-body">
		<div class="row">
			<!-- <div class="form-group"> -->
			<div class="col-xs-4">
				<?php echo Form::label('current_password', trans('quickadmin.qa_current_password'), ['class' => 'control-label']); ?>

				<?php echo Form::password('current_password', ['class' => 'form-control', 'placeholder' => '']); ?>

				<p class="help-block"></p>
				<?php if($errors->has('current_password')): ?>
				<p class="help-block">
					<?php echo e($errors->first('current_password')); ?>

				</p>
				<?php endif; ?>
			</div>
			<!-- </div> -->


			<!-- <div class="form-group"> -->
			<div class="col-xs-4">
				<?php echo Form::label('new_password', trans('quickadmin.qa_new_password'), ['class' => 'control-label']); ?>

				<?php echo Form::password('new_password', ['class' => 'form-control', 'placeholder' => '']); ?>

				<p class="help-block"></p>
				<?php if($errors->has('new_password')): ?>
				<p class="help-block">
					<?php echo e($errors->first('new_password')); ?>

				</p>
				<?php endif; ?>
			</div>
			<!-- </div> -->

			<!-- <div class=" form-group"> -->
			<div class="col-xs-4">
				<?php echo Form::label('new_password_confirmation', trans('quickadmin.qa_password_confirm'), ['class' => 'control-label']); ?>

				<?php echo Form::password('new_password_confirmation', ['class' => 'form-control', 'placeholder' => '']); ?>

				<p class="help-block"></p>
				<?php if($errors->has('new_password_confirmation')): ?>
				<p class="help-block">
					<?php echo e($errors->first('new_password_confirmation')); ?>

				</p>
				<?php endif; ?>
			</div>
			<!-- </div> -->
		</div>
	</div>
</div>

<?php echo Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger wave-effect']); ?>

<?php echo Form::close(); ?>

<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/auth/change_password.blade.php ENDPATH**/ ?>