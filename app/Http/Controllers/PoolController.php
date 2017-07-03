<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Transformers\PoolTransformer;

class PoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pools = \App\Pool::all();

        // return $pools;

        return $this->response->collection($pools, new PoolTransformer())->setStatusCode(200);
    }

    public function getDestinations($origin)
    {
        $origin = \App\Pool::where('name', $origin)->first();

        return $origin->destinations;        
    }

    public function getOrigins($destination)
    {
        $destination = \App\Pool::where('name', $destination)->first();

        return $destination->origins;        
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
        $parameters = $request->only('name','display_name','description','address','city','image_field');

        $name = $parameters['name'];
        $display_name = $parameters['display_name'];
        $description = $parameters['description'];
        $address = $parameters['address'];
        $city = $parameters['city'];

        if(!empty($parameters['image_field']))
        {
            $image = $request->file('image_field');

            $image_extension = $image->getClientOriginalExtension(); 

            $image_original_name = $image->getClientOriginalName();
            $image_mime = $image->getClientMimeType();
            $image_name = $image->getFileName().'.'.$image_extension;
            Storage::put($image_name, File::get($image), 'public');
        }

        $pool = new \App\Pool();

        $pool->name = $name;
        $pool->display_name = $display_name;
        $pool->description = $description;
        $pool->address = $address;
        $pool->city = $city;
        
        if(!empty($parameters['image_field']))
        {
            $pool->image_name = $image_name;
            $pool->mime = $image_mime;
            $pool->original_image_name = $image_original_name;    
        }

        $pool->save();

        return response()->json([], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        //
        $pool = \App\Pool::where('name',$name)->first();

        return response()->json($pool, 200);
    }

    public function getImage($pool_name)
    {
        $pool = \App\Pool::where('name',$pool_name)->first();

        $image = Storage::get($pool->image_name);

        return (new Response($image, 200))->header('Content-Type', $pool->mime);
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
        $parameters = $request->only('name','display_name','description','address','city','image_field');

        $name = $parameters['name'];
        $display_name = $parameters['display_name'];
        $description = $parameters['description'];
        $address = $parameters['address'];
        $city = $parameters['city'];

        if(!empty($parameters['image_field']))
        {
            $image = $request->file('image_field');

            $image_extension = $image->getClientOriginalExtension(); 

            $image_original_name = $image->getClientOriginalName();
            $image_mime = $image->getClientMimeType();
            $image_name = $image->getFileName().'.'.$image_extension;
            Storage::put($image_name, File::get($image), 'public');
        }

        $pool = \App\Pool::find($id);

        $pool->name = $name;
        $pool->display_name = $display_name;
        $pool->description = $description;
        $pool->address = $address;
        $pool->city = $city;
    
        if(!empty($parameters['image_field']))
        {
            $pool->image_name = $image_name;
            $pool->mime = $image_mime;
            $pool->original_image_name = $image_original_name;    
        }

        $pool->save();

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
        $pool = \App\Pool::find($id);

        Storage::delete($pool->image_name);

        $pool->delete();

        return response()->json([], 200);
    }
}
