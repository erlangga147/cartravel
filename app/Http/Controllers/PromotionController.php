<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $promotions = \App\Promotion::all();
        
        return response()->json($promotions, 200);
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
        $parameters = $request->only('name','display_name','description','image_field');

        $name = $parameters['name'];
        $display_name = $parameters['display_name'];
        $description = $parameters['description'];

        $image = $request->file('image_field');

        $image_extension = $image->getClientOriginalExtension(); 

        $image_original_name = $image->getClientOriginalName();
        $image_mime = $image->getClientMimeType();
        $image_name = $image->getFileName().'.'.$image_extension;

        Storage::put($image_name, File::get($image), 'public');

        $promotion = new \App\Promotion();

        $promotion->name = $name;
        $promotion->display_name = $display_name;
        $promotion->description = $description;
        $promotion->image_name = $image_name;
        $promotion->mime = $image_mime;
        $promotion->original_image_name = $image_original_name;

        $promotion->save();
        
        return response()->json([], 200);
        
        // return $image->getClientOriginalExtension();
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
        $promotion = \App\Promotion::find($id);

        return response()->json($promotion, 200);
    }

    public function getImage($image_name)
    {
        $promotion = \App\Promotion::where('original_image_name',$image_name)->first();

        $image = Storage::get($promotion->image_name);

        return (new Response($image, 200))->header('Content-Type', $promotion->mime);   
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
        $promotion = \App\Promotion::find($id);

        Storage::delete($promotion->image_name);

        $promotion->delete();

        return response()->json([], 200);
    }
}
