{{-- Load the css file to the header --}}
<?php $user = \Auth::user();
  $editor_enabled = $user->editor_enabled;
  ?>
<script type="text/javascript">
    function loadCSS(filename) {
        var file = document.createElement("link");
        file.setAttribute("rel", "stylesheet");
        file.setAttribute("type", "text/css");
        file.setAttribute("href", filename);

        if (typeof file !== "undefined"){
            document.getElementsByTagName("head")[0].appendChild(file)
        }
    }
    loadCSS({!! '"'.asset('https://cdn.datatables.net/v/bs/dt-' . Modules\Support\Helpers\Cdn::DataTables . '/r-' . Modules\Support\Helpers\Cdn::DataTablesResponsive . '/datatables.min.css').'"' !!});
   @if($editor_enabled)
        loadCSS({!! '"'.asset('https://cdnjs.cloudflare.com/ajax/libs/summernote/' . Modules\Support\Helpers\Cdn::Summernote . '/summernote.css').'"' !!});
        @if($include_font_awesome)
            loadCSS({!! '"'.asset('https://netdna.bootstrapcdn.com/font-awesome/' . Modules\Support\Helpers\Cdn::FontAwesome . '/css/font-awesome.min.css').'"' !!});
        @endif
        @if($codemirror_enabled)
            loadCSS({!! '"'.asset('https://cdnjs.cloudflare.com/ajax/libs/codemirror/' . Modules\Support\Helpers\Cdn::CodeMirror . '/codemirror.min.css').'"' !!});
            loadCSS({!! '"'.asset('https://cdnjs.cloudflare.com/ajax/libs/codemirror/' . Modules\Support\Helpers\Cdn::CodeMirror . '/theme/'.$codemirror_theme.'.min.css').'"' !!});
        @endif
    @endif
</script>