<button class="pull-right btn-summary" data-toggle="collapse" data-target=".filters" aria-expanded="true"><i class="fa fa-filter"></i>&nbsp;@lang('others.statistics.filter')</button>
<button class="pull-right btn-summary" data-toggle="collapse" data-target=".canvas" aria-expanded="true"><i class="fa fa-bar-chart"></i>&nbsp;@lang('others.statistics.summary')</button>&nbsp;
<div id="canvas" class="collapse canvas">
    <div class="panel panel-default canvas">
        <div class="panel-heading">
        	@lang('others.statistics.tasks-summary') 
        </div>
   
        <div class="panel-body table-responsive" id="canvas-panel-body">
			 @include('admin.tasks.canvas.canvas-panel-body')
		</div>
	</div>
</div>
