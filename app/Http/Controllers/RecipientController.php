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
        'register_number' => 'required|string|max:255',
        'nick_name' => 'required|string|max:255',
        'title_name' => 'required|string|max:255',
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'gender' => 'required|string|max:255',
        'birth_date' => 'required|date',
        'id_card' => 'required|string|max:13',
        'national_id' => 'required|string|max:255',
        'religion_id' => 'required|string|max:255',
        'marital_id' => 'required|string|max:255',
        'occupation_id' => 'nullable|string|max:255',
        'income_id' => 'nullable|string|max:255',
        'education_id' => 'nullable|string|max:255',
        'scholl' => 'nullable|string|max:255',
        'address' => 'required|string|max:255',
        'province_id' => 'required|string|max:255',
        'district_id' => 'required|string|max:255',
        'sub_disdrict_id' => 'required|string|max:255',
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

    // สร้างข้อมูลผู้รับบริการ
    $recipient = Recipient::create([
        'register_number' => $validated['register_number'],
        'title_name' => $validated['title_name'],
        'nick_name' => $validated['nick_name'],
        'first_name' => $validated['first_name'],
        'last_name' => $validated['last_name'],
        'gender' => $validated['gender'],
        'birth_date' => $validated['birth_date'],
        'id_card' => $validated['id_card'],
        'national_id' => $validated['national_id'],
        'religion_id' => $validated['religion_id'],
        'marital_id' => $validated['marital_id'],
        'occupation_id' => $validated['occupation_id'],
        'income_id' => $validated['income_id'],
        'education_id' => $validated['education_id'],
        'scholl' => $validated['scholl'],
        'address' => $validated['address'],
        'province_id' => $validated['province_id'],
        'district_id' => $validated['district_id'],
        'sub_disdrict_id' => $validated['sub_disdrict_id'],
        'zipcode' => $validated['zipcode'],
        'phone' => $validated['phone'],
        'arrival_date' => $validated['arrival_date'],
        'target_id' => $validated['target_id'],
        'contact_id' => $validated['contact_id'],
        'project_id' => $validated['project_id'],
        'house_id' => $validated['house_id'],
        'status_id' => $validated['status_id'],
        'case_resident' => $validated['case_resident'],
        // 'image' => $save_url,
    ]);

   // แนบปัญหาที่เลือกไว้ (many-to-many)
    if ($request->has('problems')) {
        $recipient->problems()->attach($request->problems);
    }
       $notification = [
        'message' => 'Warehouse Inserted Successfully',
        'alert-type' => 'success'
    ];
  
    // ส่งกลับพร้อมข้อความแจ้งเตือน
     return redirect()->route('recipient.all')->with($notification);
}

}



