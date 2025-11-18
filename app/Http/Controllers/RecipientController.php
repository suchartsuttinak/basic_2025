<?php

namespace App\Http\Controllers;

use App\Models\House;
use App\Models\Income;
use App\Models\Region;
use App\Models\Status;
use App\Models\Target;
use App\Models\Contact;
use App\Models\Marital;
use App\Models\Problem;
use App\Models\Project;
use App\Models\District;
use App\Models\National;
use App\Models\Province;
use App\Models\Religion;
use App\Models\Recipient;
use App\Models\Occupation;
use App\Models\SubDistrict;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Education;

// use Image;  
use Intervention\Image\ImageManager;
// use Intervention\Image\Drivers\Imagick\Driver; (เกิดข้อผิดพลาดกับบางเครื่อง)
use Intervention\Image\Drivers\Gd\Driver; 

class RecipientController extends Controller
{
    public function RecipientAll()
    {
        $recipients = Recipient::with('problems')->get();
        return view('admin.backend.recipient.recipient_all', compact('recipients'));   
    }

    public function RecipientAdd()
    {
        $problems    = Problem::all();
        $provinces   = Province::all();
        $districts   = District::all();
        $subDistricts= SubDistrict::all();
        $nations     = National::all();
        $religions   = Religion::all();
        $maritals    = Marital::all();
        $occupations = Occupation::all();
        $incomes     = Income::all();
        $educations  = Education::all();
        $contacts    = Contact::all();
        $projects    = Project::all();
        $statuses    = Status::all();
        $houses      = House::all(); 
        $targets     = Target::all();   
        
        return view('admin.backend.recipient.recipient_create', compact(
            'problems',
            'provinces',
            'districts',
            'subDistricts',
            'nations',
            'religions',
            'maritals',
            'occupations',
            'incomes',
            'educations',
            'contacts',
            'projects',
            'statuses',
            'houses',
            'targets'
        ));
    }

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

public function RecipientStore(Request $request)
{     
 
  
  // ตรวจสอบความถูกต้องของข้อมูลที่ส่งมา
    $validated = $request->validate([
        // ตรวจสอบความถูกต้องของข้อมูลที่ส่งมา
        'register_number' => 'required|string|max:20',
        'nick_name' => 'nullable|string|max:255',
        'title_name' => 'required|string|max:20',
        'first_name' => 'required|string|max:50',
        'last_name' => 'required|string|max:50',
        'gender' => 'required|string|max:10',
        'birth_date' => 'required|date',
        'id_card' => 'required|string|max:20',
        'national_id' => 'required|string|max:20',
        'religion_id' => 'required|string|max:20',
        'marital_id' => 'required|string|max:50',
        'occupation_id' => 'nullable|string|max:50',
        'income_id' => 'nullable|string|max:255',
        'education_id' => 'nullable|string|max:255',
        'scholl' => 'nullable|string|max:255',
        'address' => 'required|string|max:255',
        'province_id' => 'required|string|max:255',
        'district_id' => 'required|string|max:255',
        'sub_district_id' => 'required|string|max:255',
        'zipcode' => 'required|string|max:10',
        'phone' => 'required|string|max:20',
        'arrival_date' => 'required|date',
        'target_id' => 'required|string|max:255',
        'contact_id' => 'required|string|max:255',
        'project_id' => 'required|string|max:255',
        'house_id' => 'required|string|max:255',
        'status_id' => 'required|string|max:255',
        'case_resident' => 'required|string|max:255',
        'problems' => 'nullable|array',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
    

     // จัดการไฟล์ภาพ
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('upload/recipient_images'), $filename);
        $validated['image'] = $filename;
    }

    // ดึง problems ออกมาแยก
    $problems = $validated['problems'] ?? [];
    unset($validated['problems']);

    // บันทึก Recipient
    $recipient = Recipient::create($validated);

    // แนบ problems (many-to-many)
    if (!empty($problems)) {
        $recipient->problems()->attach($problems);
    }

    $notification = [
        'message' => 'Recipient Inserted Successfully',
        'alert-type' => 'success'
    ];

    return redirect()->route('recipient.all')->with($notification);
}

    public function RecipientEdit($id)
    {
        $recipient = Recipient::find($id);
        $problems    = Problem::all();
        $provinces   = Province::all();
        $districts   = District::all();
        $sub_districts= SubDistrict::all();
        $nations     = National::all();
        $religions   = Religion::all();
        $maritals    = Marital::all();
        $occupations = Occupation::all();
        $incomes     = Income::all();
        $educations  = Education::all();
        $contacts    = Contact::all();
        $projects    = Project::all();
        $statuses    = Status::all();
        $houses      = House::all(); 
        $targets     = Target::all();

        return view('admin.backend.recipient.recipient_edit', compact(
            'recipient',
            'problems',
            'provinces',
            'districts',
            'sub_districts',
            'nations',
            'religions',
            'maritals',
            'occupations',
            'incomes',
            'educations',
            'contacts',
            'projects',
            'statuses',
            'houses',
            'targets'
        ));
    }

}