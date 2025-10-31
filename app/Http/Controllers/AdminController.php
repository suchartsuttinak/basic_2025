<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationCodeMail;


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
}