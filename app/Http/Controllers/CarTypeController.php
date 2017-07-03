<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CarTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $carTypes = \App\CarType::all();
        
        return response()->json($carTypes, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $parameters = $request->only('name','display_name','description','capacity');

        $name = $parameters['name'];
        
        $display_name = $parameters['display_name'];
        $description = $parameters['description'];
        $capacity = $parameters['capacity'];

        $carType = new \App\CarType();

        $carType->name = $name;
        $carType->display_name = $display_name;
        $carType->description = $description;
        $carType->capacity = $capacity;

        $carType->save();

        return response()->json([], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $carType = \App\CarType::find($id);
        
        return response()->json($carType, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $parameters = $request->only('name','display_name','description','capacity');

        $name = $parameters['name'];
        
        $display_name = $parameters['display_name'];
        $description = $parameters['description'];
        $capacity = $parameters['capacity'];

        $carType = \App\CarType::find($id);

        $carType->name = $name;
        $carType->display_name = $display_name;
        $carType->description = $description;
        $carType->capacity = $capacity;

        $carType->save();

        return response()->json([], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $carType = \App\CarType::find($id);

        $carType->delete();

        return response()->json([], 200);
    }
}
