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
        return view('finish');
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
                        //print_r("it's 1 hour;   ");
                        //print_r($t);
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

        $obj->save();

        return view('schedule');
    }

    public function save_final(Request $request)
    {
        $obj = new Schedule();
        $obj->id_employee = $request->employee_id_input;
        $obj->time = $request->time_input;
        $obj->date = $request->id_service;
    }
}
