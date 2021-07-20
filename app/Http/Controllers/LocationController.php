<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Location::all();
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
        $location = new Location();

        try {
            $request->validate([
                'name'  =>  'required|string',
                'description'  =>  'string',
                'ip'  =>  'required|ip',
                'latitude'  =>  'required|numeric',
                'longitude'  =>  'required|numeric',
                'altitude'  =>  'numeric'
            ]);
        } catch (\Exception $e){
            return response()->json([
                'error' =>  "Unable to save location.",
                'message'   =>  $e->getMessage()
            ],422);
        }

        $location = new Location($request->all());

        try {
            $location->save();
        } catch (\Exception $e){
            return response()->json([
                'error' =>  "Unable to save location.",
                'message'   =>  $e->getMessage()
            ],422);
        }

        return response()->json([
            'message'   =>  "Location saved successfully.",
            'location'  =>  $location
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        return $location;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location)
    {
        try {
            $request->validate([
                'name'  =>  'string',
                'description'  =>  'string',
                'ip'  =>  'ip',
                'latitude'  =>  'numeric',
                'longitude'  =>  'numeric',
                'altitude'  =>  'numeric'
            ]);
        } catch (\Exception $e){
            return response()->json([
                'error' =>  "Unable to update location.",
                'message'   =>  $e->getMessage()
            ],422);
        }

        try {
            $location->update($request->all());
        } catch (Exception $e){
            return response()->json([
                'error' =>  "Unable to update location.",
                'message'   =>  $e->getMessage()
            ],422);
        }

        return response()->json([
            'message'   =>  "Location {$location->id} {$location->name} updated successfully."
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        try {
            Location::destroy($location->id);
        } catch (Exception $e){
            return response()->json([
                'error' =>  "Unable to delete location.",
                'message'   =>  $e->getMessage()
            ],422);
        }

        return response()->json([
            'message'   =>  "Location {$location->id} {$location->name} destroyed successfully."
        ],200);
    }
}
