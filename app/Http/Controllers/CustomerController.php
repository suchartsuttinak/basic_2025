<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
   public function AllCustomer(){
        $customer = Customer::latest()->get();
        return view('admin.backend.customer.all_customer', compact('customer'));
   }
    public function AddCustomer(){
          return view('admin.backend.customer.add_customer');
    }

public function StoreCustomer(Request $request){
       // ตรวจสอบความถูกต้องของข้อมูล
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:customers,email',
        'phone' => 'required|string|max:20',
        'address' => 'required|string|max:500',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // สร้างข้อมูลลูกค้าใหม่
    Customer::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'address' => $request->address,
    ]);
      $notification = [
        'message' => 'Customer Inserted Successfully',
        'alert-type' => 'success'
    ];

    return redirect()->route('all.customer')->with($notification);
      }

public function EditCustomer($id){
    $customer = Customer::find($id);
    return view('admin.backend.customer.edit_customer', compact('customer'));
}

public function UpdateCustomer(Request $request){
    $id = $request->id;
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:customers,email,'.$id,
        'phone' => 'required|string|max:20',
        'address' => 'required|string|max:500',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // อัปเดตข้อมูลลูกค้า
    $customer = Customer::find($id);
    $customer->name = $request->name;
    $customer->email = $request->email;
    $customer->phone = $request->phone;
    $customer->address = $request->address;
    $customer->save();

    $notification = [
        'message' => 'Customer Updated Successfully',
        'alert-type' => 'success'
    ];

    return redirect()->route('all.customer')->with($notification);

}
public function DeleteCustomer($id){
    Customer::find($id)->delete();

    $notification = [
        'message' => 'Customer Deleted Successfully',
        'alert-type' => 'success'
    ];

    return redirect()->route('all.customer')->with($notification);
}


}