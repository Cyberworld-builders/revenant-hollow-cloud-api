<?php

namespace App\Http\Controllers;

use App\Models\Haunt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class HauntController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Haunt::all();
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
        $haunt = new Haunt();

        try {
            $request->validate([
                'name'  =>  'required'
            ]);
        } catch (\Exception $e){
            return response()->json([
                'error' =>  "Unable to save haunt.",
                'message'   =>  $e->getMessage()
            ],422);
        }

        $haunt = new Haunt([
            'name'  =>  $request->get('name')
        ]);

        try {
            $haunt->save();
        } catch (\Exception $e){
            return response()->json([
                'error' =>  "Unable to save haunt.",
                'message'   =>  $e->getMessage()
            ],422);
        }

        return response()->json([
            'message'   =>  "Haunt saved successfully.",
            'haunt'  =>  $haunt
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Haunt  $haunt
     * @return \Illuminate\Http\Response
     */
    public function show(Haunt $haunt)
    {
        return Haunt::find($haunt);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Haunt  $haunt
     * @return \Illuminate\Http\Response
     */
    public function edit(Haunt $haunt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Haunt  $haunt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Haunt $haunt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Haunt  $haunt
     * @return \Illuminate\Http\Response
     */
    public function destroy(Haunt $haunt)
    {
        //
    }
}
