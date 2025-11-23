<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recipient;
use App\Models\frontend\Remark; // ✅ ปรับ namespace ให้ถูกต้อง

class RemarkController extends Controller
{
    // แสดง remark ทั้งหมดของ recipient
    public function RemarkAll($id)
    {
        $recipients = Recipient::findOrFail($id);
        $remarks = Remark::where('recipient_id', $id)->latest()->get();

        return view('frontend.remark.remark_all', compact('recipients', 'remarks'));
    }

    // ฟอร์มเพิ่ม remark
    public function RemarkAdd($id)
    {
        $recipients = Recipient::findOrFail($id);
        return view('frontend.remark.remark_add', compact('recipients'));
    }

    // บันทึก remark ใหม่
    public function StoreRemark(Request $request)
    {
        $request->validate([
            'recipient_id'       => 'required|integer',
            'date'               => 'required|date',
            'remark_name'        => 'required|string|max:255',
            'remark_description' => 'nullable|string',
        ]);

        Remark::create([
            'recipient_id'       => $request->recipient_id,
            'date'               => $request->date,
            'remark_name'        => $request->remark_name,
            'remark_description' => $request->remark_description ?? '',
        ]);

        $notification = [
            'message'    => 'Remark Added Successfully',
            'alert-type' => 'success'
        ];

        // ✅ ใช้ชื่อ route ที่คุณประกาศจริง เช่น remark_all
    return redirect()->route('remark.all', ['id' => $request->recipient_id])->with($notification);

    }
}