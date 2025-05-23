@if($errors->first() != '')
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert"><i class="fa fa-close" style="font-size:24px"></i></button>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(Session::has('warning'))
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert"><i class="fa fa-close" style="font-size:24px"></i></button>
        {{ session('warning') }}
    </div>
@endif
@if(Session::has('status'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert"><i class="fa fa-close" style="font-size:24px"></i></button>
        {{ session('status') }}
    </div>
@endif
