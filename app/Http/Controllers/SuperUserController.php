<?php

namespace App\Http\Controllers;

use  App\Models\SuperUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use  Illuminate\Support\Facades\Log;

class SuperUserController extends Controller
{


    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //     ]);
    // }

    // public function create(Request $request)
    // {

    //     User::create([
    //         'name' => $request['name'],
    //         'email' => $request['email'],
    //         'password' => Hash::make($request['password']),
    //     ]);

    //     return redirect('login');
    // }
    //
    public function store(Request $request)
    {
        try {
            $request->validate(
                [
                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    'password' => ['required', 'string'],
                ]
            );
            User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
            ]);

            return redirect('/');
        } catch (\Exception $th) {
            Log::info("Error While creating new Entry :" . $th->getMessage());
            return redirect()->back()->withErrors(["error" => "Something Went Wrong !!"]);
        }
    }
    public function check(Request $request)
    {
        try {
            $request->validate(
                [
                    'email' => 'required|email',
                    'password' => 'required',
                    // 'password_confirm' => 'required|same:password'
                ]
            );
            // echo "<pre>";
            // print_r($request->all());

            $email = $request['email'];
            $password = $request['password'];

            if (Auth::attempt(['email' => $email, 'password' => $password])) {

                $cust = User::where('email', $email)->first();
                Auth::login($cust);
                return redirect('/employeeRegister');
            } else {
                return
                    redirect()->back()->withErrors(["error" => "Something Went Wrong !!"]);
            }
        } catch (\Exception $th) {
            Log::info("Error While creating new Entry :" . $th->getMessage());
            return redirect()->back()->withErrors(["error" => "Something Went Wrong !!"]);
        }
    }
    public function logout()
    {

        $user = Auth::user();
        if (isset($user->name)) {
            Auth::logout();
        }
        return redirect('/');
    }
}
