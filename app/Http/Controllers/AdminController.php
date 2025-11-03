<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\VerificationCodeMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


class AdminController extends Controller
{
    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function AdminLogin(Request $request)
    {
          $credentials = $request->only('email','password');
        // ฟังก์ชัน attempt() เป็นหนึ่งในฟังก์ชันหลักของ Laravel ที่ใช้สำหรับ ตรวจสอบข้อมูลการเข้าสู่ระบบ
       if (Auth::attempt($credentials)) {
            $user = Auth::user();

            $verificationCode = random_int(100000,999999);
        
        session(['verification_code' => $verificationCode, 'user_id' => $user->id ]);

       Mail::to($user->email)->send(new VerificationCodeMail($verificationCode));

        Auth::logout();

        return redirect()->route('custom.verification.form')->with('status','รหัสยืนยันถูกส่งไปยังอีเมลของคุณแล้ว
');

        }

        return redirect()->back()->withErrors(['email' => 'Invalid Credentials Provided']); 
    }
      // End Method 

      public function ShowVerification(){
        return view('auth.verify');
      }
      // End Method 

    public function VerificationVerify(Request $request){

        $request->validate(['code' => 'required|numeric']);

        if ($request->code == session('verification_code')) {
            Auth::loginUsingId(session('user_id'));

            session()->forget(['verification_code','user_id']);
            return redirect()->intended('/dashboard');

        }

        return back()->withErrors(['code' => 'Invalid Verification Code']);
      }
       // End Method 

    public function AdminProfile(){
       $id = Auth::user()->id;
       $profileData = User::find($id);
        return view('admin.admin_profile', compact('profileData'));
}
        // End Method 

    public function ProfileStore(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);

        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

      // รูปเก่า
      $oldPhotoPath = $data->photo;

      if ($request->hasFile('photo')) {
          $file = $request->file('photo');
          $filename = time().'.'.$file->getClientOriginalExtension();
          $file->move(public_path('upload/user_images'), $filename);
          $data->photo = $filename;

          if ($oldPhotoPath && $oldPhotoPath !== $filename) {
            $this->deleteOldImage($oldPhotoPath);
          }
      }
        $data->save();

        $notification = array(
            'message' => 'บ้นทึกข้อมูลเรียบร้อย',
            'alert-type' => 'success'
        );

       return redirect()->back()->with($notification);
    }

    // ไม่ลบรูปเก่า
    // private function deleteOldImage($filename)
    // {
    //     $path = public_path('upload/user_images/' . $filename);
    //     if (file_exists($path)) {
    //         unlink($path);
    //     }
    // }

       // ลบรูปเก่าออก
      private function deleteOldImage(string $oldPhotoPath): void
    {
        $path = public_path('upload/user_images/' . $oldPhotoPath);
        if (file_exists($path)) {
            unlink($path);
        }
    }

   public function PasswordUpdate(Request $request)
{
    $user = Auth::user();

    // Validate input
    $request->validate([
        'old_password' => 'required',
        'new_password' => 'required|confirmed'
    ]);

    // ตรวจสอบรหัสผ่านเก่า
    if (!Hash::check($request->old_password, $user->password)) {
       $notification = array(
        'message' => "Old Password does not Match!",
        'alert-type' => 'error'
       );
       return back()->with($notification);
    }

    // อัปเดตรหัสผ่านใหม่
     User::whereId($user->id)->update([
        'password' => Hash::make($request->new_password) 
    ]);

    // ออกจากระบบเพื่อความปลอดภัย
    Auth::logout();

     $notification = array(
        'message' => 'Password Updated Successfully',
        'alert-type' => 'success'
    );

    return redirect()->route('login')->with($notification);

   
}
}