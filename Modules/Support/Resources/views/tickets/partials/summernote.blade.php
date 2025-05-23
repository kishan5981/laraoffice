   {{-- @if($editor_enabled)

@if($codemirror_enabled)
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/{{Kordy\Ticketit\Helpers\Cdn::CodeMirror}}/codemirror.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/{{Kordy\Ticketit\Helpers\Cdn::CodeMirror}}/mode/xml/xml.min.js"></script>
@endif
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
@if($editor_locale)
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
@endif
<script>


    $(function() {

        var options = $.extend(true, {lang: localLang {!! $codemirror_enabled ? ", codemirror: {theme: '{$codemirror_theme}', mode: 'text/html', htmlMode: true, lineWrapping: true}" : ''  !!} } , {!! $editor_options !!});

        $("textarea.summernote-editor").summernote(options);

    
            $(document).on('click', 'label[for=content]', function(){
            $("#content").summernote("focus");
        });
    });


</script>
@endif --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.0/codemirror.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.0/mode/xml/xml.min.js"></script>
<script>
    $(function() {
        var options = {
            lang: localLang,
            codemirror: {
                theme: 'monokai',
                mode: 'text/html',
                htmlMode: true,
                lineWrapping: true
            }
        };

        $("textarea.summernote-editor").summernote(options);

        $(document).on('click', 'label[for=content]', function(){
            $("#content").summernote("focus");
        });
        $("form").submit(function() {
        // Update the textarea with Summernote's content
        $("textarea.summernote-editor").each(function() {
            var $textarea = $(this);
            var content = $textarea.summernote('code'); // Get Summernote's content
            $textarea.val(content); // Update the textarea value
        });
    });
    });
</script>
