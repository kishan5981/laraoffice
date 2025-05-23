<?php use Collective\Html\FormFacade as CollectiveForm; ?>
<div class="form-group">
    {!! CollectiveForm::label('name', 'Name :', ['class' => 'col-lg-2 control-label']) !!}
    <div class="col-lg-10">
        {!! CollectiveForm::text('name', isset($status->name) ? $status->name : null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! CollectiveForm::label('color', 'Color :', ['class' => 'col-lg-2 control-label']) !!}
    <div class="col-lg-10">
        <input type="color" name="color" value="{{ isset($status->color) ? $status->color : "#000000" }}" class="form-control">
    </div>
</div>
<div class="form-group">
    <div class="col-lg-10 col-lg-offset-2">
        {!! link_to_route('admin.status.index', 'Back', null, ['class' => 'btn btn-default']) !!}
        @if(isset($status))
            {!! CollectiveForm::submit('Update', ['class' => 'btn btn-primary']) !!}
        @else
            {!! CollectiveForm::submit('Update', ['class' => 'btn btn-primary']) !!}
        @endif
    </div>
</div>
