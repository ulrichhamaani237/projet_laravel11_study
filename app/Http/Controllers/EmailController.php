<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function email_compose():View
    {
        
        return View('admin.email.compose');
    }

    public function email_compose_post(Request $request){

        dd($request);

    }
    
}
