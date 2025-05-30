<table class="table table-bordered table-striped ajaxTable @can('article_delete_multi') dt-select @endcan">
                <thead>
                    <tr>
                        @can('article_delete_multi')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('global.articles.fields.title')</th>
                        @if( isAdmin() )
                        <th>@lang('global.articles.fields.category-id')</th>
                        <th>@lang('global.articles.fields.tag-id')</th>
                        {{--<th>@lang('global.articles.fields.page-text')</th>--}}
                        <th>@lang('global.articles.fields.excerpt')</th>
                        <th>@lang('global.articles.fields.featured-image')</th>
                        <!--<th>&nbsp;</th>-->
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