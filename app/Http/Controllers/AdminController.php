<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function AdminDashboard(Request $request){

       return View('admin.index');
    } 
    
    public function AdminLogout(Request $request){
     
     Auth::guard('web')->logout();
     $request->session()->invalidate();
     $request->session()->regenerateToken();
     return redirect('admin/login');
       
    }

    public function Adminlogin(Request $request){
        
       return View('admin.admin_login');
    }

    
    public function AdminProfile(Request $request){
        
        return View('admin.admin_profile');
     }
    
}

