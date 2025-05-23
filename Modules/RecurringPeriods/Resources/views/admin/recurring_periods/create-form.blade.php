<h3 class="page-title">@lang('global.recurring-periods.title')</h3>
{!! Form::open(['method' => 'POST', 'route' => ['admin.recurring_periods.store'], 'id' => 'frmRecurringPeriods']) !!}

<div class="panel panel-default">
    <div class="panel-heading">
        @lang('global.app_create')
    </div>

    <div class="alert message_bag" style="display:none">
        <ul></ul>
    </div>
    
    <div class="panel-body recurring_p-create">
        @include('recurringperiods::admin.recurring_periods.form-fields')            
    </div>
</div>
<?php
if ( empty( $is_ajax ) ) {
  $is_ajax = 'no';
}
?>
<input type="hidden" name="is_ajax" value="{{$is_ajax}}">
<?php
if ( empty( $selectedid ) ) {
  $selectedid = 'recurring_period_id';
}
?>
<input type="hidden" name="selectedid" value="{{$selectedid}}">
<?php
if ( empty( $fetchaddress ) ) {
  $fetchaddress = 'no';
}
?>
<input type="hidden" name="fetchaddress" value="{{$fetchaddress}}">
{!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-success wave-effect saveButtonRecurringPeriods']) !!}
{!! Form::button(trans('global.app_Cancel'), ['class' => 'btn btn-secondary wave-effect','id' => 'cancelButton', 'name' => 'Cancel','value' => 'Cancel']) !!} 

{!! Form::close() !!}

@if( ! empty( $is_ajax ) && 'yes' === $is_ajax )
<script type="text/javascript">
 
    $(document).on('click', '.saveButtonRecurringPeriods', function(e){
            e.preventDefault();

            $.ajax({
                url: "{{route('admin.recurring_periods.store')}}",
                type:'POST',
                data: $( '#frmRecurringPeriods' ).serializeArray(),
                success: function(data) {
                    if($.isEmptyObject(data.error)){
                        notifyMe('success', data.success);
                        $('#loadingModal').modal('hide');

                        var value = data.record.id;
                        var title = data.record.title;
                        $('#' + data.record.selectedid).append('<option value="'+value+'" selected="selected">'+title+'</option>');
                        if ( data.record.fetchaddress == 'yes' ) {
                          $('#' + data.record.selectedid).trigger('change');
                        }

                    }else{
                        printErrorMsg(data.error);
                    }
                }
            });
  });

  function printErrorMsg (msg) {
      $(".message_bag").find("ul").html('');
      $(".message_bag").css('display','block');
      $(".message_bag").addClass('alert-danger');
      $.each( msg, function( key, value ) {
          $(".message_bag").find("ul").append('<li>'+value+'</li>');
      });
  }
</script>
@endif
@section('javascript') 

@parent
@include('admin.common.modal-scripts')

@endsection