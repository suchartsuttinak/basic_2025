<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
use Illuminate\Support\Facades\DB;
use App\Models\Education;
use App\Models\Title;



class ChildController extends Controller
{
    public function AllChild($id) 
    {
     $recipients = Recipient::with([    
        'problems',
        'province',
        'district',
        'sub_district',
        'national',
        'religion',
        'marital',
        'occupation',
        'income',
        'education',
        'contact',
        'project',
        'status',
        'house',
        'target',
        'title'

    ])->findOrFail($id);

    $problems = Problem::all(); // ✅ ต้องมีถ้าใช้ compact('problems')

    return view('frontend.child.child_report', compact('recipients', 'problems'));

    }
}



       