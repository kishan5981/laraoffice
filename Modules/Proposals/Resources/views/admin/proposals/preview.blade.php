@extends('layouts.app')

@section('content')
  
<div class="text-right">
    <a href="{{route('admin.proposals.show', $invoice->id)}}" class="btn btn-primary ml-sm no-shadow no-border"><i class="fa fa-long-arrow-left"></i> @lang('proposals::custom.proposals.app_back_to_proposal')</a>

    @can('proposal_pdf_download')
    <a href="{{route('admin.proposals.invoicepdf', $invoice->slug)}}" class="btn btn-info buttons-pdf ml-sm"><i class="fa fa-file-pdf-o"></i> @lang('custom.common.download-pdf')</a>
    @endcan

    @can('proposal_pdf_view')
    <a href="{{route('admin.proposals.invoicepdf', ['slug' => $invoice->slug, 'operation' => 'view'] )}}" class="btn btn-warning buttons-excel ml-sm"><i class="fa fa-file-text-o"></i> @lang('custom.common.view-pdf')</a>
    @endcan

    @can('proposal_changestatus_accepted')
    <a href="{{route('admin.proposals.changestatus', [ 'id' => $invoice->id, 'status' => 'accepted'])}}" class="btn btn-success buttons-excel ml-sm">{{trans('proposals::custom.proposals.accepted')}}</a>
    @endcan

    @can('proposal_changestatus_rejected')
    <a href="{{route('admin.proposals.changestatus', [ 'id' => $invoice->id, 'status' => 'rejected'])}}" class="btn btn-danger buttons-excel ml-sm">{{trans('proposals::custom.proposals.rejected')}}</a>
    @endcan

    @can('proposal_print')
    <a href="javascript:void(0);" class="btn btn-primary buttons-print ml-sm" onclick="printItem('invoice_pdf')"><i class="fa fa-print"></i> @lang('custom.common.print')</a>
    @endcan
</div>
       
    @include('proposals::admin.proposals.invoice.invoice-content', compact('invoice'))
@stop


    @parent
    <script type="text/javascript">
   function printItem(elem) {
          
          var formContent = document.getElementById(elem).innerHTML;
  
  // Create a new window to print
  var printWindow = window.open('', '_blank');
  
  // Write the form content to the new window
  printWindow.document.write('<html><head><title>Print Form</title></head><body>');
  printWindow.document.write(formContent);
  printWindow.document.write('</body></html>');
  
  // Close the document after writing
  printWindow.document.close();
  
  // Print the window
  printWindow.print();
      }
   
    </script>
