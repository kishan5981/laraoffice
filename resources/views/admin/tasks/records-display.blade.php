<table class="table table-bordered table-striped ajaxTable @can('task_delete_multi') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('task_delete_multi')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('global.tasks.fields.name')</th>
                        <th>@lang('global.tasks.fields.description')</th>
                        <th>@lang('global.tasks.fields.status')</th>
                        
                        <th>@lang('global.tasks.fields.start-date')</th>
                        <th>@lang('global.tasks.fields.due-date')</th>
                        <th>@lang('global.tasks.fields.user')</th>
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