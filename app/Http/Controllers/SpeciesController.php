<?php

namespace App\Http\Controllers;

use App\Models\Species;
use Illuminate\Http\Request;
use Validator;

class SpeciesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $species = Species::all();
        return view('specie.index', ['species' => $species]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('specie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'specie_name' => ['required', 'min:3', 'max:64'],
        ]);
        if($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        $specie = new Species;
        $specie->name = $request->specie_name;
        $specie->save();
        return redirect()->route('specie.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Species  $species
     * @return \Illuminate\Http\Response
     */
    public function show(Species $species)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Species  $species
     * @return \Illuminate\Http\Response
     */
    public function edit(Species $specie)
    {
        return view('specie.edit', ['specie' => $specie]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Species  $species
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Species $specie)
    {
        $validator = Validator::make($request->all(),
        [
            'specie_name' => ['required', 'min:3', 'max:64'],
        ]);
        if($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
        
        $specie->name = $request->specie_name;
        $specie->save();
        return redirect()->route('specie.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Species  $species
     * @return \Illuminate\Http\Response
     */
    public function destroy(Species $specie)
    {
        $specie->delete();
        return redirect()->route('specie.index');
    }
}
