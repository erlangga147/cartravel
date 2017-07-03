<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $drivers = \App\Driver::all();
        
        return response()->json($drivers, 200);
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
        $parameters = $request->only('name','phone','address','image_field');

        $name = $parameters['name'];
        $phone = $parameters['phone'];
        $address = $parameters['address'];

        if(!empty($parameters['image_field']))
        {
            $image = $request->file('image_field');

            $image_extension = $image->getClientOriginalExtension(); 

            $image_original_name = $image->getClientOriginalName();
            $image_mime = $image->getClientMimeType();
            $image_name = $image->getFileName().'.'.$image_extension;
            Storage::put($image_name, File::get($image), 'public');
        }
        
        $driver = new \App\Driver();

        $driver->name = $name;
        $driver->phone = $phone;
        $driver->address = $address;

        if(!empty($parameters['image_field']))
        {
            $driver->image_name = $image_name;
            $driver->mime = $image_mime;
            $driver->original_image_name = $image_original_name;
        }
    
        $driver->save();

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
        $driver = \App\Driver::find($id);
        return response()->json($driver, 200);
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
        $parameters = $request->only('name','phone','address','image_field');

        $name = $parameters['name'];
        $phone = $parameters['phone'];
        $address = $parameters['address'];

        if(!empty($parameters['image_field']))
        {
            $image = $request->file('image_field');

            $image_extension = $image->getClientOriginalExtension(); 

            $image_original_name = $image->getClientOriginalName();
            $image_mime = $image->getClientMimeType();
            $image_name = $image->getFileName().'.'.$image_extension;
            Storage::put($image_name, File::get($image), 'public');
        }
        
        $driver = \App\Driver::find($id);

        $driver->name = $name;
        $driver->phone = $phone;
        $driver->address = $address;

        if(!empty($parameters['image_field']))
        {
            $driver->image_name = $image_name;
            $driver->mime = $image_mime;
            $driver->original_image_name = $image_original_name;
        }
    
        $driver->save();

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
        $driver = \App\Driver::find($id);

        Storage::delete($driver->image_name);

        $driver->delete();

        return response()->json([], 200);
    }
}
