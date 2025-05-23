@php
    use Illuminate\Support\Str;
@endphp


<table id="ticket-table" class="ticketit-table table table-striped table-bordered dt-responsive nowrap" style="width:100%">
    <thead>
        <tr>
            <th>S.No</th>
            <th>Subject</th>
            <th>Status</th>
            <th>Last Updated</th>
            <th>Agent</th>
            <th>Priority</th>
            <th>Owner</th>
            <th>Category</th>
            @if ( ! config('app.action_buttons_hover') )
                        
                @if( request('show_deleted') == 1 )
                <th>&nbsp;</th>
                @else
                <th>&nbsp;</th>
                @endif
            @endif        

          
            
            
        </tr>
    </thead>
    <tbody>
        
        {{-- Loop through the data and generate table rows --}}
        @foreach($data as $row)
       
       
            <tr>
                <td>{{ $row->id }}</td>
                <td>
                    {!! $row->subject !!}
                    @if ( config('app.action_buttons_hover') )
                        <br>{!! view('actionsTemplateHover', ['row' => $row, 'gateKey' => 'support_', 'routeKey' => 'admin.support']) !!}
                    @endif
                </td>
                <td>{!! $row->status !!}</td>
                <td>{{ $row->updated_at }}</td>
                <td>{{ $row->agent }}</td>
                <td>{!! $row->priority !!}</td>
                <td>{{ $row->owner }}</td>
                <td>{!! $row->category !!}</td>
                @if ( ! config('app.action_buttons_hover') )
                <td>
                {{-- Edit button --}}
                <!-- <a href="{{ route('admin.support.edit', $row->id) }}" class="btn btn-primary">Edit</a> -->
                <a href="{{ route('admin.support.show', $row->id) }}" class="btn btn-primary">View</a>
                
                {{-- Delete button --}}
                <form action="{{ route('admin.support.destroy', $row->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                </form>
            </td>
            @endif 

                
                
                
            </tr>
           
        
        @endforeach
    </tbody>
</table>

<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#ticket-table').DataTable();
});
</script>