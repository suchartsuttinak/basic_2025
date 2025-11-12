<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Brand;
use App\Models\Supplier;
use App\Models\WareHouse;
// use Image;  
use Intervention\Image\ImageManager;
// use Intervention\Image\Drivers\Imagick\Driver; (เกิดข้อผิดพลาดกับบางเครื่อง)
use Intervention\Image\Drivers\Gd\Driver; 

class ProductController extends Controller
{
    public function AllCategory()
    {
        $category = ProductCategory::latest()->get();
        return view('admin.backend.category.all_category', compact('category'));
    }

    public function StoreCategory(Request $request)
    {
       // Insert category
    ProductCategory::insert([
        'category_name' => $request->category_name,
        'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),
        ]);
        $notification = array(
            'message' => 'Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
     
    }

    public function EditCategory($id)
    {
        $category = ProductCategory::find($id);
        return response()->json($category);
    }

    public function UpdateCategory(Request $request)
    {
        $cat_id = $request->cat_id;

        ProductCategory::find($cat_id)->update([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),
        ]);

        $notification = array(
            'message' => 'Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.category')->with($notification);
    }

    public function DeleteCategory($id)
    {
        ProductCategory::find($id)->delete();

        $notification = array(
            'message' => 'Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function AllProduct()
    {
        $allData = Product::orderBy('id', 'DESC')->get();
        return view('admin.backend.product.all_product', compact('allData'));
    }
    public function AddProduct()
    {
       $categories = ProductCategory::all();
       $brands = Brand::all();
       $suppliers = Supplier::all();
       $warehouses = WareHouse::all();
       return view('admin.backend.product.add_product', 
       compact('categories', 'brands', 'suppliers', 'warehouses'));
    }

    public function StoreProduct(Request $request)
    {
       $product = Product::create([
            'name' => $request->name,
            'code' => $request->code,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'warehouse_id' => $request->warehouse_id,
            'supplier_id' => $request->supplier_id,
            'price' => $request->price,
            'stock_alert' => $request->stock_alert,
            'note' => $request->note,
            'product_qty' => $request->product_qty,
            'status' => $request->status,
            'created_at' => now(),          
       ]);

       $product_id = $product->id;

       if($request->hasFile('image')){
         foreach($request->file('image') as $img){
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            $image = $manager->read($img);
            $image->resize(150,150)->save(public_path('upload/productimg/'.$name_gen));
            $save_url = 'upload/productimg/'.$name_gen;

            ProductImage::create([
                'product_id' => $product_id,
                'image' => $save_url,
            ]);
         }
       }

       $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.product')->with($notification);
}

    public function EditProduct($id)
    {
        $editData = Product::findOrFail($id);
        $categories = ProductCategory::all();
        $brands = Brand::all();
        $suppliers = Supplier::all();
        $warehouses = WareHouse::all();
        $multiimg = ProductImage::where('product_id', $id)->get();
       
        return view('admin.backend.product.edit_product', 
        compact('editData', 'categories', 'brands', 'suppliers', 'warehouses', 'multiimg'));
    }

    public function UpdateProduct(Request $request)
    {
        $pro_id = $request->id;

        $product = Product::findOrFail($pro_id);
        $product->name = $request->name;
        $product->code = $request->code;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->warehouse_id = $request->warehouse_id;
        $product->supplier_id = $request->supplier_id;
        $product->price = $request->price;
        $product->stock_alert = $request->stock_alert;
        $product->note = $request->note;
        $product->product_qty = $request->product_qty;
        $product->status = $request->status;
        $product->updated_at = now();
        $product->save();

       // Multiple Image Update
       if($request->hasFile('image')){       
         foreach($request->file('image') as $img){
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            $image = $manager->read($img);
            $image->resize(150,150)->save(public_path('upload/productimg/'.$name_gen));
            
            $product->images()->create([
                'image' => 'upload/productimg/'.$name_gen,
            ]);
         }
       }
        // Multiple Image Remove 
        if($request->has('remove_image')){         
            foreach($request->remove_image as $removeImageId){
                $img = ProductImage::find($removeImageId);
                if($img){
                    if(file_exists(public_path($img->image))){
                        unlink(public_path($img->image));
                    }
                    $img->delete();
                }
            }
        }

        $notification = array(
            'message' => 'Product Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.product')->with($notification);
    }


}