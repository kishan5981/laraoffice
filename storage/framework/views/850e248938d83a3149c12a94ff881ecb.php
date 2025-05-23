<?php $__env->startSection('header_scripts'); ?>
<link href="<?php echo e(CSS); ?>checkbox.css" rel="stylesheet" type="text/css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <h3 class="page-title"><?php echo e(trans('custom.settings.settings')); ?></h3>

     <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo e(isset($title) ? $title : ''); ?>

        </div>

       
        
        	
            <div class="panel-body packages">
                    <div class="row">
                        <?php if($record->image): ?>
                        <img src="<?php echo e(IMAGE_PATH_SETTINGS.$record->image); ?>" width="100" height="100">
                        <?php endif; ?>

                    </div>
                    <?php
                    $roles = \App\Models\Role::all();
                    ?>
                    <?php echo Form::open(array('url' => URL_SETTINGS_ADD_SUBSETTINGS.$record->slug, 'method' => 'PATCH', 
                        'novalidate'=>'','name'=>'formSettings ', 'files'=>'true')); ?>

                        <div class="row"> 
                        <ul class="list-group">
                        <?php if(!empty($settings_data)): ?>
                        <?php $__currentLoopData = $settings_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                        $except_keys = array( 'default_payment_gateway', 'default_sms_gateway', 'default-account', 'default-category', 'default-category-recurring', 'mailchimp_default_lists', 'default_expense_caterory' );
                        foreach( $roles as $role ) {
                          $except_keys[] = 'default-mailchimplist-' . strtolower($role->slug);
                        }
                        if ( in_array( $key, $except_keys ) ) {
                            continue;
                        }
                        $type_name = 'text';

                        if($value->type == 'number' || $value->type == 'email' || $value->type=='password')
                            $type_name = 'text';
                        else
                            $type_name = $value->type;
                        ?>
                         
                        <?php echo $__env->make(
                                    'admin.general_settings.sub-list-views.'.$type_name.'-type', 
                                    array('key'=>$key, 'value'=>$value)
                                , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                          <?php else: ?>
                              <li class="list-group-item"><?php echo e(trans('custom.settings.no_records_found')); ?></li>
                          <?php endif; ?>
                        </ul>

                        </div>
                        <?php if( $record->slug == 'mailchimp-settings'): ?>
                        <?php
                        $api_key = getSetting('mailchimp_api_key', 'mailchimp-settings', '');

                        $MailChimp = new DrewM\MailChimp\MailChimp( trim( $api_key ) );
                        $mailchimp_lists = $MailChimp->get('lists');
                        
                        if ( ! empty( $mailchimp_lists['lists'] ) && ! empty( $roles ) ) {
                        ?>
                        <div class="row">
                            
                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-6">
                              <fieldset class="form-group">
                               <label for="default-account"><?php echo app('translator')->get('custom.settings.default-mailchimp-list', [ 'role' => $role->title] ); ?></label>
                               <?php                              
                               $selected = getSetting('default-mailchimplist-'.strtolower($role->slug), 'mailchimp-settings', '');
                               ?>                              
                               <select name="default-mailchimplist-<?php echo e(strtolower($role->slug)); ?>[value]" class="form-control" data-toggle="tooltip" title="" data-placement="bottom" data-original-title="Default mailchimplist for: <?php echo e(strtolower($role->slug)); ?>" aria-describedby="tooltip382729">
                                    <option value="" <?php if( '' == $selected ): ?> selected="selected" <?php endif; ?> ><?php echo app('translator')->get('orders::global.orders.no-account'); ?></option>
                                    <?php $__currentLoopData = $mailchimp_lists['lists']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                                                          
                                      <option value="<?php echo e($list['id']); ?>" <?php if( $list['id'] == $selected ): ?> selected="selected" <?php endif; ?> ><?php echo e($list['name']); ?></option>
                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <input type="hidden" name="default-mailchimplist-<?php echo e(strtolower($role->slug)); ?>[type]" value="select">                    
                                <input type="hidden" name="default-mailchimplist-<?php echo e(strtolower($role->slug)); ?>[tool_tip]" value="<?php echo app('translator')->get('custom.settings.default-mailchimp-list', [ 'role' => $role->title] ); ?>">
                                </fieldset>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                        </div>
                      <?php } ?>
                        <?php endif; ?>

                        <?php if( 'credit-note-settings' === $record->slug ): ?>
                          <div class="row">
                            <div class="col-md-6">
                               <fieldset class="form-group">
                               <label for="default_expense_caterory"><?php echo app('translator')->get('custom.settings.default-expense-category'); ?></label>

                               <?php
                               $expense_categories = \App\Models\ExpenseCategory::get();
                               $selected = getSetting('default_expense_caterory', 'credit-note-settings', '');
                               ?>                              
                               <select name="default_expense_caterory[value]" class="form-control" data-toggle="tooltip" title="" data-placement="bottom" data-original-title="<?php echo app('translator')->get('custom.settings.default-expense-category'); ?>" aria-describedby="tooltip382729">
                                    <option value="" <?php if( '' == $selected ): ?> selected="selected" <?php endif; ?> >
                                    <?php $__currentLoopData = $expense_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $expense_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($expense_category->id); ?>" <?php if( $expense_category->id == $selected ): ?> selected="selected" <?php endif; ?> ><?php echo e($expense_category->name); ?></option>
                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <input type="hidden" name="default_expense_caterory[type]" value="select">                    
                                <input type="hidden" name="default_expense_caterory[tool_tip]" value="<?php echo app('translator')->get('custom.settings.default-expense-category'); ?>">
                                </fieldset>
                            </div>
                          </div>
                        <?php endif; ?>

                        <?php if( in_array( $record->slug, array( 'order-settings', 'invoice-settings', 'credit-note-settings', 'purchase-orders-settings') ) ): ?>
                        <div class="row"> 
                            <div class="col-md-6">
                               <fieldset class="form-group">
                               <label for="default-account"><?php echo app('translator')->get('custom.settings.default-account'); ?></label>

                               <?php
                               $accounts = \App\Models\Account::all();
                               $selected = '';
                               if ( 'order-settings' === $record->slug ) {
                                  $selected = getSetting('default-account', 'order-settings', '');
                              }
                              if ( 'invoice-settings' === $record->slug ) {
                                  $selected = getSetting('default-account', 'invoice-settings', '');
                              }
                              if ( 'credit-note-settings' === $record->slug ) {
                                  $selected = getSetting('default-account', 'credit-note-settings', '');
                              }
                              if ( 'purchase-orders-settings' === $record->slug ) {
                                  $selected = getSetting('default-account', 'purchase-orders-settings', '');
                              }
                              
                               ?>                              
                               <select name="default-account[value]" class="form-control" data-toggle="tooltip" title="" data-placement="bottom" data-original-title="<?php echo app('translator')->get('custom.settings.default-account'); ?>" aria-describedby="tooltip382729">
                                    <option value="" <?php if( '' == $selected ): ?> selected="selected" <?php endif; ?> ><?php echo app('translator')->get('orders::global.orders.no-account'); ?></option>
                                    <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($account->id); ?>" <?php if( $account->id == $selected ): ?> selected="selected" <?php endif; ?> ><?php echo e($account->name); ?></option>
                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <input type="hidden" name="default-account[type]" value="select">                    
                                <input type="hidden" name="default-account[tool_tip]" value="<?php echo app('translator')->get('custom.settings.default-account'); ?>">
                                </fieldset>
                            </div>
                        </div>
						
						
            <?php if( $record->slug == 'invoice-settings'): ?>
							<div class="row"> 
								<div class="col-md-6">
								   <fieldset class="form-group">
								   <label for="default-category"><?php echo app('translator')->get('custom.settings.default-category'); ?></label>

								   <?php
								   $accounts = \App\Models\IncomeCategory::all();
								   $selected = getSetting('default-category', 'invoice-settings', '');
								   ?>                           
								   <select name="default-category[value]" class="form-control" data-toggle="tooltip" title="" data-placement="bottom" data-original-title="<?php echo app('translator')->get('custom.settings.default-category'); ?>" aria-describedby="tooltip382729">
										<option value="" <?php if( '' == $selected ): ?> selected="selected" <?php endif; ?> ><?php echo app('translator')->get('custom.settings.no-category'); ?></option>
										<?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($account->id); ?>" <?php if( $account->id == $selected ): ?> selected="selected" <?php endif; ?> ><?php echo e($account->name); ?></option>
										 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select>
									<input type="hidden" name="default-category[type]" value="select">                    
									<input type="hidden" name="default-category[tool_tip]" value="<?php echo app('translator')->get('custom.settings.default-category'); ?>">
									</fieldset>
								</div>
							
								<div class="col-md-6">
								   <fieldset class="form-group">
								   <label for="default-category-recurring"><?php echo app('translator')->get('custom.settings.default-category-recurring'); ?></label>

								   <?php
								   $accounts = \App\Models\IncomeCategory::all();
								   $selected = getSetting('default-category-recurring', 'invoice-settings', '');
								   ?>                           
								   <select name="default-category-recurring[value]" class="form-control" data-toggle="tooltip" title="" data-placement="bottom" data-original-title="<?php echo app('translator')->get('custom.settings.default-category-recurring'); ?>" aria-describedby="tooltip382729">
										<option value="" <?php if( '' == $selected ): ?> selected="selected" <?php endif; ?> ><?php echo app('translator')->get('custom.settings.no-category'); ?></option>
										<?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($account->id); ?>" <?php if( $account->id == $selected ): ?> selected="selected" <?php endif; ?> ><?php echo e($account->name); ?></option>
										 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select>
									<input type="hidden" name="default-category-recurring[type]" value="select">                    
									<input type="hidden" name="default-category-recurring[tool_tip]" value="<?php echo app('translator')->get('custom.settings.default-category-recurring'); ?>">
									</fieldset>
								</div>
							</div>
						<?php endif; ?>
                        <?php endif; ?>

                        <?php if( 'site-settings' === $record->slug ): ?>
                        <div class="row"> 
                            <div class="col-md-6">
                               <fieldset class="form-group">
                               <label for="default_payment_gateway"><?php echo app('translator')->get('custom.settings.default-payment-gateway'); ?></label>

                               <?php
                               $payment_gateways = \App\Models\Settings::where('moduletype', 'payment')->get();
                               $selected = getSetting('default_payment_gateway', 'site_settings', 'offline');
                               ?>                              
                               <select name="default_payment_gateway[value]" class="form-control" data-toggle="tooltip" title="" data-placement="bottom" data-original-title="<?php echo app('translator')->get('custom.settings.default-payment-gateway'); ?>" aria-describedby="tooltip382729">
                                    <?php $__currentLoopData = $payment_gateways; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gateway): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($gateway->key); ?>" <?php if( $gateway->key == $selected ): ?> selected="selected" <?php endif; ?> ><?php echo e($gateway->module); ?></option>
                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <input type="hidden" name="default_payment_gateway[type]" value="select">                    
                                <input type="hidden" name="default_payment_gateway[tool_tip]" value="<?php echo app('translator')->get('custom.settings.default-payment-gateway'); ?>">
                                </fieldset>
                            </div>

                            <div class="col-md-6">
                               <fieldset class="form-group">
                               <label for="default_sms_gateway"><?php echo app('translator')->get('custom.settings.default-sms-gateway'); ?></label>

                               <?php
                               $sms_gateways = \App\Models\Settings::where('moduletype', 'sms')->get();
                               $selected = getSetting('default_sms_gateway', 'site_settings', '');
                               ?>                              
                               <select name="default_sms_gateway[value]" class="form-control" data-toggle="tooltip" title="" data-placement="bottom" data-original-title="<?php echo app('translator')->get('custom.settings.default-sms-gateway'); ?>" aria-describedby="tooltip382729">
                                    <?php $__currentLoopData = $sms_gateways; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gateway): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($gateway->key); ?>" <?php if( $gateway->key == $selected ): ?> selected="selected" <?php endif; ?> ><?php echo e($gateway->module); ?></option>
                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <input type="hidden" name="default_sms_gateway[type]" value="select">                    
                                <input type="hidden" name="default_sms_gateway[tool_tip]" value="<?php echo app('translator')->get('custom.settings.default-sms-gateway'); ?>">
                                </fieldset>
                            </div>

                            <?php
                            Eventy::action('settings.site_settings.action', $record);
                            ?>
                        </div>
                        <?php endif; ?>
                        
                        <?php if(!empty($settings_data)): ?>
                        <br>
                        <div class="form-group pull-right">
                            <button class="btn btn-success" ng-disabled='!formTopics.$valid'
                            ><?php echo e(getPhrase('update')); ?></button>
                        </div>
                        <?php endif; ?>
                        
                        


                            <?php echo Form::close(); ?>

                    </div>



    	
<?php $__env->stopSection(); ?>


<?php $__env->startSection('footer_scripts'); ?>

<script src="<?php echo e(JS); ?>bootstrap-toggle.min.js"></script>
<?php $__env->stopSection(); ?>    
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/admin/general_settings/sub-list.blade.php ENDPATH**/ ?>