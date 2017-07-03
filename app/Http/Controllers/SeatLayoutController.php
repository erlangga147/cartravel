<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Response;

class SeatLayoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($class_type)
    {
        //
        $carType = \App\CarType::where('name','=',$class_type)->first();
        
        $seats = \App\SeatLayout::where('carType_id','=',$carType->id)->get();

        return response()->json($seats, 200);
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
        $parameters = $request->only('carType_id','seat_number','row','column');

        $carType_id = $parameters['carType_id'];
        $seat_number = $parameters['seat_number'];
        $row = $parameters['row'];
        $column = $parameters['column'];

        $seat = new \App\SeatLayout();

        $seat->carType_id = $carType_id;
        $seat->seat_number = $seat_number;
        $seat->row = $row;
        $seat->column = $column;

        $seat_layout->save();

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
        $parameters = $request->only('seat_number','row','column');

        $seat_number = $parameters['seat_number'];
        $row = $parameters['row'];
        $column = $parameters['column'];

        $seat = \App\SeatLayout::find($id);

        $seat->seat_number = $seat_number;
        $seat->row = $row;
        $seeat->column = $column;

        $seat->save();

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
        $seat = \App\SeatLayout::find($id);

        $seat->delete();

        return response()->json([], 200);   
    }
}
