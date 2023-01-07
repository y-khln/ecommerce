<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Employee;
use App\Models\Schedule;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function delete($id){
        try {
            Schedule::where('id_employee',$id)->delete();
        }
        finally{}
        try{
            Appointment::where('id_master',$id)->delete();
        }
        finally{}
        Employee::Find($id)->delete();

        return redirect()->route('user.admin')->with('success','successful delete');
    }

    public function save(Request $request){

        $employee = new Employee();

        $employee->name=$request->name;
        $employee->surname=$request->surname;
        $employee->date_of_birth=$request->date;
        $employee->phone=$request->phone;
        $employee->post=$request->post;
        $employee->service_group=$request->category;
        $employee -> save();

        if($employee){
            return redirect(route('user.admin'));
        }
    }
}
