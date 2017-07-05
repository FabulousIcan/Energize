<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Auth;


use App\EnergySupply;
use App\User;
use App\EnergyPurchase;

class EnergySupplyController extends Controller
{
   
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $total_energy = EnergySupply::sum('energy_capacity'); 
        $max_price = EnergySupply::max('price'); 
        $max_energy = EnergySupply::max('energy_capacity'); 

        $total_users = User::all()->count(); 
        $producers = User::where('role', '1')->count();
        $consumers = User::where('role', '2')->count();
        $prosumers = User::where('role', '3')->count();

        $top_producers = User::where('role', '1')->orderBy('id', 'desc')->take(3)->get();
        $top_consumers = User::where('role', '2')->orderBy('id', 'desc')->take(3)->get();
        $top_prosumers = User::where('role', '3')->orderBy('id', 'desc')->take(3)->get();

        $recent_users = User::orderBy('id', 'desc')->take(3)->get();
        $recent_supply = EnergySupply::orderBy('id', 'desc')->take(3)->get();
     
        return view('welcome', compact('total_energy', 'max_price', 'max_energy', 'total_users', 'producers', 'consumers', 'prosumers', 'recent_users', 'recent_supply'));
    }



 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function market()
    {
        $energysupplies = EnergySupply::all();
        return view('market')->with('energysupplies', $energysupplies);
    }

/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('energy_supply_form');
    }

      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = ['energy_capacity'=>'required', 'price'=>'required'];
        $this->validate($request, $rules);

        $supply = new EnergySupply;
        $supply->user_id = Auth::user()->id;
        $supply->energy_capacity = $request->energy_capacity;
        $supply->price = $request->price;
        $supply->save();
        return redirect('/market');

        //return back();
    }

     public function buy1(Request $request)
    {
        $rules = ['price'=>'required'];
        $this->validate($request, $rules);

        $supply = new EnergySupply;
        $supply->user_id = Auth::user()->id;
        $supply->energy_capacity = $request->energy_capacity;
        $supply->price = $request->price;
        $supply->save();

        return redirect('/market');

        //return back();
    }



    public function buy(Request $request, $id)
    {
        
        EnergySupply::find($id)->update(array(
            'energy_capacity'  => $request->energy_capacity,
            'energy_capacity'  => $request->energy_capacity,
        ));
        return redirect('/request/details/'.$id);       
    }

}