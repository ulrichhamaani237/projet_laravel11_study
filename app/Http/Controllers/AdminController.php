<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResetPassword;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\RegisterMail;




class AdminController extends Controller
{
   public function AdminDashboard(Request $request)
   {
      $user = User::selectRaw('count(id) as count, DATE_FORMAT(created_at, "%Y-%m") as month')
         ->groupBy('month')
         ->orderBy('month', 'asc')
         ->get();

      $data['months'] = $user->pluck('month');
      $data['counts'] = $user->pluck('count');


      return View('admin.index', $data);
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
         'email' => 'required|unique:users,email,' . Auth::user()->id
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


   /**
    * Cette fonction récupère la liste des utilisateurs et affiche la vue 'admin.users.list'.
    *
    * @param Request $request
    * @return View
    */
   public function admin_users(Request $request): View
   {
      $data['getRecord'] = User::getRecord($request);
      $data['TotalAdmin'] = User::where('role', '=', 'admin')->count();
      $data['TotalUser'] = User::where('role', '=', 'user')->count();
      $data['TotalAgent'] = User::where('role', '=', 'agent')->count();
      $data['TotalActive'] = User::where('status', '=', 'active')->count();
      $data['TotalInactive'] = User::where('status', '=', 'inactive')->count();

      return View('admin.users.list', $data);
   }

   public function  admin_user_view($id): View
   {
      $data['getRecord'] = User::find($id);

      return View('admin.users.view', $data);
   }

   public function admin_add_users(Request $request): View
   {



      return View('admin.users.add');
   }

   public function admin_users_add_store(Request $request)
   {


      $save = new User;
      $save->name = trim($request->name);
      $save->username = trim($request->username);
      $save->email = trim($request->email);
      $save->phone = trim($request->phone);
      $save->role = trim($request->role);
      $save->status = trim($request->status);
      $save->remember_token = Str::random(50);
      $save->save();

      Mail::to($save->email)->send(new RegisterMail($save));


      return redirect('admin/users')->with('success', 'User Added Successfully...');
   }


   public function  set_new_password($token)
   {
      $data['token'] = $token;
      return View('auth.reset_passs', $data);
   }
   public function set_new_password_post($token, ResetPassword $request)
   {
      $user = User::where('remember_token', '=', $token);

      if ($user->count() == 0) {
         abort(403);
      }


      $user->password = Hash::make($request->password);
      $user->remember_token = Str::random(50);
      $user->status = 'active';
      $user->save();

      return redirect('admin/login')->with('success', 'Password Updated Successfully...');
   }

   public function admin_users_edit($id)
   {
      $data['getRecord'] = User::find($id);

      return view('admin.users.edit', $data);
   }

   public  function test()
   {

      return View('admin.users.test');
   }

   public function users_admin_edit_id_update($id, Request $request)
   {
      // dd($request->all());
      $user = User::find($id);
      $user->name = trim($request->name);
      $user->name = trim($request->username);
      $user->name = trim($request->email);
      $user->name = trim($request->phone);
      $user->name = trim($request->status);
      $user->name = trim($request->role);
      $user->save();

      return redirect('admin/users')->with('success', 'User Update Succefull...');
   }

   public function admin_users_delete($id)
   {
      $users = User::find($id);
      $users->delete();

      return redirect('admin/users')->with('success', 'user delete Succefull...');
   }

   public function admin_users_update(Request $request){
     
     $record = User::find( $request->input('edit_id'));
     $record->name = $request->input('edit_name');
     $record->save();
     $json['success'] = 'Data Update Successfully...';

      echo json_encode($json);
   }

   public  function admin_user_changeStatus(Request $request){
      $order = User::find($request->order_id);
      $order->status = $request->status_id;
      $order->save();
      
      $json['success'] = true;
      echo json_encode($json);
   }
}
