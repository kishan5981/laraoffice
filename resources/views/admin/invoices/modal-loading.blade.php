<!-- Modal HTML -->
<div id="loadingModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content" id="loadingModalContent">                        
            <div id="loading_icon" style="text-align: center;"><img src="{{asset('images/loading.gif')}}"></div>
            <div id="content"></div>

            <div class="modal-footer">
		        <button id="invoiceSend" class="btn btn-primary">{{trans('custom.email.send')}}</button>
		        <button type="button" data-dismiss="modal" class="btn">{{trans('custom.common.close')}}</button>
			</div>
        </div>
    </div>



</div>


