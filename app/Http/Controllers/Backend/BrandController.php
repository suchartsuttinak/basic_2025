<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

// use Image;  
use Intervention\Image\ImageManager;
// use Intervention\Image\Drivers\Imagick\Driver; (เกิดข้อผิดพลาดกับบางเครื่อง)
use Intervention\Image\Drivers\Gd\Driver; 



class BrandController extends Controller
{
    public function AllBrand()
    {
    // latest() เป็น Query Scope ที่สั่งให้เรียงลำดับข้อมูลจากล่าสุดไปเก่าสุด โดยอิงจากคอลัมน์ created_at
   $brand = Brand::latest()->get();
   return view('admin.backend.brand.all_brand',compact('brand'));
    }

    public function AddBrand()
    {
        return view('admin.backend.brand.add_brand');
    }

    public function StoreBrand(Request $request)
    {
      if($request->file('image'))
      {
        $image = $request->file('image');
        $manager = new ImageManager(new Driver());
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $img = $manager->read($image);
        $img->resize(100,90)->save(public_path('upload/brand/'.$name_gen));
        $save_url = 'upload/brand/'.$name_gen;

        Brand::create([
            'name' => $request->name,
            'image' => $save_url,
        ]);
        $notification = array(
            'message' => 'Brand Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.brand')->with($notification);
    }    
}

    public function EditBrand($id)
    {
        $brand = Brand::find($id);
        return view('admin.backend.brand.edit_brand',compact('brand'));
    }

    public function UpdateBrand(Request $request)
    {
        $brand_id = $request->id;
        $brand = Brand::find($brand_id);

        if($request->file('image'))
        {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(100,90)->save(public_path('upload/brand/'.$name_gen));
            $save_url = 'upload/brand/'.$name_gen;

            // ลบรูปเก่า
            if (file_exists(public_path($brand->image))) {
                unlink(public_path($brand->image));
            }
            
            Brand::find($brand_id)->update([
                'name' => $request->name,
                'image' => $save_url,
            ]);
            $notification = array(
                'message' => 'Brand Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('all.brand')->with($notification);
            
        }else{
            Brand::find($brand_id)->update([
                'name' => $request->name,
            ]);
            $notification = array(
                'message' => 'Brand Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('all.brand')->with($notification);
        }
    }
    // {
    //     $brand_id = $request->id;
    //     if($request->file('image'))
    //     {
    //         $image = $request->file('image');
    //         $manager = new ImageManager(new Driver());
    //         $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    //         $img = $manager->read($image);
    //         $img->resize(100,90)->save(public_path('upload/brand/'.$name_gen));
    //         $save_url = 'upload/brand/'.$name_gen;

    //         Brand::findOrFail($brand_id)->update([
    //             'name' => $request->name,
    //             'image' => $save_url,
    //         ]);
    //         $notification = array(
    //             'message' => 'Brand Updated Successfully',
    //             'alert-type' => 'success'
    //         );
    //         return redirect()->route('all.brand')->with($notification);
    //     }else{
    //         Brand::findOrFail($brand_id)->update([
    //             'name' => $request->name,
    //         ]);
    //         $notification = array(
    //             'message' => 'Brand Updated Successfully',
    //             'alert-type' => 'success'
    //         );
    //         return redirect()->route('all.brand')->with($notification);
    //     }
    // }


    public function DeleteBrand($id)
    {
        $item = Brand::find($id);
        // ลบรูปเก่า
        $img = $item->image;
        unlink($img);

        Brand::find($id)->delete();
        $notification = array(
            'message' => 'Brand Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
