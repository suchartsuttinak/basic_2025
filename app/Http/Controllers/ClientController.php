<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Problem;
use Carbon\Carbon; // ✅ ตรงนี้แหละสำคัญ



class ClientController extends Controller
{
        // ตัวอย่างเมธอด
    public function ClientAll()
    {
        $clients = Client::with('problems')->get();
        return view('admin.backend.client.client_all', compact('clients'));
    }

public function ClientAdd()
{
    $problems = Problem::all();
    return view('admin.backend.client.client_create', compact('problems'));
}

public function ClientStore(Request $request)
{

        // ตรวจสอบความถูกต้องของข้อมูลที่ส่งมา
    $validated = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name'  => 'required|string|max:255',
        'gender'     => 'required|string|max:10',
        'birth_date' => 'required|date',
        'address'    => 'required|string|max:500',
        'phone'      => 'required|string|max:20',
        'problems'   => 'array', // ต้องเป็น array ถ้ามี
    ]);

    // สร้างข้อมูลผู้รับบริการ
    $client = Client::create([
        'first_name' => $validated['first_name'],
        'last_name'  => $validated['last_name'],
        'gender'     => $validated['gender'],
        'birth_date' => $validated['birth_date'],
        'address'    => $validated['address'],
        'phone'      => $validated['phone'],
    ]);

    // แนบปัญหาที่เลือกไว้ (many-to-many)
    if ($request->has('problems')) {
        $client->problems()->attach($request->problems);
    }
       $notification = [
        'message' => 'Warehouse Inserted Successfully',
        'alert-type' => 'success'
    ];
  
    // ส่งกลับพร้อมข้อความแจ้งเตือน
     return redirect()->route('client.all')->with($notification);
}

    public function ClientEdit($id)
        {
            $client = Client::with('problems')->findOrFail($id);
            $problems = Problem::all();
            return view('admin.backend.client.client_edit', compact('client', 'problems'));
        }

    public function ClientUpdate(Request $request)
{
    $id = $request->id;

    $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'gender' => 'required|in:male,female',
        'birth_date' => 'required|date_format:d/m/Y',
        'address' => 'required|string',
        'phone' => 'required|string',
        'problems' => 'array'
    ]);

    // ✅ แปลงวันเกิดจาก พ.ศ. เป็น ค.ศ. ก่อนใช้
    $birthDate = Carbon::createFromFormat('d/m/Y', $request->birth_date);
    if ($birthDate->year > 2500) {
        $birthDate->year -= 543;
    }

    $client = Client::findOrFail($id);

    $client->update([
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'gender' => $request->gender,
        'birth_date' => $birthDate->format('Y-m-d'),
        'address' => $request->address,
        'phone' => $request->phone,
    ]);

    // ✅ อัปเดตปัญหาที่เลือกไว้
    $client->problems()->sync($request->problems ?? []);

    // ✅ แจ้งเตือน
    $notification = [
        'message' => 'Client Updated Successfully',
        'alert-type' => 'success'
    ];

    return redirect()->route('client.all')->with($notification);
}


public function ClientDelete($id)
{
     $client = Client::findOrFail($id);

    // ลบความสัมพันธ์กับปัญหาก่อน (ถ้ามี many-to-many)
    $client->problems()->detach();

    // ลบข้อมูล client
    $client->delete();

    // ส่งกลับพร้อมแจ้งเตือน
    $notification = [
        'message' => 'ลบข้อมูลผู้รับบริการเรียบร้อยแล้ว',
        'alert-type' => 'success'
    ];

    return redirect()->route('client.all')->with($notification);
        
}
}