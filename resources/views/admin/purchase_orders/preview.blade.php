@extends('layouts.app')

@section('content')
    <div class="text-right">
    <br>
    <a href="{{route('admin.purchase_orders.show', $invoice->id)}}" class="btn btn-primary ml-sm no-shadow no-border"><i class="fa fa-long-arrow-left"></i> @lang('custom.purchase_orders.app_back_to_quote')</a>
    <a href="{{route('admin.purchase_orders.invoicepdf', $invoice->slug)}}" class="btn btn-primary buttons-pdf ml-sm"><i class="fa fa-file-pdf-o"></i> @lang('custom.common.download-pdf')</a>
    <a href="{{route('admin.purchase_orders.invoicepdf', ['slug' => $invoice->slug, 'operation' => 'view'] )}}" class="btn btn-primary buttons-excel ml-sm"><i class="fa fa-file-text-o"></i> @lang('custom.common.view-pdf')</a>
    <a href="javascript:void(0);" class="btn btn-primary buttons-print ml-sm" onclick="printItem('invoice_pdf')"><i class="fa fa-print"></i> @lang('custom.common.print')</a>
    </div>
    @include('admin.purchase_orders.invoice.invoice-content', compact('invoice'))
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
