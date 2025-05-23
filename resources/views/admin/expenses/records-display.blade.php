<table class="table table-bordered table-striped ajaxTable @can('expense_delete_multi') dt-select @endcan">
<thead>
    <tr>
        @can('expense_delete_multi')
            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
        @endcan

        <th>@lang('global.expense.fields.name')</th>
        <th>@lang('global.expense.fields.account')</th>
        <th>@lang('global.expense.fields.expense-category')</th>
        <th>@lang('global.expense.fields.entry-date')</th>
        <th>@lang('global.expense.fields.amount')</th>
        <th>@lang('global.expense.fields.payee')</th>
        <th>@lang('global.expense.fields.payment-method')</th>
        @if ( ! config('app.action_buttons_hover') )
                @if( request('show_deleted') == 1 )
                <th>&nbsp;</th>
                @else
                <th>&nbsp;</th>
                @endif
            @endif

    </tr>
</thead>
</table>