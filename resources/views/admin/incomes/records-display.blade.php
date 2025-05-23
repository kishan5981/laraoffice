<table class="table table-bordered table-striped ajaxTable @can('income_delete_multi') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
    <thead>
        <tr>
            @can('income_delete_multi')
            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
            @endcan
            <th>@lang('global.income.fields.account')</th>
            <th>@lang('global.income.fields.income-category')</th>
            <th>@lang('global.income.fields.entry-date')</th>
            <th>@lang('global.income.fields.amount')</th>
            <th>@lang('global.income.fields.payer')</th>
            <th>@lang('global.income.fields.pay-method')</th>
            @if ( ! config('app.action_buttons_hover') )
                @if( request('show_deleted') == 1 )
                <th>&nbsp;</th>
                @else
                <th>&nbsp;</th>
                @endif
            @endif
            @endif
        </tr>
    </thead>
</table>