<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgentController extends Controller
{
   
    public function AgentDashboard(Request $request){

       return View('agent.agent_dashboard');
    }    
}
