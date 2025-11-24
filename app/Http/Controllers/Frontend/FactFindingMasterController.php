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
        $recipients = Recipient::findOrFail($id);
        $factmasters = Factfinding::where('recipient_id', $id)->latest()->get();

        return view('frontend.fact_master.fact_master_all', compact('recipients', 'factmasters'));
    }

    public function FactMasterAdd($id)
    {
        $documents = Document::all();
        $recipients = Recipient::findOrFail($id);

        return view('frontend.fact_master.fact_master_add', compact('recipients', 'documents'));
    }



    //*********กรณีส่งเป็น json

//    public function FactMasterStore(Request $request)
// {
//     $validated = $request->validate([
//         'recipient_id' => 'required|integer',
//         'date' => 'required|date',
//         'fact_name' => 'required|string|max:255',
//         'appearance' => 'nullable|string',
//         'skin' => 'nullable|string',
//         'scar' => 'nullable|string',
//         'disability' => 'nullable|string',
//         'sick' => 'nullable|string',
//         'sick_detail' => 'nullable|string',
//         'treatment' => 'nullable|string',
//         'hospital' => 'nullable|string',
//         'weight' => 'nullable|numeric',
//         'height' => 'nullable|numeric',
//         'hygiene' => 'nullable|string',
//         'oral_health' => 'nullable|string',
//         'injury' => 'nullable|string',
//         'case_history' => 'nullable|string',
//         'recorder' => 'nullable|string',
//         'evidence' => 'nullable|string',
//         'documents' => 'nullable|array',
//         'documents.*' => 'integer'
//     ]);

//     // ✅ one-to-one ด้วย updateOrCreate
//     $factFinding = Factfinding::updateOrCreate(
//         ['recipient_id' => $validated['recipient_id']],
//         [
//             'date' => $validated['date'],
//             'fact_name' => $validated['fact_name'],
//             'appearance' => $validated['appearance'] ?? null,
//             'skin' => $validated['skin'] ?? null,
//             'scar' => $validated['scar'] ?? null,
//             'disability' => $validated['disability'] ?? null,
//             'sick' => $validated['sick'] ?? null,
//             'sick_detail' => $validated['sick_detail'] ?? null,
//             'treatment' => $validated['treatment'] ?? null,
//             'hospital' => $validated['hospital'] ?? null,
//             'weight' => $validated['weight'] ?? null,
//             'height' => $validated['height'] ?? null,
//             'hygiene' => $validated['hygiene'] ?? null,
//             'oral_health' => $validated['oral_health'] ?? null,
//             'injury' => $validated['injury'] ?? null,
//             'case_history' => $validated['case_history'] ?? null,
//             'recorder' => $validated['recorder'] ?? null,
//             'evidence' => $validated['evidence'] ?? null,
//         ]
//     );

//     // ✅ ลบ documents เดิมก่อน แล้วเพิ่มใหม่
//     FactFindingDocument::where('factfinding_id', $factFinding->id)->delete();

//     if (!empty($validated['documents'])) {
//         foreach ($validated['documents'] as $docId) {
//             FactFindingDocument::create([
//                 'factfinding_id' => $factFinding->id,
//                 'document_id' => $docId,
//             ]);
//         }
//     }

//     // ✅ ดึง documents ที่สัมพันธ์กับ factFinding
//     $documents = FactFindingDocument::where('factfinding_id', $factFinding->id)
//         ->pluck('document_id');

//     return response()->json([
//         'status' => 'success',
//         'message' => 'บันทึกข้อมูลเรียบร้อยแล้ว',
//         'data' => $factFinding,
//         'documents' => $documents
//     ]);
// }

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

        'sick' => 'nullable|in:yes,no,YES,NO,Yes,No',
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
    ]);

    // ✅ ดึงข้อมูล Recipient
    $recipients = Recipient::findOrFail($validated['recipient_id']);

    // ✅ เตรียม payload ให้ครบ
    $payload = [
        'date' => $validated['date'] ?? now()->toDateString(),
        'fact_name' => $validated['fact_name'],
        'appearance' => $validated['appearance'] ?? 'ไม่ระบุ',
        'skin' => $validated['skin'] ?? 'ไม่ระบุ',
        'scar' => $validated['scar'] ?? 'ไม่ระบุ',
        'disability' => $validated['disability'] ?? 'ไม่ระบุ',
        'evidence' => $validated['evidence'] ?? '',
        'sick' => isset($validated['sick']) ? strtolower($validated['sick']) : 'no',
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

return view('frontend.fact_master.fact_master_all', [
    'factFinding' => $factFinding,
    'documents'   => $documents,   // ตอน loop ใน blade ใช้ $doc->document->ชื่อฟิลด์
    'recipients'  => $recipients,
]);

}
}