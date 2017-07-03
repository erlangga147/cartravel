<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Transformers\CarTransformer;


class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cars = \App\Car::all();
        return $this->response->collection($cars, new CarTransformer())->setStatusCode(200);
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
        $parameters = $request->only('carType_id','brand','license_plate','year');

        $carType_id = $parameters['carType_id'];
        $brand = $parameters['brand'];
        $license_plate = $parameters['license_plate'];
        $year = $parameters['year'];

        $car = new \App\Car();

        $car->carType_id = $carType_id;
        $car->brand = $brand;
        $car->license_plate = $license_plate;
        $car->year = $year;

        $car->save();

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
        $car = \App\Car::find($id);

        return response()->json($car, 200);
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
        $parameters = $request->only('carType_id','brand','license_plate','year');

        $carType_id = $parameters['carType_id'];
        $brand = $parameters['brand'];
        $license_plate = $parameters['license_plate'];
        $year = $parameters['year'];

        $car = \App\Car::find($id);

        $car->carType_id = $carType_id;
        $car->brand = $brand;
        $car->license_plate = $license_plate;
        $car->year = $year;

        $car->save();
        
        return response()->json($car, 200);
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
        $car = \App\Car::find($id);

        $car->delete();

        return response()->json($car, 200);
    }
}
