<?php

namespace App\Http\Controllers;

use App\Models\Price;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $prices = Price::all();
        return view('price',compact('prices'));
    }

    public function save(Request $request){

        $service = new Price();

        $service->id_group=$request->category_service;
        $service->title=$request->title_service;
        $service->duration=$request->duration_service;
        $service->price=$request->price_service;
        $service -> save();

        if($service){
            return redirect(route('user.admin'));
        }
    }

}
