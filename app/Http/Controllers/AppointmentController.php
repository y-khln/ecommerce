<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    function SaveData(Request $request)
    {
        $obj = new Appointment();

        $obj->id_master=1; //пока по умолчанию

        if($_POST['category'] == 1){
            $obj -> id_service = 1;
        } if($_POST['category'] == 2){
        $obj -> id_service = 2;
        } if($_POST['category'] == 3){
            $obj -> id_service = 3;
        } if($_POST['category'] == 4){
            $obj -> id_service = 4;
        } if($_POST['category'] == 5) {
            $obj -> id_service = 5;
        } if($_POST['category'] == 6) {
            $obj -> id_service = 6;
        } if($_POST['category'] == 7) {
            $obj -> id_service = 7;
        }

        $obj->client_name=$request->name;
        $obj->client_phone=$request->phone_number;

        $obj->time=3; //пока по умолчанию потому что я не понимаю как ту штуку исправить


        if($_POST['date'] == '2022-12-05'){
            $obj -> date = '2022-12-05';
        } if($_POST['date'] == '2022-12-06'){
        $obj -> date = '2022-12-06';
        } if($_POST['date'] == '2022-12-07'){
            $obj -> date = '2022-12-07';
        } if($_POST['date'] == '2022-12-08') {
            $obj-> date = '2022-12-08';
        }

        $obj->save();

        return "inserted";
    }
}

