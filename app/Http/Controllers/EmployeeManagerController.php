<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use function PHPUnit\Framework\isNull;

class EmployeeManagerController extends Controller
{

    public function create(Request $request)
    {
        try {
            $request->validate(
                [
                    'name' => 'required',
                    'email' => 'required|email',
                    'address' => 'required',
                    'salary' => 'required',
                    'country' => 'required',
                    'date' => 'required'

                ]
            );
        } catch (\Throwable $th) {
            Log::info("Error While creating new Entry :" . $th->getMessage());
            return redirect()->back()->withErrors(["error" => "Something Went Wrong !!"]);
        }
        $employee = Employee::where("email", $request->email);
        if ($employee->count() > 0) {
            return redirect()->back()->withErrors(["error1" => "Employee Already Register!!"]);
        }

        try {
            $employee = new Employee();
            $employee->name = $request->name;
            $employee->email = $request->email;
            $employee->address = $request->address;
            $employee->salary = $request->salary;
            $employee->country = $request->country;
            $employee->date = $request->date;
            $employee->save();
            return redirect()->back()->withErrors(["sucess" => "sucessfully Entered !!"]);
        } catch (\Throwable $th) {
            Log::info("Error While creating new Entry :" . $th->getMessage());
            return redirect()->back()->withErrors(["error" => "Something Went Wrong !!"]);
        }
    }
    public function read()
    {
        $allEmployee = Employee::all();
        return view('EmployeeDetails', compact('allEmployee'));
    }
    public function update(Request $request, $id)
    {
        // dd($id, $request);
        try {
            $allEmployee = Employee::find($id);
            if (!empty($allEmployee)) {
                return view('UpdatePage', compact('allEmployee'));
            } else {
                return view('EmployeeDetails');
            }
        } catch (\Throwable $th) {
            Log::info("Error While creating new Entry :" . $th->getMessage());
            return redirect()->back()->withErrors(["error" => "Something Went Wrong !!"]);
        }
    }
    public function updateAtPosition(Request $request)
    {
        try {
            $id = $request->id;
            $allEmployee = Employee::find($id);
            $allEmployee->name = $request->name;
            $allEmployee->email = $request->email;
            $allEmployee->address = $request->address;
            $allEmployee->salary = $request->salary;
            $allEmployee->country = $request->country;
            $allEmployee->date = $request->date;
            $allEmployee->save();
            return redirect("/read");
        } catch (\Throwable $th) {
            Log::info("Error While creating new Entry :" . $th->getMessage());
            return redirect()->back()->withErrors(["error" => "Something Went Wrong !!"]);
        }
    }
    public function delete($id)
    {
        try {

            $employee = Employee::find($id);
            $employee->delete();
            return redirect()->back();
        } catch (\Throwable $th) {
            Log::info("Error While creating new Entry :" . $th->getMessage());
            return redirect()->back()->withErrors(["error" => "Something Went Wrong !!"]);
        }
    }
}
