<?php if( ! empty( $type_id ) && $type_id == LEADS_TYPE ): ?>
<?php else: ?>
<span style="float: right;">
	<?php
	$active = '';
	if ( empty( $type_id ) ) {
		$active = ' active';
	}
	?>
	<a href="<?php echo e(route('admin.contacts.index')); ?>" class="btn btn-success<?php echo e($active); ?>"><i class="fa fa-plus"></i>&nbsp;<?php echo app('translator')->get('custom.menu.all'); ?>&nbsp;<span class="badge"><?php echo e(\App\Models\Contact::count('id')); ?></span></a>
	
	<?php
	$contacts_types = \App\Models\ContactType::where('type', 'role')->where('status', 'active')->orderBy('priority')->get();
	if ( $contacts_types->count() > 0 ) {
		foreach( $contacts_types as $contacts_type ) {
			$active = '';
			if ( ! empty( $type_id ) && $type_id == $contacts_type->id ) {
				$active = ' activecontact';
			}
		?>
		<a href="<?php echo e(route('admin.list_contacts.index', [ 'type' => 'contact_type', 'type_id' => $contacts_type->id ])); ?>" class="btn btn-success<?php echo e($active); ?>"><i class="fa fa-plus"></i>&nbsp;<?php echo e($contacts_type->title); ?>&nbsp;<span class="badge"><?php echo e(\App\Models\Contact::whereHas("contact_type",
                function ($query) use( $contacts_type ) {
                    $query->where('id', $contacts_type->id);
                })->count('contacts.id')); ?></span></a>
		<?php
		}
	}

	?>
</span>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/admin/contacts/menu.blade.php ENDPATH**/ ?>