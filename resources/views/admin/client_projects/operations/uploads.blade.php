@extends('layouts.app')

@section('content')
    @include('admin.client_projects.operations.menu', array('client_project' => $project))
    <!-- <h3 class="page-title">@lang('custom.invoices.upload-documents')</h3> -->
    {!! Form::open(['method' => 'POST', 'route' => ['admin.project_files.process-upload', $project->id], 'files' => true,]) !!}
      <div class="panel panel-default">
            <div class="panel-heading">
                @lang('custom.invoices.upload-documents')
            </div>
            
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-6">
                    <div class="form-group">
                        {!! Form::label('attachments', trans('global.assets.fields.attachments').'', ['class' => 'control-label']) !!}
                        {!! Form::file('attachments[]', [
                            'multiple',
                            'class' => 'form-control file-upload',
                            'data-url' => route('admin.media.upload'),
                            'data-bucket' => 'attachments',
                            'data-filekey' => 'attachments',
                            'data-accept' => FILE_TYPES_GENERAL,
                            ]) !!}
                        <p class="help-block">{{trans('others.global_file_types_general')}}</p>
                        <!-- <p class="help-block">Accepted file types: png,jpg,jpeg,gif,pdf,doc,docx,xls,xlsx,dot,ppt,pptx</p> -->
                        
                        
                        <div class="photo-block">
                            <div class=" form-group">
                            <div class="progress-bar">&nbsp;</div>
                            <div class="files-list">

                                @foreach($project->getMedia('attachments') as $media)
                                    <p class="form-group">
                                        <a href="{{ route('admin.home.media-download', $media->id) }}">{{ $media->name }} ({{ $media->size }} KB)</a>
                                        <a href="#" class="btn btn-xs btn-danger remove-file">Remove</a>
                                        <input type="hidden" name="attachments_id[]" value="{{ $media->id }}">
                                    </p>
                                @endforeach
                            </div>
                            </div>
                        </div>
                        @if($errors->has('attachments'))
                            <p class="help-block">
                                {{ $errors->first('attachments') }}
                            </p>
                        @endif
                    </div>
                    </div>
                </div>
            </div>
        </div>
    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger', 'id' => 'savebutton', 'style' => 'display:none']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent

    <script src="{{ asset('adminlte/plugins/fileUpload/js/jquery.iframe-transport.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/fileUpload/js/jquery.fileupload.js') }}"></script>
    <script>
        var uploadedfiles = $('.remove-file').length;
        $(function () {
            $('.file-upload').each(function () {
                var $this = $(this);
                var $parent = $(this).parent();

                $(this).fileupload({
                    dataType: 'json',
                    formData: {
                        model_name: 'ClientProject',
                        bucket: $this.data('bucket'),
                        file_key: $this.data('filekey'),
                        accept: $this.data('accept'),
                        _token: '{{ csrf_token() }}'
                    },
                    add: function (e, data) {
                        data.submit();
                    },
                    done: function (e, data) {
                        $.each(data.result.files, function (index, file) {
                            
                            if ( file.size > 0 ) {
                                var $line = $($('<p/>', {class: "form-group"}).html(file.name + ' (' + file.size + ' bytes)').appendTo($parent.find('.files-list')));
                                $line.append('<a href="#" class="btn btn-xs btn-danger remove-file">Remove</a>');
                                $line.append('<input type="hidden" name="' + $this.data('bucket') + '_id[]" value="' + file.id + '"/>');
                                if ($parent.find('.' + $this.data('bucket') + '-ids').val() != '') {
                                    $parent.find('.' + $this.data('bucket') + '-ids').val($parent.find('.' + $this.data('bucket') + '-ids').val() + ',');
                                }
                                $parent.find('.' + $this.data('bucket') + '-ids').val($parent.find('.' + $this.data('bucket') + '-ids').val() + file.id);
                            } else {
                                var $line = $($('<p/>', {class: "form-group"}).html(file.name).appendTo($parent.find('.files-list')));
                                $line.append('<a href="#" class="btn btn-xs btn-danger remove-file">Not accepted</a>');
                            }
                        });
                        $parent.find('.progress-bar').hide().css(
                            'width',
                            '0%'
                        );
						$('#savebutton').show();
                    }
                }).on('fileuploadprogressall', function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $parent.find('.progress-bar').show().css(
                        'width',
                        progress + '%'
                    );
					
                });
            });
            $(document).on('click', '.remove-file', function () {
                var $parent = $(this).parent();
                $parent.remove();
				
				var uploads = $('input[name=attachments_id\\[\\]]').length;
				if ( uploads == 0 ) {
					$('#savebutton').hide();
				}

                var uploadedfiles_now = $('.remove-file').length;
                if( uploadedfiles_now != uploadedfiles ) {
                    $('#savebutton').show();
                }
                return false;
            });
        });
    </script>
@stop