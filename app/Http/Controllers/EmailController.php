<?php

namespace App\Http\Controllers;

use App\Models\Compose_emails;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ComposeEmailMail;


class EmailController extends Controller
{
    /**
     * Ce code Laravel récupère une liste d'utilisateurs dont le rôle est soit "agent" soit "user".
     * @return  View
     * @author  ulrich_dev 
     */
    public function email_compose():View
    {
        $data['getEmail'] = User::where('role','=',['agent','user'])
        ->get();
        return View('admin.email.compose',$data);
    }

     /**
     * Ce code Laravel enregistre une nouvelle entrée dans le formulaire de soumission d email.
     * @param Request $request
     * @return  void
     * @author  ulrich_dev 
     */
    public function email_compose_post(Request $request){

        // dd($request);

        $save = new Compose_emails;
        $save->user_id = $request->user_id;
        $save->cc_email = trim($request->cc_email);
        $save->subject = trim($request->subject);
        $save->description = trim($request->description);
        $save->save();

        $getUserEmail = user::where('id', '=', $request->user_id)
        ->first();

        Mail::to($getUserEmail->email)->cc($request->cc_email)
        ->send(new ComposeEmailMail($save));

      return redirect('admin/email/compose')->with('success', 'Email Successfully send... !!');


    }
    
}
