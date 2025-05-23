@extends('layouts.app')
@section('page', trans('support::lang.show-ticket-title') . trans('support::lang.colon') . $ticket->subject)
@section('content')
        @include('support::shared.header')
        @include('support::tickets.partials.ticket_body')
        <br>
        <h2>{{ trans('support::lang.comments') }}</h2>
        @include('support::tickets.partials.comments')
        {{-- pagination --}}
        {!! $comments->render() !!}
        @include('support::tickets.partials.comment_form')
@endsection

@section('footer')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.deleteit', function(event){
                event.preventDefault();
                if (confirm("{!! trans('support::lang.show-ticket-js-delete') !!}" + $(this).attr("node") + " ?"))
                {
                    var form = $(this).attr("form");
                    $("#" + form).submit();
                }

            });
            $('#category_id').change(function(){
                var loadpage = "{!! route('admin.' . $setting->grab('main_route'). '.agentselectlist') !!}/" + $(this).val() + "/{{ $ticket->id }}";
                $('#agent_id').load(loadpage);
            });
            $('#confirmDelete').on('show.bs.modal', function (e) {
                $message = $(e.relatedTarget).attr('data-message');
                $(this).find('.modal-body p').text($message);
                $title = $(e.relatedTarget).attr('data-title');
                $(this).find('.modal-title').text($title);

                // Pass form reference to modal for submission on yes/ok
                var form = $(e.relatedTarget).closest('form');
                $(this).find('.modal-footer #confirm').data('form', form);
            });

            <!-- Form confirm (yes/ok) handler, submits form -->
            $('#confirmDelete').find('.modal-footer #confirm').on('click', function(){
                $(this).data('form').submit();
            });
        });
    </script>
    @include('support::tickets.partials.summernote')
@append
