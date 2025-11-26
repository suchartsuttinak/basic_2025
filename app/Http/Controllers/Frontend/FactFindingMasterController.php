<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Recipient;
use App\Models\Factfinding;
use Illuminate\Http\Request;
use App\Models\FactFindingDocument;
use App\Http\Controllers\Controller;
use App\Models\Document;

class FactFindingMasterController extends Controller
{
    public function FactMasterAll($id)
    {
        // ดึงข้อมูลผู้รับ
    $recipients = Recipient::findOrFail($id);

    // ดึง factfinding ของผู้รับ (One-to-One)
    $factFinding = Factfinding::where('recipient_id', $id)->first();

    // ดึงเอกสาร pivot
    $documents = \App\Models\FactFindingDocument::where('factfinding_id', $factFinding->id ?? 0)->get();

    return view('frontend.fact_master.fact_master_all', [
        'recipients'  => $recipients,
        'factFinding' => $factFinding,
        'documents'   => $documents,
    ]);


    }

    public function FactMasterAdd($id)
    {
        $documents = Document::all();
        $recipients = Recipient::findOrFail($id);

        return view('frontend.fact_master.fact_master_add', compact('recipients', 'documents'));
    }

public function FactMasterStore(Request $request)
{
    $validated = $request->validate([
        'recipient_id' => 'required|integer',
        'date' => 'required|date',
        'fact_name' => 'required|string|max:255',

        'appearance' => 'nullable|string',
        'skin' => 'nullable|string',
        'scar' => 'nullable|string',
        'disability' => 'nullable|string',
        'evidence' => 'nullable|string',

        'sick' => 'nullable|in:yes,no',
        'sick_detail' => 'nullable|string',
        'treatment' => 'nullable|string',
        'hospital' => 'nullable|string',

        'weight' => 'nullable|numeric',
        'height' => 'nullable|numeric',

        'hygiene' => 'nullable|string',
        'oral_health' => 'nullable|string',
        'injury' => 'nullable|string',
        'case_history' => 'nullable|string',
        'recorder' => 'nullable|string',

        'active' => 'nullable|boolean',

        'documents' => 'nullable|array',
        'documents.*' => 'integer',

        // validation rules thai
        ], [], [
        'recipient_id' => 'รหัสผู้รับ',
        'date' => 'วันที่',
        'fact_name' => 'ชื่อข้อเท็จจริง',
        'appearance' => 'รูปลักษณ์',
        'skin' => 'สีผิว',
        'scar' => 'แผลเป็น',
        'disability' => 'ความพิการ',
        'evidence' => 'หลักฐาน',
        'sick' => 'การเจ็บป่วย',
        'sick_detail' => 'รายละเอียดการเจ็บป่วย',
        'treatment' => 'การรักษา',
        'hospital' => 'โรงพยาบาล',
        'weight' => 'น้ำหนัก',
        'height' => 'ส่วนสูง',
        'hygiene' => 'สุขอนามัย',
        'oral_health' => 'สุขภาพช่องปาก',
        'injury' => 'การบาดเจ็บ',
        'case_history' => 'ประวัติกรณี',
        'recorder' => 'ผู้บันทึก',
        'active' => 'สถานะ',
        'documents' => 'เอกสาร',
    ]);

  //End validation rules thai

    // ✅ ดึงข้อมูล Recipient
    $recipients = Recipient::findOrFail($validated['recipient_id']);

     // 3. ตรวจสอบว่ามี factfinding อยู่แล้วหรือไม่ (One-to-One)
    $existing = Factfinding::where('recipient_id', $validated['recipient_id'])->first();
    if ($existing) {
        // ✅ ถ้ามีแล้ว → redirect กลับพร้อมแจ้งเตือน
        return redirect()
            ->route('factmaster.edit', $validated['recipient_id'])
            ->with('error', 'มีข้อมูล Factfinding ของผู้รับรายนี้อยู่แล้ว กรุณาแก้ไขแทนการบันทึกใหม่');
    }

    // ✅ เตรียม payload ให้ครบ
    $payload = [
        'date' => $validated['date'] ?? now()->toDateString(),
        'fact_name' => $validated['fact_name'],
        'appearance' => $validated['appearance'] ?? 'ไม่ระบุ',
        'skin' => $validated['skin'] ?? 'ไม่ระบุ',
        'scar' => $validated['scar'] ?? 'ไม่ระบุ',
        'disability' => $validated['disability'] ?? 'ไม่ระบุ',
        'evidence' => $validated['evidence'] ?? '',
       'sick' => $validated['sick'] ?? 'no',
        'sick_detail' => $validated['sick_detail'] ?? '',
        'treatment' => $validated['treatment'] ?? '',
        'hospital' => $validated['hospital'] ?? '',
        'weight' => isset($validated['weight']) ? (float)$validated['weight'] : 0,
        'height' => isset($validated['height']) ? (float)$validated['height'] : 0,
        'hygiene' => $validated['hygiene'] ?? 'ไม่ระบุ',
        'oral_health' => $validated['oral_health'] ?? 'ไม่ระบุ',
        'injury' => $validated['injury'] ?? 'ไม่ระบุ',
        'case_history' => $validated['case_history'] ?? '',
        'recorder' => $validated['recorder'] ?? '',
        'active' => $validated['active'] ?? 1,
    ];

    // ✅ ส่ง payload เข้าไปใน updateOrCreate
    $factFinding = Factfinding::updateOrCreate(
        ['recipient_id' => (int)$validated['recipient_id']],
        $payload
    );


   // ✅ ลบ documents เดิมก่อน แล้วเพิ่มใหม่
\App\Models\FactFindingDocument::where('factfinding_id', $factFinding->id)->delete();

if (!empty($validated['documents'])) {
    foreach ($validated['documents'] as $docId) {
        \App\Models\FactFindingDocument::create([
            'factfinding_id' => $factFinding->id,
            'document_id'    => (int)$docId,
        ]);
    }
}

// ✅ ดึง documents พร้อม relation "document"
$documents = \App\Models\FactFindingDocument::with('document')
    ->where('factfinding_id', $factFinding->id)
    ->get();

     $notification = [
                'message' => 'Recipient Deleted Successfully',
                'alert-type' => 'success'
            ];


return view('frontend.fact_master.fact_master_all', [
    'factFinding' => $factFinding,
    'documents'   => $documents,   // ตอน loop ใน blade ใช้ $doc->document->ชื่อฟิลด์
    'recipients'  => $recipients,
]);

}

public function FactMasterEdit($id)
{
    // 1. ดึงข้อมูลผู้รับ
    $recipients = Recipient::findOrFail($id);

    // 2. ดึงข้อมูล factfinding ของผู้รับ (One-to-One)
    $factFinding = Factfinding::where('recipient_id', $id)->firstOrFail();

    // 3. ดึงเอกสารทั้งหมด
    $documents = Document::all();

    // 4. ดึงเอกสารที่เลือกไว้แล้ว (pivot relation)
    // ✅ ระบุ table ให้ชัดเจนเพื่อแก้ ambiguous column
    $selectedDocs = $factFinding->documents()->pluck('documents.id')->toArray();

    // 5. ส่งข้อมูลไปที่ view
    return view('frontend.fact_master.fact_master_edit', compact(
        'recipients',
        'factFinding',
        'documents',
        'selectedDocs'
    ));
}

public function FactMasterUpdate(Request $request, $id)
{
    $validated = $request->validate([
        'recipient_id' => 'required|integer',
        'date' => 'required|date',
        'fact_name' => 'required|string|max:255',
        'appearance' => 'nullable|string',
        'skin' => 'nullable|string',
        'scar' => 'nullable|string',
        'disability' => 'nullable|string',
        'evidence' => 'nullable|string',

        // บังคับเลือก yes/no ให้ตรงกับฟอร์ม
        'sick' => 'required|in:yes,no',
        'sick_detail' => 'nullable|string',

        'treatment' => 'nullable|string',
        'hospital' => 'nullable|string',
        'weight' => 'nullable|numeric',
        'height' => 'nullable|numeric',
        'hygiene' => 'nullable|string',
        'oral_health' => 'nullable|string',
        'injury' => 'nullable|string',
        'case_history' => 'nullable|string',
        'recorder' => 'nullable|string',
        'active' => 'nullable|boolean',
        'documents' => 'nullable|array',
        'documents.*' => 'integer',

    // validation rules thai
        ], [], [
        'recipient_id' => 'รหัสผู้รับ',
        'date' => 'วันที่',
        'fact_name' => 'ชื่อข้อเท็จจริง',
        'appearance' => 'รูปลักษณ์',
        'skin' => 'สีผิว',
        'scar' => 'แผลเป็น',
        'disability' => 'ความพิการ',
        'evidence' => 'หลักฐาน',
        'sick' => 'การเจ็บป่วย',
        'sick_detail' => 'รายละเอียดการเจ็บป่วย',
        'treatment' => 'การรักษา',
        'hospital' => 'โรงพยาบาล',
        'weight' => 'น้ำหนัก',
        'height' => 'ส่วนสูง',
        'hygiene' => 'สุขอนามัย',
        'oral_health' => 'สุขภาพช่องปาก',
        'injury' => 'การบาดเจ็บ',
        'case_history' => 'ประวัติกรณี',
        'recorder' => 'ผู้บันทึก',
        'active' => 'สถานะ',
        'documents' => 'เอกสาร',
    ]);

    //End validation rules thai

    $recipientId = (int) $validated['recipient_id'];
    $recipients = Recipient::findOrFail($recipientId);
    $factFinding = Factfinding::where('recipient_id', $recipientId)->firstOrFail();

    $payload = [
        'date' => $validated['date'],
        'fact_name' => $validated['fact_name'],
        'appearance' => $validated['appearance'] ?? 'ไม่ระบุ',
        'skin' => $validated['skin'] ?? 'ไม่ระบุ',
        'scar' => $validated['scar'] ?? 'ไม่ระบุ',
        'disability' => $validated['disability'] ?? 'ไม่ระบุ',
        'evidence' => $validated['evidence'] ?? '',

        // ใช้ค่าที่ validate แล้วโดยตรง
        'sick' => $validated['sick'],

        // ถ้าเลือก yes แต่ไม่กรอกรายละเอียด อนุญาตให้ว่างหรือบังคับก็ได้ ขึ้นกับธุรกิจ
        'sick_detail' => $validated['sick_detail'] ?? '',

        'treatment' => $validated['treatment'] ?? '',
        'hospital' => $validated['hospital'] ?? '',
        'weight' => isset($validated['weight']) ? (float) $validated['weight'] : 0,
        'height' => isset($validated['height']) ? (float) $validated['height'] : 0,
        'hygiene' => $validated['hygiene'] ?? 'ไม่ระบุ',
        'oral_health' => $validated['oral_health'] ?? 'ไม่ระบุ',
        'injury' => $validated['injury'] ?? 'ไม่ระบุ',
        'case_history' => $validated['case_history'] ?? '',
        'recorder' => $validated['recorder'] ?? '',
        'active' => $validated['active'] ?? 1,
    ];

    $factFinding->update($payload);

    \App\Models\FactFindingDocument::where('factfinding_id', $factFinding->id)->delete();
    if (!empty($validated['documents'])) {
        foreach ($validated['documents'] as $docId) {
            \App\Models\FactFindingDocument::create([
                'factfinding_id' => $factFinding->id,
                'document_id'    => (int) $docId,
            ]);
        }
    }

    return redirect()->route('factmaster.all', $recipientId)->with(['success' => 'อัปเดตข้อมูลเรียบร้อยแล้ว']);
}
}


