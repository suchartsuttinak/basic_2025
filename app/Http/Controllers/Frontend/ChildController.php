<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recipient;

class ChildController extends Controller
{
    public function AllChild($id)
    {
        $id = $id;
        $recipients = Recipient::find($id);
        return view('frontend.child.all_child', compact('recipients'));
    }
}
