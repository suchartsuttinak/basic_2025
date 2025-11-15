<?php

namespace App\Http\Controllers;

use App\Models\Problem;
use App\Models\District;
use App\Models\Province;
use App\Models\CaseMaster;
use App\Models\SubDistrict;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;




class CaseMasterController extends Controller
{
    public function CaseAll()
    {
        $cases = CaseMaster::with('problems')->get();
        return view('admin.backend.casemaster.case_all', compact('cases'));
    }

    public function CaseAdd()
    {
        $problems = Problem::all();
        $provinces = Province::all();
        return view('admin.backend.casemaster.case_add', compact('problems', 'provinces'));
    }
//จังหวัด อำเภอ ตำบล รหัสไปรษณีย์
public function getDistricts($province_id)
{
    $districts = District::where('province_id', $province_id)->get(['id', 'dist_name']);
    return response()->json($districts);
}

public function getSubdistricts($district_id)
{
   $subdistricts = SubDistrict::where('district_id', $district_id)->get(['id', 'subd_name']);
    return response()->json($subdistricts);
}

public function getZipcode($subdistrict_id)
{
    $subdistrict = SubDistrict::find($subdistrict_id);
    if (!$subdistrict) {
        return response()->json(['zipcode' => null], 404);
    }
    return response()->json(['zipcode' => $subdistrict->zipcode]);
}
//สิ้นสุด จังหวัด อำเภอ ตำบล รหัสไปรษณีย์


public function ClientStore(Request $request)
{
    // dd($request->all());
    $request->validate([
        'title_name' => 'required',
        'gender' => 'required',
        'first_name' => 'required|string|max:100',
        'last_name' => 'required|string|max:100',
        'code_number' => 'required|string|max:20',
        'birth_date' => 'required|date',
        'email' => 'required|email',
        'sup_phone' => 'required|string|max:20',
        'address' => 'required|string',
        'province_id' => 'required|exists:provinces,id',
        'district_id' => 'required|exists:districts,id',
        'sub_district_id' => 'required|exists:sub_districts,id',
        'zipcode' => 'required|string|max:10',
        'contact_name' => 'nullable|string|max:100',
        'status' => 'nullable|string|max:50',
        'phone' => 'required|string|max:20',
        'problems' => 'array|nullable',
    ]);

    $case = CaseMaster::create([
        'title_name' => $request->title_name,
        'gender' => $request->gender,
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'code_number' => $request->code_number,
        'birth_date' => $request->birth_date,
        'email' => $request->email,
        'sup_phone' => $request->sup_phone,
        'address' => $request->address,
        'province_id' => $request->province_id,
        'district_id' => $request->district_id,
        'sub_district_id' => $request->sub_district_id,
        'zipcode' => $request->zipcode,
        'contact_name' => $request->contact_name,
        'status' => $request->status,
        'phone' => $request->phone,
    ]);

    // แนบปัญหาที่เลือกไว้ (many-to-many)
    if ($request->has('problems')) {
        $case->problems()->attach($request->problems);
    }
       $notification = [
        'message' => 'บันทึกข้อมูลเรียบร้อย',
        'alert-type' => 'success'
    ];
  
    // ส่งกลับพร้อมข้อความแจ้งเตือน
     return redirect()->route('case.all')->with($notification);

}
}
