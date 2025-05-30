<?php
$currency_id = $invoice->currency_id;
$transactions = $invoice->transactions();
?>
<div id="invoice-template" class="row">
    <div class="col-lg-12">
<h3>@lang('custom.invoices.related-transactions')</h3>
    <table class="table table-bordered sys_table table-responsive">
        <tbody>
            <tr class="text-view">
                <th>@lang('custom.invoices.date')</th>
                
                @if( ! isCustomer() )
                <th>
                @lang('custom.invoices.account')                
                </th>
                @endif
                <th class="text-right" style="text-align: left !important;">@lang('custom.invoices.amount')</th>
                <th>@lang('custom.invoices.description')</th>
				<th>@lang('global.app_status')</th>
               
            </tr>
            @foreach( $transactions->get() as $transaction )
            <?php
            $account = $transaction->account()->where('id', '=', $transaction->account_id)->first();
            $account_name = ! empty( $account ) ? $account->name : '';
            ?>
            <tr class="info">
                <td>{{ digiDate( $transaction->created_at, true ) }}</td>
                @if( ! isCustomer() )
                <td>{{$account_name}}</td>
                @endif
                <td class="text-right">{{digiCurrency( $transaction->amount, $currency_id )}}
                    <p><span class="label label-info label-many">
                        <?php
                        $paymentmethod = $transaction->paymentmethod;
                        if ( is_numeric( $paymentmethod ) ) {
                            $paymentmethod = \App\Models\PaymentGateway::find($paymentmethod)->name;
                        }
                        ?>
                        {{$paymentmethod}}</span></p>
                </td>
                <td>{{$transaction->description}}</td>
				<td>{{$transaction->payment_status ?? $transaction->payment_status}}</td>
                
            </tr>
            @endforeach

    </tbody>

</table>
</div>
</div>
