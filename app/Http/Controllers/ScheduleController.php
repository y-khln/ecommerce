<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Price;
use App\Models\Schedule;
use App\Models\ServiceGroup;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $services = Price::all()
            ->pluck('title');

        $result = '';

        return view('schedule', compact('services', 'result'));
    }

    public function store(Request $request)
    {
        $category = $request->category;
        $date = $request->date;

        $services = Price::where('id_group', $category)
            ->get();

        $result = Schedule::join('employees', 'employees.id_employee', '=', 'schedules.id_employee')
            ->where([
                ['date', $date],
                ['service_group', $category],
            ])->get();

        return view('schedule', compact('result', 'services'));
    }

    public function finish(Request $request)
    {
        return view('finalschedule', ['date' => $request->date, 'time' => $request->time,
                    'id_employee' => $request->id_employee, 'id_service' => $request->id_service,
                    'duration' => $request->duration]);
    }

    public function record(Request $request)
    {
        return view('successfullRecord', ['date' => $request->date, 'time' => $request->time,
            'id_employee' => $request->id_employee, 'id_service' => $request->id_service,
            'user_name' => $request->user_name, 'phone_number' => $request->phone_number,
            'duration' => $request->duration]);
    }



    public function getPrescheduule()
    {
        $services = ServiceGroup::all();

        return view('preshedule', ['services' => $services]);
    }


    public function getAfterscheduule(Request $request)
    {
        if (!$request->has('date') || !$request->has('id_service')) {
            return redirect()->route('schedule.store');
        }
        $selectedService = Price::where('id_service', $request->id_service)->first();
        $category = $selectedService->serviceGroup;
        $employees_id = $category->employees->pluck('id_employee');
        $schedules = Schedule::whereIn('id_employee', $employees_id)->where('date', $request->date)->get();

        $suitable = array();

        foreach ($schedules as $elem) {
            $str = $elem->time;
            $str1 = json_decode($str,true);
            $free = array();
            $index = $selectedService->duration;

            foreach ($str1 as $key=>$t){
                //false
                //if(in_array("", $t)) {}

                //проверка свободно ли окно
                if(in_array(1, $t)) {
                    $flag =0;
                    //если процедура длится час
                    if($index==1) {
                        array_push($free,$t);
                    }
                    //если длится больше
                    else if($key+$index>count($str1) ){
                        print_r("");
                    }
                    else{
                        for ($i = 1; $i < $index; $i++) {
                            $nextItem = $str1[$key+$i];
                            if (in_array(1, $nextItem)) {
                                $flag++;
                            }
                            else{
                                $flag=-100;
                            }
                        }
                        if($flag==$index-1){
                            array_push($free,$t);
                            $flag=0;
                        }
                    }
                }
            }
            //array_push($suitable,$free);
            array_push($suitable,$free);
            $elem->time=$free;
        }
        return view('afterschedule', ['date' => $request->date, 'category' => $category,
            'id_service' => $selectedService, 'schedules' => $schedules]);
    }


    public function getScheduleFromDate(Request $request)
    {
        if (!$request->has('date') || !$request->has('category')) {
            return redirect()->route('preschedule');
        }
        $services = Price::where('id_group', $request->category)->get();

        return view('schedule', ['services' => $services, 'date' => $request->date]);
    }

    function SaveData(Request $request)
    {
        $obj = new Appointment();
        $obj->id_master = $request->id_employee;
        $obj->id_service = $request->id_service;
        $obj->client_name = $request->user_name;
        $obj->client_phone = $request->phone_number;
        $obj->time = $request->time;
        $obj->date = $request->date;
        $obj->save();

        $schedule = Schedule::where([
            ['id_employee', $request->id_employee],
            ['date', $request->date],
        ]) -> first();

        $choice = $request->time;
        $emp_schedule = json_decode($schedule->time,true);
        $duration = $request->duration;
        $t= array("time" => $choice, "free" => true);
        $time = array_search($t,$emp_schedule);
        $replacement = array("free" => false);
        $emp_schedule[$time] = array_replace($emp_schedule[$time],$replacement);

        for($i=1;$i<$duration;$i++){
            $emp_schedule[$time+$i] = array_replace($emp_schedule[$time+$i],$replacement);;
        }

        $sch = Schedule::where('id_schedule',$schedule->id_schedule);
        $sch->update([
            'time' => json_encode($emp_schedule)
        ]);
        return view('successfullRecord');
    }

    function saveSchedule(Request $request){
        $schedule = new Schedule();

        $schedule->id_employee=$request->id_employee_sch;
        $schedule->time=$request->time_sch;
        $schedule->date=$request->date_sch;
        $schedule -> save();
        if($schedule){
            return redirect(route('user.admin'));
        }
    }
    public function deleteSchedule($id){
        $sch = Schedule::where('id_schedule',$id)->first();

        try{
            Appointment::where([
                ['id_master', $sch->id_employee],
                ['date', $sch->date],
            ])->delete();
        }
        finally{}
        Schedule::where('id_schedule',$id)->delete();
        return redirect()->route('user.admin')->with('success','successful delete');
    }
}
