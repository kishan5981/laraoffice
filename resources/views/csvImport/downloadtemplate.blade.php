{{-- <a href="{{ url( 'csvtemplates/' . $csvtemplatepath ) }}" class="btn btn-info">@lang('global.download-template')</a> --}}
<a href="{{ route('admin.csv_download', ['path' => $csvtemplatepath]) }}" class="btn btn-info">@lang('global.download-template')</a>
