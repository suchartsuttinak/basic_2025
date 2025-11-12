<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Customer;

class SupplierController extends Controller
{
    public function AllSupplier(){
        $supplier = Supplier::latest()->get();
        return view('admin.backend.supplier.all_supplier', compact('supplier'));
    }
    public function AddSupplier(){
        return view('admin.backend.supplier.add_supplier');
    }

    public function StoreSupplier(Request $request){
       
    Supplier::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'address' => $request->address
    ]);

    $notification = [
        'message' => 'Supplier Inserted Successfully',
        'alert-type' => 'success'
    ];

    return redirect()->route('all.supplier')->with($notification);
    }

    public function EditSupplier($id){
        $supplier = Supplier::find($id);
        return view('admin.backend.supplier.edit_supplier', compact('supplier'));
    }

    public function UpdateSupplier(Request $request){
        $id = $request->id;

        Supplier::find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address
        ]);

        $notification = [
            'message' => 'Supplier Updated Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.supplier')->with($notification);
    }

    public function DeleteSupplier($id){
        Supplier::find($id)->delete();

        $notification = [
            'message' => 'Supplier Deleted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.supplier')->with($notification);
    }
}
