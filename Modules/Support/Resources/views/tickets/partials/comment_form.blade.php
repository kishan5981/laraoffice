<div class="panel panel-default">
    <div class="panel-body">
        {!! Form::open(['method' => 'POST', 'route' =>'admin.' . $setting->grab('main_route').'-comment.store', 'class' => 'form-horizontal']) !!}


            {!! Form::hidden('ticket_id', $ticket->id ) !!}

            <fieldset>
                <legend>{!! trans('support::lang.reply') !!}</legend>
                <div class="form-group">
                    <div class="col-lg-12">
                        {!! Form::textarea('content', null, ['class' => 'form-control summernote-editor', 'rows' => "3"]) !!}
                    </div>
                </div>

                <div class="text-right col-md-12">
                    {!! Form::submit( trans('support::lang.btn-submit'), ['class' => 'btn btn-primary']) !!}
                </div>

            </fieldset>
        {!! Form::close() !!}
    </div>
</div>
