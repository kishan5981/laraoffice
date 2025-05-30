<div class="row">
    <div class="col-xs-12">
    <div class="form-section-heading">Client Details</div>

<div class="row">
   <div class="col-xs-{{COLUMNS}}">
    <div class="form-group">
        {!! Form::label('customer_id', trans('global.invoices.fields.customer').'', ['class' => 'control-label']) !!}
        @if ( Gate::allows('customer_create') )
            @if( 'button' === $addnew_type )
            &nbsp;<button type="button" class="btn btn-danger modalForm" data-action="createcustomer" data-selectedid="customer_id" data-redirect="{{route('admin.credit_notes.create')}}" data-toggle="tooltip" data-placement="bottom" data-original-title="{{trans('global.add_new_title', ['title' => strtolower( trans('global.invoices.fields.customer') )])}}">{{ trans('global.app_add_new') }}</button>
            @else        
            &nbsp;<a class="modalForm" data-action="createcustomer" data-selectedid="customer_id" data-toggle="tooltip" data-placement="bottom" data-original-title="{{trans('global.add_new_title', ['title' => strtolower( trans('global.invoices.fields.customer') )])}}"><i class="fa fa-plus-square"></i></a>
            @endif
        @endif
        {!! Form::select('customer_id', $customers, old('customer_id'), ['class' => 'form-control select2','data-live-search' => 'true','data-show-subtext' => 'true','required'=>'', 'id' => 'customer_id']) !!}

        <p class="help-block"></p>
        @if($errors->has('customer_id'))
            <p class="help-block">
                {{ $errors->first('customer_id') }}
            </p>
        @endif
    </div>
    </div>
    <div class="col-xs-{{COLUMNS}}">
            <div class="form-group">
            {!! Form::label('currency_id', trans('global.invoices.fields.currency').'*', ['class' => 'control-label']) !!}
            <?php
            $currency_id = ! empty( old('currency_id_old') ) ? old('currency_id_old') : '';
            if ( empty( $currency_id ) && ! empty( $invoice ) ) {
                $currency_id = $invoice->currency_id;
            }
            ?>
            {!! Form::select('currency_id', $currencies, old('currency_id', $currency_id), ['class' => 'form-control', 'required' => '','data-live-search' => 'true','data-show-subtext' => 'true','disabled' =>'']) !!}
            <input type="hidden" name="currency_id_old" id="currency_id_old" value="{{$currency_id}}">
            <p class="help-block"></p>
            @if($errors->has('currency_id'))
                <p class="help-block">
                    {{ $errors->first('currency_id') }}
                </p>
            @endif
        </div>
        </div>

        <div class="col-xs-{{COLUMNS}} ">
            <div class="form-group">
                {!! Form::label('status', trans('global.invoices.fields.status').'*', ['class' => 'control-label']) !!}
                {!! Form::select('status', $enum_status, old('status'), ['class' => 'form-control select2', 'required' => '']) !!}
                <p class="help-block"></p>
                @if($errors->has('status'))
                    <p class="help-block">
                        {{ $errors->first('status') }}
                    </p>
                @endif
            </div>
        </div>

          <div class="col-xs-{{COLUMNS}} ">
            <div class="form-group">
                {!! Form::label('credit_status', trans('global.credit_notes.fields.credit-status').'*', ['class' => 'control-label']) !!}
                {!! Form::select('credit_status', $enum_credit_status, old('credit_status'), ['class' => 'form-control select2', 'required' => '']) !!}
                <p class="help-block"></p>
                @if($errors->has('credit_status'))
                    <p class="help-block">
                        {{ $errors->first('credit_status') }}
                    </p>
                @endif
            </div>
        </div>

        <div class="col-xs-6">
        <div class="form-group">
           
            {!! Form::label('address', trans('global.invoices.fields.address').'', ['class' => 'control-label']) !!}
            {!! Form::textarea('address', old('address'), ['class' => 'form-control ', 'placeholder' => 'Selected customer address', 'rows' => 4]) !!}
            <p class="help-block"></p>
            @if($errors->has('address'))
                <p class="help-block">
                    {{ $errors->first('address') }}
                </p>
            @endif
        </div>
        </div>

        <div class="col-xs-6">
            <div class="form-group">                       
                {!! Form::label('delivery_address', trans('global.invoices.fields.delivery-address').'', ['class' => 'control-label']) !!}
                {!! Form::textarea('delivery_address', old('delivery_address'), ['class' => 'form-control ', 'placeholder' => trans('global.invoices.selected-customer-delivery-address'), 'rows' => 4, 'id' => 'delivery_address']) !!}
            
                <p class="help-block"></p>
                @if($errors->has('delivery_address'))
                    <p class="help-block">
                        {{ $errors->first('delivery_address') }}
                    </p>
                @endif
            </div>
        </div>

        <div class="col-xs-12">
        <div class="form-section-heading">
                    @lang('global.app_invoice')
                </div>
        </div>
        <div class="col-xs-{{COLUMNS}}">
            <div class="form-group">
               
            {!! Form::label('title', trans('global.invoices.fields.title'), ['class' => 'control-label']) !!}
            <div class="form-line">
            {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => 'Title']) !!}
            <p class="help-block"></p>
            @if($errors->has('title'))
                <p class="help-block">
                    {{ $errors->first('title') }}
                </p>
            @endif
        </div>
    </div>
        </div>
    
        
    
        <div class="col-xs-{{COLUMNS}}">
            <div class="form-group">              
            {!! Form::label('invoice_prefix', trans('global.credit_notes.fields.credit-prefix').'', ['class' => 'control-label']) !!}
            <div class="form-line">
            <?php
            $invoice_prefix = getSetting( 'credit-note-prefix', 'credit-note-settings' );
            if ( ! empty( $invoice ) ) {
                $invoice_prefix = $invoice->invoice_prefix;
            }
            ?>
            {!! Form::text('invoice_prefix', old('invoice_prefix', $invoice_prefix), ['class' => 'form-control', 'placeholder' => 'Credit note prefix']) !!}
            <p class="help-block"></p>
            @if($errors->has('invoice_prefix'))
                <p class="help-block">
                    {{ $errors->first('invoice_prefix') }}
                </p>
            @endif
        </div>
    </div>
        </div>

        <div class="col-xs-{{COLUMNS}}">
          <div class="form-group">
          {!! Form::label('reference', trans('global.invoices.fields.reference').'', ['class' => 'control-label from-label']) !!}
        <div class="form-line">
          {!! Form::text('reference', old('reference'), ['class' => 'form-control', 'placeholder' => 'Reference']) !!}
         <p class="help-block"></p>
          @if($errors->has('reference'))
        <p class="help-block">
            {{ $errors->first('reference') }}
        </p>
        @endif
        </div>
        </div>
        </div>
    
      

     <div class="col-xs-{{COLUMNS}}">
        <div class="form-group">
        {!! Form::label('invoice_no', trans('global.credit_notes.fields.credit-num'), ['class' => 'control-label']) !!}
        <div class="form-line">
        <?php
        $invoice_no = getNextNumber('Credit');
        if ( ! empty( $invoice ) ) {
            $invoice_no = $invoice->invoice_no;
        }
        ?>
        {!! Form::number('invoice_no', old('invoice_no', $invoice_no), ['class' => 'form-control', 'placeholder' => 'Enter credit note number']) !!}
        <p class="help-block"></p>
        @if($errors->has('invoice_no'))
            <p class="help-block">
                {{-- {{ $errors->first('invoice_no') }} --}}
            </p>
        @endif
        </div>
        </div>
    </div>
    
        
    

          <div class="col-xs-{{COLUMNS}}">
            <div class="form-group">
            {!! Form::label('show_quantity_as', trans('global.invoices.fields.show-quantity-as').'', ['class' => 'control-label']) !!}
            <?php
            $show_quantity_as = getSetting( 'show_quantity_as', 'credit-note-settings' );
            if ( ! empty( $invoice ) ) {
                $show_quantity_as = $invoice->show_quantity_as;
            }
            ?>
            <div class="form-line">
            {!! Form::text('show_quantity_as', old('show_quantity_as',$show_quantity_as), ['class' => 'form-control', 'placeholder' => 'Show quantity as']) !!}
            <p class="help-block"></p>
            @if($errors->has('show_quantity_as'))
                <p class="help-block">
                    {{ $errors->first('show_quantity_as') }}
                </p>
            @endif
        </div>
    </div>
        </div>
    
 
   
        <div class="col-xs-{{COLUMNS}}">
        <div class="form-group">
        {!! Form::label('invoice_date', trans('global.credit_notes.fields.credit-note-date').'', ['class' => 'control-label form-label']) !!}
        <div class="form-line">
        <?php
        $invoice_date = ! empty($invoice->invoice_date) ? digiDate( $invoice->invoice_date ) : digiTodayDateAdd();
        ?>
        {!! Form::text('invoice_date', old('invoice_date', $invoice_date), ['class' => 'form-control date', 'placeholder' => '']) !!}
        <p class="help-block"></p>
        @if($errors->has('invoice_date'))
            <p class="help-block">
                {{ $errors->first('invoice_date') }}
            </p>
        @endif
        </div>
        </div>
        </div>


          <div class="col-xs-{{COLUMNS}}">
            <div class="form-group">
            {!! Form::label('show_delivery_address', trans('global.invoices.fields.show-delivery-address-credit-notes').'', ['class' => 'control-label']) !!}
            <!-- {!! Form::select('show_delivery_address', yesnooptions(), old('show_delivery_address'), ['class' => 'form-control select2','data-live-search' => 'true','data-show-subtext' => 'true']) !!} -->
            <div class="btn-group btn-toggle" data-toggle="buttons">
                <label class="btn btn-lg btn-default">
                    <input type="radio" name="show_delivery_address" value="yes"> Yes
                </label>
                <label class="btn btn-lg btn-primary active">
                    <input type="radio" name="show_delivery_address" value="no" checked> No
                </label>
            </div>
            <p class="help-block"></p>
            @if($errors->has('show_delivery_address'))
                <p class="help-block">
                    {{ $errors->first('show_delivery_address') }}
                </p>
            @endif
        </div>
        </div>


        <div class="col-xs-{{ COLUMNS }}">
            <div class="form-group">
            {!! Form::label('allowed_paymodes', trans('global.invoices.fields.allowed-paymodes').'*', ['class' => 'control-label']) !!}
            <button type="button" class="btn btn-primary btn-xs ignorebuttonfocus" id="selectbtn-allowed_paymodes">
            {{ trans('global.app_select_all') }}
            </button>
            <button type="button" class="btn btn-primary btn-xs ignorebuttonfocus" id="deselectbtn-allowed_paymodes">
            {{ trans('global.app_deselect_all') }}
            </button>
            <?php
            $paymodes = \App\Models\PaymentGateway::where('status', '=', 'Active')->get()->pluck('name', 'id');
            ?>
            {!! Form::select('allowed_paymodes[]', $paymodes, old('allowed_paymodes'), ['class' => 'form-control select2', 'multiple' => 'multiple', 'id' => 'selectall-allowed_paymodes' , 'required' => '','data-live-search' => 'true','data-show-subtext' => 'true']) !!}
            <p class="help-block"></p>
            @if($errors->has('allowed_paymodes'))
            <p class="help-block">
            {{ $errors->first('allowed_paymodes') }}
            </p>
            @endif
            </div>
        </div>


        

        
        <div class="row">

        <div class="col-xs-{{COLUMNS}}">
            <div class="form-group">
            {!! Form::label('tax_id', trans('global.invoices.fields.tax').'', ['class' => 'control-label']) !!}
            @if ( Gate::allows('tax_create') )
                @if( 'button' === $addnew_type )
                &nbsp;<button type="button" class="btn btn-danger modalForm" data-action="createtax" data-selectedid="tax_id" data-redirect="{{route('admin.products.create')}}" data-toggle="tooltip" data-placement="bottom" data-original-title="{{trans('global.add_new_title', ['title' => strtolower( trans('global.invoices.fields.tax') )])}}">{{ trans('global.app_add_new') }}</button>
                @else        
                &nbsp;<a class="modalForm" data-action="createtax" data-selectedid="tax_id" data-toggle="tooltip" data-placement="bottom" data-original-title="{{trans('global.add_new_title', ['title' => strtolower( trans('global.invoices.fields.tax') )])}}"><i class="fa fa-plus-square"></i></a>
                @endif
            @endif
            {!! Form::select('tax_id', $taxes, old('tax_id'), ['class' => 'form-control select2','data-live-search' => 'true','data-show-subtext' => 'true']) !!}
            <p class="help-block"></p>
            @if($errors->has('tax_id'))
                <p class="help-block">
                    {{ $errors->first('tax_id') }}
                </p>
            @endif
        </div>
    </div>
    
    <?php           
    $products_details = ! empty( $invoice->products ) ? $invoice->products : array();
    if ( ! empty( $products_details ) ) {
        $products_details = json_decode( $products_details );
    }
    $tax_format = ! empty( $products_details->tax_format ) ? $products_details->tax_format : 'after_tax';
    ?>
    <div class="col-xs-{{COLUMNS}}">
        <div class="form-group">
        {!! Form::label('tax_format', trans('global.invoices.fields.tax_format').'', ['class' => 'control-label']) !!}
        {!! Form::select('tax_format', $enum_tax_format, $tax_format, ['class' => 'form-control select2']) !!}
    </div>
    </div>
    
         
        <div class="col-xs-{{COLUMNS}}">
            <div class="form-group">
            
            {!! Form::label('discount_id', trans('global.invoices.fields.discount').'', ['class' => 'control-label']) !!}
            @if ( Gate::allows('discount_create') )
                @if( 'button' === $addnew_type )
                &nbsp;<button type="button" class="btn btn-danger modalForm" data-action="creatediscount" data-selectedid="discount_id" data-redirect="{{route('admin.products.create')}}" data-toggle="tooltip" data-placement="bottom" data-original-title="{{trans('global.add_new_title', ['title' => strtolower( trans('global.invoices.fields.discount') )])}}">{{ trans('global.app_add_new') }}</button>
                @else        
                &nbsp;<a class="modalForm" data-action="creatediscount" data-selectedid="discount_id" data-toggle="tooltip" data-placement="bottom" data-original-title="{{trans('global.add_new_title', ['title' => strtolower( trans('global.invoices.fields.discount') )])}}"><i class="fa fa-plus-square"></i></a>
                @endif
            @endif
            {!! Form::select('discount_id', $discounts, old('discount_id'), ['class' => 'form-control select2','data-live-search' => 'true', 'data-show-subtext' => 'true']) !!}
            <p class="help-block"></p>
            @if($errors->has('discount_id'))
                <p class="help-block">
                    {{ $errors->first('discount_id') }}
                </p>
            @endif
        </div>
    </div>
    

    @if( isPluginActive('product') )    
    <?php           
    $products_details = ! empty( $invoice->products ) ? $invoice->products : array();
    if ( ! empty( $products_details ) ) {
        $products_details = json_decode( $products_details );
    }
    $discount_format = ! empty( $products_details->discount_format ) ? $products_details->discount_format : 'after_tax';
    ?>
    <div class="col-xs-{{COLUMNS}}">
        <div class="form-group">
         
        {!! Form::label('discount_format', trans('global.invoices.fields.discount_format').'', ['class' => 'control-label']) !!}
        {!! Form::select('discount_format', $enum_discounts_format, $discount_format, ['class' => 'form-control select2','data-live-search' => 'true', 'data-show-subtext' => 'true']) !!}
    </div>
    </div>
    

    <?php
    $enable_products_slider = getSetting( 'enable_products_slider', 'site_settings' );
    if ( 'yes' === $enable_products_slider ) {
        ?>
        <div class="col-xs-12">
            <div class="form-group productsslider" style="display: none;">
            @if( empty( $invoice ) )
                @include('admin.common.products-slider')
            @else
                @include('admin.common.products-slider',array('products_return' => $invoice))
            @endif
            </div>
            <span id="productsslider_loader" style="display: block;">
                <img src="{{asset('images/loading-small.gif')}}"/>
            </span>
        </div>
        <?php
    }
    ?>
     <div class="col-xs-12">
        <div class="form-section-heading">
                    @lang('global.app_Product')
                </div>
        </div>
    <div class="col-xs-12">
        <div class="productsrow">
        @if ( Gate::allows('product_create'))
            @if( empty( $invoice ) )
                @include('admin.common.add-products')
            @else
                @include('admin.common.add-products', array('products_return' => $invoice))
            @endif
        @endif
        </div>
        </div>
        @else
        <div class="col-xs-{{COLUMNS}}">
            <div class="">      
            {!! Form::label('amount', trans('global.invoices.fields.amount') . '*', ['class' => 'control-label']) !!}
            <div class="form-line">
            {!! Form::number('amount', old('amount'), ['class' => 'form-control', 'placeholder' => 'amount', 'step' => '0.01', 'required' => true]) !!}
            <p class="help-block"></p>
            @if($errors->has('amount'))
                <p class="help-block">
                    {{ $errors->first('amount') }}
                </p>
            @endif
        </div>
        </div>
        </div>
        @endif
    </div>
        <h4 class="Lo-collapse-btn-quote" type="" aria-controls="collapseExample">
     Additional Notes? 
        <label class="switch " style="margin-right: 5px;">
            <input type="checkbox" class="toggle" onclick="toggleDiv()">
            <span class="slider round"></span>
        </label>
    </h4>
    {{-- Collapse section Start --}}
    <div class="collapse collapsing-container" id="collapseExample">
    
        <div class="col-xs-6">
        <div class="form-group">
            {!! Form::label('invoice_notes', trans('global.invoices.fields.client-notes').'', ['class' => 'control-label']) !!}
            <?php
            $predefined_clientnote_invoice = getSetting( 'predefined_clientnote_credit_note', 'credit-note-settings' );
            if ( ! empty( $invoice ) ) {
                $predefined_clientnote_invoice = $invoice->invoice_notes;
            }
            ?>
            {!! Form::textarea('invoice_notes', old('invoice_notes', $predefined_clientnote_invoice), ['class' => 'form-control', 'placeholder' => '']) !!}
            <p class="help-block"></p>
            @if($errors->has('invoice_notes'))
                <p class="help-block">
                    {{ $errors->first('invoice_notes') }}
                </p>
            @endif
        </div>
        </div>

        <div class="col-xs-6">
        <div class="form-group">
            {!! Form::label('admin_notes', trans('global.invoices.fields.admin-notes').'', ['class' => 'control-label']) !!}
            <?php
            $predefined_adminnote_invoice = getSetting( 'predefined_adminnote_credit_note', 'credit-note-settings' );
            if ( ! empty( $invoice ) ) {
                $predefined_adminnote_invoice = $invoice->admin_notes;
            }
            ?>
            {!! Form::textarea('admin_notes', old('admin_notes', $predefined_adminnote_invoice), ['class' => 'form-control', 'placeholder' => '']) !!}
            <p class="help-block"></p>
            @if($errors->has('admin_notes'))
                <p class="help-block">
                    {{ $errors->first('admin_notes') }}
                </p>
            @endif
        </div>
        </div>

         <div class="col-xs-12">
        <div class="form-group">
            {!! Form::label('terms_conditions', trans('global.invoices.fields.terms-conditions').'', ['class' => 'control-label']) !!}
            <?php
            $predefined_terms_invoice = getSetting( 'predefined_terms_credit_note', 'credit-note-settings' );
            if ( ! empty( $invoice ) ) {
                $predefined_terms_invoice = $invoice->terms_conditions;
            }
            ?>
            {!! Form::textarea('terms_conditions', old('terms_conditions', $predefined_terms_invoice), ['class' => 'form-control', 'placeholder' => '']) !!}
            <p class="help-block"></p>
            @if($errors->has('terms_conditions'))
                <p class="help-block">
                    {{ $errors->first('terms_conditions') }}
                </p>
            @endif
        </div>
        </div>
    </div>
{{-- Collapse Section End --}}
</div>
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

        /*$('form').submit(function() {
            var radioValue = $("input[name='show_delivery_address']:checked").val();
            if (radioValue) {
                alert("You selected - " + radioValue);
            }
            return false;
        });*/
    });
</script>