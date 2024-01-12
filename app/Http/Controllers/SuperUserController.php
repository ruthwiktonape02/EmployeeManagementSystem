<?php

namespace App\Http\Controllers;

use  App\Models\SuperUser;
use Illuminate\Http\Request;

class SuperUserController extends Controller
{
    //
    public function store(Request $request)
    {
        $superUser = new SuperUser();
        $superUser->email = $request->email;
        $superUser->password = $request->password;
        $superUser->save();
    }
    public function check(Request $request)
    {
        $superUser = SuperUser::where("email", $request->email)->where("password", $request->password);
        
        if ($superUser->count() > 0) {
            return view("RegistrationPage");
        } else {
            return redirect("SuperUserLoginPage");
        }
    }
}
