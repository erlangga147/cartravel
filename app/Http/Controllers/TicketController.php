<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Response;

class TicketController extends Controller
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

    public function getTicketsAvailable($fare_id, $departure_date)
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
    
    public function getTickets($carSchedule_id, $departure_date)
    {
        $carSchedule = \App\CarSchedule::find($carSchedule_id);

        $tickets = $carSchedule->tickets()->where('departure_date',$departure_date)->get();

        return response()->json($tickets, 200);        
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
        $parameters = $request->only('carSchedule_id','booking_id','passenger_id','seat_number','departure_date');

        $carSchedule_id = $parameters['carSchedule_id'];
        $booking_id = $parameters['booking_id'];
        $passenger_id = $parameters['passenger_id'];
        $seat_number = $parameters['seat_number'];
        $departure_date = $parameters['departure_date'];

        $ticket = new \App\Ticket();

        $ticket->carSchedule_id = $carSchedule_id;
        $ticket->booking_id = $booking_id;
        $ticket->passenger_id = $passenger_id;

        $ticket->save();

        return response()->json($booking, 200);
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
