<button class="pull-right btn-summary" data-toggle="collapse" data-target=".filters" aria-expanded="true"><i class="fa fa-filter"></i>&nbsp;@lang('others.statistics.filter')</button>
<button class="pull-right btn-summary" data-toggle="collapse" data-target=".canvas" aria-expanded="true"><i class="fa fa-bar-chart"></i>&nbsp;@lang('others.statistics.summary')</button>&nbsp;
<div id="canvas" class="collapse canvas">
    <div class="panel panel-default canvas">
        <div class="panel-heading">
        	@lang('others.statistics.contracts-summary') 
       <div class="col-sm-2 pull-right" style="margin-top:-7px;">
            <?php
            $currencies = \App\Models\Currency::get()->pluck('name', 'id');
            $default_currency = getDefaultCurrency('id');
            if ( isCustomer() ) {
                $default_currency = ! empty(Auth::user()->contact_reference->currency_id) ? Auth::user()->contact_reference->currency_id : $default_currency;
                $disable = ' disabled';
            }
            ?>
            
        </div>
        </div>
   
        <div class="panel-body table-responsive" id="canvas-panel-body">
			 @include('contracts::admin.contracts.canvas.canvas-panel-body', ['currency_id' => $default_currency])
		</div>
	</div>
</div>
