 <!-- summary body -->

   <div class="panel-default" aria-hidden="false">
   <div class="crm-invoice-summary">
       
           <div class="row">
               <div class="col-md-12">
                   <div style="border-top-left-radius: 10px;" class="crm-right-border-b1 crm-invoice-summaries-b1" onclick="summarypriority('priority', '', 'circle',<?php echo e($currency_id); ?>)">
                       <div class="box-header text-uppercase text-bold">
                           <?php echo app('translator')->get('others.statistics.total-client-projects'); ?>
                       </div>
                       <div class="box-content">
                           <?php
                           if( isEmployee() ){
                            $total_client_projects = App\Models\ClientProject::whereHas("assigned_to",
                            function ($query) {
                            $query->where('id', Auth::id());
                            })->count();
                           }else{
                            $total_client_projects = App\Models\ClientProject::where('currency_id', '=', $currency_id)->count();
                           }
                           ?>
                           <div class="sentTotal text-info">
                               <?php echo e($total_client_projects); ?>

                           </div>
                       </div>
                       <div class="box-foot">
                           <div class="sendTime box-foot-left">
                               <?php echo app('translator')->get('others.statistics.amount'); ?>
                               <br>
                               <?php
                               if( isEmployee() ){
                          $total_amount_client_projects = \App\Models\Invoice::
                        join('invoice_payments', 'invoices.id', '=', 'invoice_payments.invoice_id')
                        ->join('client_projects', 'client_projects.id', '=', 'invoices.project_id')
                        ->join('client_project_user', 'client_projects.id', '=', 'client_project_user.client_project_id')
                        
                        ->where('invoices.currency_id', '=', $currency_id)
                        ->where('client_project_user.user_id', Auth::id())
                        ->whereNotNull('project_id')
                        ->where('payment_status', 'Success')
                        ->sum('invoice_payments.amount');
                               }
                               else{
                               $total_amount_client_projects = \App\Models\Invoice::join('invoice_payments', 'invoices.id', '=', 'invoice_payments.invoice_id')->where('currency_id', '=', $currency_id)->whereNotNull('project_id')->where('payment_status', 'Success')->sum('invoice_payments.amount');
                                } 
                             ?>
                               <span class="box-foot-stats">
                                   <strong>
                                       <?php echo e(digiCurrency( $total_amount_client_projects,$currency_id )); ?>

                                   </strong>
                               </span>
                           </div>
                       </div>
                        <span id="priority_loader_circle"></span> 
                   </div>

                   
                    <div class="crm-right-border-b1 crm-invoice-summaries-b1" onclick="summarypriority('priority', 'medium', 'circle',<?php echo e($currency_id); ?>)">
                           <div class="box-header text-uppercase text-bold">
                           <?php echo app('translator')->get('others.statistics.medium-priority-client-projects'); ?>
                       </div>
                       <div class="box-content">
                           <?php
                             if( isEmployee() ){
                              $total_medium_client_projects = App\Models\ClientProject::whereHas("assigned_to",
                            function ($query) {
                            $query->where('id', Auth::id());
                            })->where('priority','=','Medium')->count();
                            }else{
                           $total_medium_client_projects = App\Models\ClientProject::where('currency_id', '=', $currency_id)->where('priority','=','Medium')->count();
                            }
                           ?>
                           <div class="sentTotal text-success">
                               <?php echo e($total_medium_client_projects); ?>

                           </div>
                       </div>
                       <div class="box-foot">
                           <div class="sendTime box-foot-left">
                               <?php echo app('translator')->get('others.statistics.amount'); ?>
                               <br>
                        <?php
                         if( isEmployee() ){
                         $total_amount_medium_client_projects = \App\Models\Invoice::
                        join('invoice_payments', 'invoices.id', '=', 'invoice_payments.invoice_id')
                        ->join('client_projects', 'client_projects.id', '=', 'invoices.project_id')
                        ->join('client_project_user', 'client_projects.id', '=', 'client_project_user.client_project_id')
                        
                        ->whereNotNull('project_id')
                        ->where('priority','=','Medium')
                        ->where('invoices.currency_id', '=', $currency_id)
                        ->where('client_project_user.user_id', Auth::id())
                        ->where('payment_status', 'Success')
                        ->sum('invoice_payments.amount');
                      }
                      else{
                        $total_amount_medium_client_projects = \App\Models\Invoice::join('invoice_payments', 'invoices.id', '=', 'invoice_payments.invoice_id')
                        ->join('client_projects', 'client_projects.id', '=', 'invoices.project_id')
                        ->where('client_projects.priority','=','Medium')
                        ->where('invoices.currency_id', '=', $currency_id)
                        ->whereNotNull('project_id')
                        ->where('payment_status', 'Success')
                          ->sum('invoice_payments.amount');

                      }
                        ?>
                               <span class="box-foot-stats">
                                   <strong>
                                       <?php echo e(digiCurrency( $total_amount_medium_client_projects,$currency_id )); ?>

                                   </strong>
                               </span>
                           </div>

                            <div class="box-foot-left pull-right">
                               <?php echo app('translator')->get('others.statistics.medium'); ?>  
                             
                               <br>
                               <span class="box-foot-stats">
                                   <strong>
                                       <?php echo e($total_medium_client_projects .'/'. $total_client_projects); ?>

                                   </strong>
                               </span>
                           </div>

                       </div>
                       <span id="priority_medium_loader_circle"></span>
                   </div>

                  <div class="crm-right-border-b1 crm-invoice-summaries-b1" onclick="summarypriority('priority', 'high', 'circle',<?php echo e($currency_id); ?>)">
                           <div class="box-header text-uppercase text-bold" >
                           <?php echo app('translator')->get('others.statistics.high-priority-client-projects'); ?>
                       </div>
                       <div class="box-content">
                           <?php
                           if( isEmployee() ){
                            $total_high_priority_client_projects = App\Models\ClientProject::whereHas("assigned_to",
                            function ($query) {
                            $query->where('id', Auth::id());
                            })->where('priority','=','High')->count();
                          }
                            else{                             
                           $total_high_priority_client_projects = App\Models\ClientProject::where('currency_id', '=', $currency_id)->where('priority','=','High')->count();
                            }
                           ?>
                           <div class="sentTotal text-warning">
                               <?php echo e($total_high_priority_client_projects); ?>

                           </div>
                       </div>
                       <div class="box-foot">
                           <div class="sendTime box-foot-left">
                               <?php echo app('translator')->get('others.statistics.amount'); ?>
                               <br>
                        <?php
                        if( isEmployee() ){
                        $total_amount_high_priority_client_projects = \App\Models\Invoice::
                        join('invoice_payments', 'invoices.id', '=', 'invoice_payments.invoice_id')
                        ->join('client_projects', 'client_projects.id', '=', 'invoices.project_id')
                        ->join('client_project_user', 'client_projects.id', '=', 'client_project_user.client_project_id')
                       
                        ->whereNotNull('project_id')
                        ->where('priority','=','High')
                        ->where('invoices.currency_id', '=', $currency_id)
                        ->where('client_project_user.user_id', Auth::id())
                        ->where('payment_status', 'Success')
                        ->sum('invoice_payments.amount');
                      }else{
                        $total_amount_high_priority_client_projects = \App\Models\Invoice::join('invoice_payments', 'invoices.id', '=', 'invoice_payments.invoice_id')
                        ->join('client_projects', 'client_projects.id', '=', 'invoices.project_id')
                        ->where('client_projects.priority','=','High')
                        ->where('invoices.currency_id', '=', $currency_id)
                        ->whereNotNull('project_id')
                        ->where('payment_status', 'Success')
                        ->sum('invoice_payments.amount');
                      }
                        ?>
                               <span class="box-foot-stats">
                                   <strong>
                                       <?php echo e(digiCurrency( $total_amount_high_priority_client_projects,$currency_id )); ?>

                                   </strong>
                               </span>
                           </div>

                            <div class="box-foot-left pull-right">
                               <?php echo app('translator')->get('others.statistics.high'); ?>  
                             
                               <br>
                               <span class="box-foot-stats">
                                   <strong>
                                       <?php echo e($total_high_priority_client_projects .'/'. $total_client_projects); ?>

                                   </strong>
                               </span>
                           </div>

                       </div>

                       <span id="priority_high_loader_circle"></span>

                   </div>


                    <div class="crm-right-border-b1 crm-invoice-summaries-b1" onclick="summarypriority('priority', 'urgent', 'circle',<?php echo e($currency_id); ?>)">
                           <div class="box-header text-uppercase text-bold">
                           <?php echo app('translator')->get('others.statistics.urgent-priority-client-projects'); ?>
                       </div>
                       <div class="box-content">
                           <?php
                            if( isEmployee() ){
                              $total_urgent_client_projects = App\Models\ClientProject:: whereHas("assigned_to",
                              function ($query) {
                              $query->where('id', Auth::id());
                              })->where('priority','=','Urgent')->count();
                              }else{
                              $total_urgent_client_projects = App\Models\ClientProject::where('currency_id', '=', $currency_id)->where('priority','=','Urgent')->count();
                            }
                           ?>
                           <div class="sentTotal text-danger">
                               <?php echo e($total_urgent_client_projects); ?>

                           </div>
                       </div>
                       <div class="box-foot">
                           <div class="sendTime box-foot-left">
                               <?php echo app('translator')->get('others.statistics.amount'); ?>
                               <br>
                               <?php
                               if( isEmployee() ){
                              $total_amount_urgent_client_projects = \App\Models\Invoice::
                        join('invoice_payments', 'invoices.id', '=', 'invoice_payments.invoice_id')
                        ->join('client_projects', 'client_projects.id', '=', 'invoices.project_id')
                        ->join('client_project_user', 'client_projects.id', '=', 'client_project_user.client_project_id')
                        
                        ->whereNotNull('project_id')
                        ->where('priority','=','Urgent')
                        ->where('invoices.currency_id', '=', $currency_id)
                        ->where('client_project_user.user_id', Auth::id())
                        ->where('payment_status', 'Success')
                        ->sum('invoice_payments.amount');
                          }else{
                        
                        $total_amount_urgent_client_projects = \App\Models\Invoice::join('invoice_payments', 'invoices.id', '=', 'invoice_payments.invoice_id')
                        ->join('client_projects', 'client_projects.id', '=', 'invoices.project_id')
                        ->where('client_projects.priority','=','Urgent')
                        ->where('invoices.currency_id', '=', $currency_id)
                        ->whereNotNull('project_id')
                        ->where('payment_status', 'Success')
                        ->sum('invoice_payments.amount');

                          }
                             ?>
                               <span class="box-foot-stats">
                                   <strong>
                                       <?php echo e(digiCurrency( $total_amount_urgent_client_projects,$currency_id )); ?>

                                   </strong>
                               </span>
                           </div>

                            <div class="box-foot-left pull-right">
                               <?php echo app('translator')->get('others.statistics.urgent'); ?>  
                             
                               <br>
                               <span class="box-foot-stats">
                                   <strong>
                                       <?php echo e($total_urgent_client_projects .'/'. $total_client_projects); ?>

                                   </strong>
                               </span>
                           </div>

                       </div>
                       <span id="priority_urgent_loader_circle"></span>
                   </div> 


             
       </div>
       </div>
    </div>

</div>
                <!--  end summary body -->



            <!-- end summary -->
<?php $__env->startSection('javascript'); ?> 
<?php echo \Illuminate\View\Factory::parentPlaceholder('javascript'); ?>
<?php echo $__env->make('admin.common.circle-summary-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/admin/client_projects/canvas/canvas-circle.blade.php ENDPATH**/ ?>