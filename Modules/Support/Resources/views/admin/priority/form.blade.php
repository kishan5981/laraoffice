<?php use Collective\Html\FormFacade as CollectiveForm; ?>
<div class="form-group">
    {!! CollectiveForm::label('name', 'Name :', ['class' => 'col-lg-2 control-label']) !!}
    <div class="col-lg-10">
        {!! CollectiveForm::text('name', isset($priority->name) ? $priority->name : null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! CollectiveForm::label('color', 'Color :', ['class' => 'col-lg-2 control-label']) !!}
    <div class="col-lg-10">
        <input type="color" name="color" value="{{ isset($priority->color) ? $priority->color : "#000000" }}" class="form-control">
    </div>
</div>
<div class="form-group">
    <div class="col-lg-10 col-lg-offset-2">
        {!! link_to_route('admin.priority.index', 'Back', null, ['class' => 'btn btn-default']) !!}
        @if(isset($priority))
            {!! CollectiveForm::submit('Update', ['class' => 'btn btn-primary']) !!}
        @else
            {!! CollectiveForm::submit('Update', ['class' => 'btn btn-primary']) !!}
        @endif
    </div>
</div>
