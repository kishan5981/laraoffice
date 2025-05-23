<table class="table table-bordered table-striped ajaxTable @can('content_page_delete_multi') dt-select @endcan">
                <thead>
                    <tr>
                        @can('content_page_delete_multi')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('global.content-pages.fields.title')</th>
                        <th>@lang('global.content-pages.fields.created-at')</th>
                        @if( isAdmin() )
                        <th>@lang('global.content-pages.fields.category-id')</th>
                        <th>@lang('global.content-pages.fields.tag-id')</th>
                        
                        <th>@lang('global.content-pages.fields.featured-image')</th>

                        <!--th>&nbsp;</th>-->
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