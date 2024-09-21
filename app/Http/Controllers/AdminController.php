<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminController extends Controller
{
   public function AdminDashboard(Request $request)
   {

      return View('admin.index');
   }

   public function AdminLogout(Request $request)
   {

      Auth::guard('web')->logout();
      $request->session()->invalidate();
      $request->session()->regenerateToken();
      return redirect('admin/login');
   }

   public function Adminlogin(Request $request)
   {

      return View('admin.admin_login');
   }


   public function AdminProfile(Request $request)
   {
      $data['getRecord'] = User::find(Auth::user()->id);
      return View('admin.admin_profile', $data);
   }

   public function admin_profile_update(Request $request)
   {
      $user = request()->validate([
         'email' => 'required|unique:users,email,'.Auth::user()->id
      ]);
      

      // Update Profile Here...

      $user = User::find(Auth::user()->id);
      $user->name = trim($request->name);
      $user->username = trim($request->username);
      $user->email = trim($request->email);
      if (!empty($request->password)) {
         $user->password = Hash::make(trim($request->password));
      }
      if (!empty($request->file('photo'))) {

         $file = $request->file('photo');
         $randomStr = Str::random(30);
         $fileName = $randomStr . '.' . $file->getClientOriginalExtension();
         $file->move('upload/', $fileName);
         $user->photo = $fileName;
      }
      $user->address = trim($request->address);
      $user->phone = trim($request->phone);
      $user->website = trim($request->website);
      $user->About = trim($request->about);

      $user->save();


      return redirect('admin/profile')->with('success', 'Profile Updated Successfully...');
   }
}
