<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Transformers\FareTransformer;

use League\Fractal;

class FareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function getFares($origin_name, $destination_name, $departure_date)
    {
        //
        $origin = \App\Pool::where('name',$origin_name)->first();
        $destination = \App\Pool::where('name',$destination_name)->first();

        $route = \App\Route::where('origin_id',$origin->id)->where('destination_id',$destination->id)->first();

        $fares = $route->fares()->get();

        $copyOfFares = $route->fares()->get();

        for($i=0;$i<sizeof($fares);$i++)
        {
            $capacity = $copyOfFares[$i]->carType->capacity;

            $numOfCars = $copyOfFares[$i]->carSchedules->count(); 

            $booked = $copyOfFares[$i]->tickets()->where('departure_date','=',$departure_date)->count();

            $fares[$i]->available = ($capacity * $numOfCars) - $booked;
            $fares[$i]->booked = $booked;
            $fares[$i]->capacity = $capacity * $numOfCars;
        }

        return response()->json($fares, 200);
    }

    public function countTickets($fare_id, $departure_date)
    {
        $fare = \App\Fare::find($fare_id);

        $origin = $fare->route->origin;

        $destination = $fare->route->destination;

        $numOfCars = $fare->carSchedules()->count();

        $totalCapacity = $numOfCars * $fare->carType->capacity;

        $ticketsBooked = $fare->tickets()->where('departure_date','=',$departure_date)->count(); 

        $ticketsAvailable = $totalCapacity - $ticketsBooked;

        return response()->json([
                'origin' => $origin,
                'destination' => $destination,
                'departure_date' => $departure_date,
                'departure_time' => $fare->departure_time,
                'total_capacity' => $totalCapacity,
                'booked' => $ticketsBooked,
                'available' => $ticketsAvailable
            ], 200);
    }

    public function getTickets($fare_id, $departure_date)
    {
        $fare = \App\Fare::find($fare_id);

        $capacity = $fare->carType->capacity;

        $ticketsRaw = $fare->tickets()  ->select(DB::raw('count(tickets.id) as ticket_booked, carSchedule_id'))
                                        ->having('ticket_booked','<',$capacity)
                                        ->groupBy('carSchedule_id')
                                        ->get();
        
        $tickets = \App\CarSchedule::find($ticketsRaw[0]->carSchedule_id)->tickets;
        return response()->json($tickets, 200);        
    }

    public function getSeatLayout($fare_id)
    {
        $seatLayout = \App\Fare::find($fare_id)->carType->seatLayout;

        return response()->json($seatLayout, 200);        
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
    }
}
