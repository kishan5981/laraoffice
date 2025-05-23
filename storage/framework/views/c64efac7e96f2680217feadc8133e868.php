<?php $__env->startSection('content'); ?>

    <h3 class="page-title"><?php echo app('translator')->get('contracts::custom.contracts.title'); ?></h3>
    <?php echo Form::open(['method' => 'POST', 'route' => ['admin.contracts.store'],'class'=>'formvalidation']); ?>


    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->get('global.app_create'); ?>
        </div>
        <?php
        if ( empty( $fetchaddress ) ) {
            $fetchaddress = 'no';
        }
        ?>
        <input type="hidden" name="fetchaddress" id="fetchaddress" value="<?php echo e($fetchaddress); ?>">
        <?php
        if ( empty( $selectedid ) ) {
            $selectedid = 'customer_id';
        }
        ?>
        <input type="hidden" name="selectedid" id="selectedid" value="<?php echo e($selectedid); ?>">
        <div class="panel-body contracts-create">
        <div class="row">
    <div class="col-xs-12">
    <div class="form-section-heading">Client Details</div>

            <div class="row">
                <div class="col-xs-<?php echo e(COLUMNS); ?>">
                    <div class="form-group">
                    <?php echo Form::label('customer_id', trans('contracts::global.contracts.fields.customer').'', ['class' => 'control-label']); ?>

                    <?php if( 'button' === $addnew_type ): ?>
                    &nbsp;<button type="button" class="btn btn-danger  modalForm" data-action="createcustomer" data-selectedid="customer_id" data-redirect="<?php echo e(route('admin.invoices.create')); ?>" data-toggle="tooltip" data-placement="bottom" data-original-subject="<?php echo e(trans('global.add_new_title', ['subject' => strtolower( trans('global.contracts.fields.customer') )])); ?>"><?php echo e(trans('global.app_add_new')); ?></button>
                    <?php else: ?>        
                    &nbsp;<a class="modalForm" data-action="createcustomer" data-selectedid="customer_id" data-toggle="tooltip" data-placement="bottom" data-original-subject="<?php echo e(trans('global.add_new_title', ['subject' => strtolower( trans('global.contracts.fields.customer') )])); ?>"><i class="fa fa-plus-square"></i></a>
                    <?php endif; ?>
                    <?php echo Form::select('customer_id', $customers, old('customer_id'), ['class' => 'form-control select2','data-live-search' => 'true','data-show-subtext' => 'true','required' => '', 'id' => 'customer_id']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('customer_id')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('customer_id')); ?>

                        </p>
                    <?php endif; ?>
                </div>
            </div>
            
                <div class="col-xs-<?php echo e(COLUMNS); ?>">
                    <div class="form-group">
                    <?php echo Form::label('currency_id', trans('global.contracts.fields.currency').'*', ['class' => 'control-label']); ?>

               <?php
                $currency_id = ! empty( old('currency_id_old') ) ? old('currency_id_old') : '';
                if ( empty( $currency_id ) && ! empty( $invoice ) ) {
                $currency_id = $invoice->currency_id;
                }
              ?>
                    <?php echo Form::select('currency_id', $currencies, old('currency_id',$currency_id), ['class' => 'form-control', 'required' => '','data-live-search' => 'true','data-show-subtext' => 'true','disabled' =>'']); ?>

                <input type="hidden" name="currency_id_old" id="currency_id_old" value="<?php echo e($currency_id); ?>">
                    <p class="help-block"></p>
                    <?php if($errors->has('currency_id')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('currency_id')); ?>

                        </p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="col-xs-<?php echo e(COLUMNS); ?>">
                    <div class="form-group">
                    <?php echo Form::label('status', trans('global.contracts.fields.status').'', ['class' => 'control-label']); ?>

                    <?php echo Form::select('status', $enum_status, old('status'), ['class' => 'form-control select2']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('status')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('status')); ?>

                        </p>
                    <?php endif; ?>
                </div>
                </div>
                
                <div class="col-xs-<?php echo e(COLUMNS); ?>">
                <?php echo Form::label('visible_to_customer', trans('global.contracts.fields.visible-to-customer').'', ['class' => 'control-label']); ?>

                <?php echo Form::select('visible_to_customer', $enum_visible_to_customer, old('visible_to_customer'), ['class' => 'form-control select2']); ?>

                <p class="help-block"></p>
                <?php if($errors->has('visible_to_customer')): ?>
                    <p class="help-block">
                        <?php echo e($errors->first('visible_to_customer')); ?>

                    </p>
                <?php endif; ?>
            </div>
                

                <div class="col-xs-6">
                    <div class="form-group">
                       
                    <?php echo Form::label('address', trans('global.invoices.fields.address').'', ['class' => 'control-label']); ?>

                    <?php echo Form::textarea('address', old('address'), ['class' => 'form-control ', 'placeholder' => trans('global.invoices.selected-customer-address'), 'rows' => 4, 'required' => '']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('address')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('address')); ?>

                        </p>
                    <?php endif; ?>
                </div>
                </div>

                <div class="col-xs-6">
                    <div class="form-group">
                       
                    <?php echo Form::label('delivery_address', trans('global.invoices.fields.delivery-address').'', ['class' => 'control-label']); ?>

                    <?php echo Form::textarea('delivery_address', old('delivery_address'), ['class' => 'form-control ', 'placeholder' => trans('global.invoices.selected-customer-delivery-address'), 'rows' => 4, 'id' => 'delivery_address']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('delivery_address')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('delivery_address')); ?>

                        </p>
                    <?php endif; ?>
                </div>
                </div>
                <div class="col-xs-12 ">
        <div class="form-section-heading">
                    <?php echo app('translator')->get('global.app_invoice'); ?>
                </div>
        </div>
            
                <div class="col-xs-<?php echo e(COLUMNS); ?>">
                    <div class="form-group">
                    <?php echo Form::label('show_delivery_address', trans('global.contracts.fields.show-delivery-address-contract').'', ['class' => 'control-label']); ?>

                    <!-- <?php echo Form::select('show_delivery_address', yesnooptions(), old('show_delivery_address'), ['class' => 'form-control select2','data-live-search' => 'true','data-show-subtext' => 'true']); ?> -->
                    <div class="btn-group btn-toggle" data-toggle="buttons">
                        <label class="btn btn-lg btn-default">
                            <input type="radio" name="show_delivery_address" value="yes"> Yes
                        </label>
                        <label class="btn btn-lg btn-primary active">
                            <input type="radio" name="show_delivery_address" value="no" checked> No
                        </label>
                    </div>
                    <p class="help-block"></p>
                    <?php if($errors->has('show_delivery_address')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('show_delivery_address')); ?>

                        </p>
                    <?php endif; ?>
                </div>
                </div>
                
                <div class="col-xs-<?php echo e(COLUMNS); ?>">
                    <div class="form-group">
                    <?php echo Form::label('subject', trans('global.contracts.fields.title').'', ['class' => 'control-label form-label']); ?>

                    <div class="form-line">
                    <?php echo Form::text('subject', old('subject'), ['class' => 'form-control', 'placeholder' => 'Title']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('subject')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('subject')); ?>

                        </p>
                    <?php endif; ?>
                </div>
            </div>
            </div>
           
                
            
                <div class="col-xs-<?php echo e(COLUMNS); ?>">
                    <div class="form-group">
                    <?php echo Form::label('invoice_prefix', trans('global.contracts.fields.contract-prefix').'', ['class' => 'control-label form-label']); ?>

                    <div class="form-line">
                    <?php
                    $invoice_prefix = getSetting( 'contract-prefix', 'contract-settings' );
                    ?>
                    <?php echo Form::text('invoice_prefix', old('invoice_prefix', $invoice_prefix), ['class' => 'form-control', 'placeholder' => trans('global.contracts.fields.contract-prefix')]); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('invoice_prefix')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('invoice_prefix')); ?>

                        </p>
                    <?php endif; ?>
                </div>
            </div>
            </div>
            
                <div class="col-xs-<?php echo e(COLUMNS); ?>">
                    <div class="form-group">
                    <?php echo Form::label('show_quantity_as', trans('global.contracts.fields.show-quantity-as').'', ['class' => 'control-label form-label']); ?>

                    <div class="form-line">
                    <?php
                    $show_quantity_as = getSetting( 'show_quantity_as', 'contract-settings' );
                    ?>
                    <?php echo Form::text('show_quantity_as', old('show_quantity_as', $show_quantity_as), ['class' => 'form-control', 'placeholder' => 'Show Quantity As']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('show_quantity_as')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('show_quantity_as')); ?>

                        </p>
                    <?php endif; ?>
                </div>
            </div>
                </div>
            
                <div class="col-xs-<?php echo e(COLUMNS); ?>">
                    <div class="form-group">
                    <?php echo Form::label('invoice_no', trans('global.contracts.fields.contract-no'), ['class' => 'control-label form-label']); ?>

                    <div class="form-line">
                    <?php
                    $invoice_no = getNextNumber('Contract');
                    if ( ! empty( $invoice ) ) {
                        $invoice_no = $invoice->invoice_no;
                    }
                    ?>                    
                    <?php echo Form::number('invoice_no', old('invoice_no', $invoice_no), ['class' => 'form-control', 'placeholder' => 'Enter contract number']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('invoice_no')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('invoice_no')); ?>

                        </p>
                    <?php endif; ?>
                </div>
            </div>
                </div>
            
                
            
                <div class="col-xs-<?php echo e(COLUMNS); ?>">
                    <div class="form-group">
                   
                    <?php echo Form::label('reference', trans('global.contracts.fields.reference').'', ['class' => 'control-label form-label']); ?>

                    <div class="form-line">
                    <?php echo Form::text('reference', old('reference'), ['class' => 'form-control', 'placeholder' => 'Reference']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('reference')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('reference')); ?>

                        </p>
                    <?php endif; ?>
                </div>
            </div>
                </div>

            
                <div class="col-xs-<?php echo e(COLUMNS); ?>">
                    <div class="form-group">
                    <?php echo Form::label('invoice_date', trans('global.contracts.fields.contract-date').'', ['class' => 'control-label form-label']); ?>

                    <?php
                    $invoice_date = digiTodayDateAdd();
                    ?>
                    <div class="form-line">
                    <?php echo Form::text('invoice_date', old('invoice_date', $invoice_date), ['class' => 'form-control date', 'placeholder' => '']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('invoice_date')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('invoice_date')); ?>

                        </p>
                    <?php endif; ?>
                </div>
            </div>
                </div>
            
                <div class="col-xs-<?php echo e(COLUMNS); ?>">
                    <div class="form-group">
                    <?php echo Form::label('invoice_due_date', trans('global.contracts.fields.contract-expiry-date').'', ['class' => 'control-label form-label']); ?>

                    <div class="form-line">
                    <?php
                    $invoice_due_after = getSetting( 'contract_due_after', 'contract-settings', 2 );
                    ?>  
                    <?php echo Form::text('invoice_due_date', old('invoice_due_date', digiTodayDateAdd($invoice_due_after)), ['class' => 'form-control date', 'placeholder' => '']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('invoice_due_date')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('invoice_due_date')); ?>

                        </p>
                    <?php endif; ?>
                </div>
            </div>
            </div>
                <div class="col-xs-6">
                  <div class="form-group">
                     <?php echo Form::label('invoice_date', trans('global.contracts.fields.contract_value').'*', ['class' => 'control-label form-label']); ?> -
                     <div class="form-line">
                        <?php echo Form::number('contract_value', old('contract_value'), ['class' => 'form-control amount', 'placeholder' => trans('global.contracts.fields.contract_value'), 'required' => '', 'min'=>'0','step'=>'0.01','id' => 'contract_value']); ?>

                        <p class="help-block"></p>
                        <?php if($errors->has('contract_value')): ?>
                        <p class="help-block">
                           <?php echo e($errors->first('contract_value')); ?>

                        </p>
                        <?php endif; ?>
                     </div>
                  </div>
                </div>
                             

                <div class="col-xs-6">
                  <div class="form-group">
                     <?php echo Form::label('contract_type_id', trans('global.contracts.fields.contract_type').'', ['class' => 'control-label']); ?>

                    
                     <?php echo Form::select('contract_type_id', $contract_types, old('contract_type_id'), ['class' => 'form-control select2', 'required' => '','data-live-search' => 'true','data-show-subtext' => 'true', 'subject' => trans('global.contracts.fields.contract_type')]); ?>

                     <p class="help-block"></p>
                     <?php if($errors->has('contract_type_id')): ?>
                     <p class="help-block">
                        <?php echo e($errors->first('contract_type_id')); ?>

                     </p>
                     <?php endif; ?>
                  </div>
               </div>
               </div>
                <?php
                    $customer_id = old('customer_id');

                    if ( empty( $currency_id ) ) {
                        $currency_id = ! empty( $products_return->currency_id ) ? $products_return->currency_id : getDefaultCurrency('id');
                    }

                    $currency_code = getCurrency($currency_id, 'code');
                    $currency_symbol = getCurrency($currency_id, 'symbol');
                    ?>
                     <h4 class="Lo-collapse-btn-quote" type="" aria-controls="collapseExample">
     Additional Notes? 
        <label class="switch " style="margin-right: 5px;">
            <input type="checkbox" class="toggle" onclick="toggleDiv()">
            <span class="slider round"></span>
        </label>
    </h4>
   
  <div class="collapse collapsing-container" id="collapseExample">
                <div class="col-xs-6">
                <div class="form-group">
                    <?php echo Form::label('invoice_notes', trans('global.contracts.fields.client-notes').'', ['class' => 'control-label']); ?>

                    <?php
                    $predefined_clientnote_invoice = getSetting( 'predefined_clientnote_contract', 'contract-settings' );
                    ?>
                    <?php echo Form::textarea('invoice_notes', old('invoice_notes', $predefined_clientnote_invoice), ['class' => 'form-control', 'placeholder' => 'Invoice notes']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('invoice_notes')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('invoice_notes')); ?>

                        </p>
                    <?php endif; ?>
                </div>
                </div>

                <div class="col-xs-6">
                <div class="form-group">
                    <?php echo Form::label('admin_notes', trans('global.invoices.fields.admin-notes').'', ['class' => 'control-label']); ?>

                    <?php
                    $predefined_adminnote_contract = getSetting( 'predefined_adminnote_contract', 'contract-settings' );
                    ?>
                    <?php echo Form::textarea('admin_notes', old('admin_notes', $predefined_adminnote_contract), ['class' => 'form-control', 'placeholder' => 'Admin notes']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('admin_notes')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('admin_notes')); ?>

                        </p>
                    <?php endif; ?>
                </div>
                </div>

                <div class="col-xs-12">
                <div class="form-group">
                    <?php echo Form::label('terms_conditions', trans('global.invoices.fields.terms-conditions').'', ['class' => 'control-label']); ?>

                    <?php
                    $predefined_terms_invoice = getSetting( 'predefined_terms_contract', 'contract-settings' );
                    ?>
                    <?php echo Form::textarea('terms_conditions', old('terms_conditions', $predefined_terms_invoice), ['class' => 'form-control editor', 'placeholder' => 'Enter terms and conditions']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('terms_conditions')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('terms_conditions')); ?>

                        </p>
                    <?php endif; ?>
                </div>
                </div>
                </div>
          
           
            
        </div>
    </div>
    </div>

    <?php echo Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger wave-effect', 'name' => 'save']); ?>

    <?php echo Form::submit(trans('global.app_save_send'), ['class' => 'btn btn-success wave-effect', 'name' => 'savesend','value' => 'savesend']); ?>

    <?php echo Form::button(trans('global.app_Cancel'), ['class' => 'btn btn-secondary wave-effect','id' => 'cancelButton', 'name' => 'Cancel','value' => 'Cancel']); ?>


    <?php echo Form::close(); ?>


    <?php echo $__env->make('admin.common.modal-loading-submit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('javascript'); ?>
    <?php echo $__env->make('admin.common.standard-ckeditor', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.common.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.common.modal-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script src="<?php echo e(asset('adminlte/plugins/datetimepicker/moment-with-locales.min.js')); ?>"></script>
    <script src="<?php echo e(asset('adminlte/plugins/datetimepicker/bootstrap-datetimepicker.min.js')); ?>"></script>
    <script>
        $(function(){
            moment.updateLocale('<?php echo e(App::getLocale()); ?>', {
                week: { dow: 1 } // Monday is the first day of the week
            });
            
            $('.date').datetimepicker({
                format: "<?php echo e(config('app.date_format_moment')); ?>",
                locale: "<?php echo e(App::getLocale()); ?>",
            });
            
        });
    </script>
    <script>
     document.getElementById("collapseExample").style.display = "none";
    function toggleDiv() {
        var div = document.getElementById("collapseExample");
        if (div.style.display === "none") {
            div.style.display = "block";
        } else {
            div.style.display = "none";
        }
    }
</script>
<script>
    $(document).ready(function() {
        $('.btn-toggle').click(function() {
            $(this).find('.btn').toggleClass('active');

            if ($(this).find('.btn-primary').length > 0) {
                $(this).find('.btn').toggleClass('btn-primary');
            }
            if ($(this).find('.btn-danger').length > 0) {
                $(this).find('.btn').toggleClass('btn-danger');
            }
            if ($(this).find('.btn-success').length > 0) {
                $(this).find('.btn').toggleClass('btn-success');
            }
            if ($(this).find('.btn-info').length > 0) {
                $(this).find('.btn').toggleClass('btn-info');
            }

            $(this).find('.btn').toggleClass('btn-default');

        });

        // $('form').submit(function() {
        //     var radioValue = $("input[name='show_delivery_address']:checked").val();
        //     if (radioValue) {
        //         alert("You selected - " + radioValue);
        //     }
        //     return false;
        // });
    });
</script>
            
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laraoffice\Modules\Contracts\Providers/../Resources/views/admin/contracts/create.blade.php ENDPATH**/ ?>