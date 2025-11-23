<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recipient;

class FactFindingController extends Controller
{
    public function FactAll($id)
    {
        $id = $id;
        $recipients = Recipient::find($id);
        return view('frontend.fact_finding.fact_all', compact('recipients'));
    }
}
