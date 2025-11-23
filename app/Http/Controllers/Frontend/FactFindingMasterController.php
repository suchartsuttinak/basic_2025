<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Recipient;
use Illuminate\Http\Request;
use App\Models\frontend\Document;
use App\Http\Controllers\Controller;
use App\Models\frontend\Factfinding;



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
}
