<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function AdminDashboard(Request $request){

       return View('admin.admin_dashboard');
    }    
}
