@extends('layouts.app')

@section('content')
    <div class="text-right">
    <br>
    <a href="{{route('admin.credit_notes.show', $invoice->id)}}" class="btn btn-primary ml-sm no-shadow no-border"><i class="fa fa-long-arrow-left"></i> @lang('custom.credit_notes.app_back_to_credit_note')</a>
    
    @can('invoice_pdf_download')
    <a href="{{route('admin.credit_notes.invoicepdf', $invoice->slug)}}" class="btn btn-primary buttons-pdf ml-sm"><i class="fa fa-file-pdf-o"></i> @lang('custom.common.download-pdf')</a>
    @endcan
    
    @can('invoice_pdf_view')
    <a href="{{route('admin.credit_notes.invoicepdf', ['slug' => $invoice->slug, 'operation' => 'view'] )}}"  class="btn btn-primary buttons-excel ml-sm" target="_blank"><i class="fa fa-file-text-o"></i> @lang('custom.common.view-pdf')</a>
    @endcan
    
    @can('invoice_print')
    <a href="javascript:void(0);" class="btn btn-primary buttons-print ml-sm" onclick="printItem('invoice_pdf')"><i class="fa fa-print"></i> @lang('custom.common.print')</a>
    @endcan
    </div>
    @include('admin.credit_notes.invoice.invoice-content', compact('invoice'))
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
