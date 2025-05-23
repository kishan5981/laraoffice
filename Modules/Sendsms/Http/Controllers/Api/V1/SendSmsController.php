<?php

namespace Modules\Sendsms\Http\Controllers\Api\V1;

use App\Models\SendSm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Sendsms\Http\Requests\Admin\StoreSendSmsRequest;
use Modules\Sendsms\Http\Requests\Admin\UpdateSendSmsRequest;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class SendSmsController extends Controller
{
    public function index()
    {
        return SendSm::all();
    }

    public function show($id)
    {
        return SendSm::findOrFail($id);
    }

    public function update(UpdateSendSmsRequest $request, $id)
    {
        $send_sm = SendSm::findOrFail($id);
        $send_sm->update($request->all());
        return $send_sm;
    }

    public function store(StoreSendSmsRequest $request)
    {
        $data = [
            'tonumber'    => $request->send_to,
            'content'     => $request->message,
            'invoice_id'  => $request->invoice_id ?? null,
        ];

        $res = SendSm::sendSms($data);

        $send_sm = SendSm::create([
            'send_to'        => $data['tonumber'],
            'message'        => $data['content'] ?? '',
            'status'         => $res['status'],
            'gateway_response' => json_encode($res),
        ]);

        return response()->json([
            'status'        => $res['status'],
            'message'       => $res['message'],
            'whatsapp_url'  => $res['whatsapp_url'],
            'data'          => $send_sm,
        ]);
    }

    public function destroy($id)
    {
        $send_sm = SendSm::findOrFail($id);
        $send_sm->delete();
        return response()->json(['status' => 'success', 'message' => 'Deleted successfully']);
    }
}

// Add this in SendSm model
