<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Species;
use App\Models\Manager;
use Illuminate\Http\Request;
use Validator;
use PDF;

class AnimalController extends Controller
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
        $animals = Animal::all();
        $species = Species::all();
        $managers = Manager::all();
        return view('animal.index', ['animals' => $animals, 'managers' => $managers, 'species' => $species]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $species = Species::all();
        $managers = Manager::all();
        return view('animal.create', ['managers' => $managers, 'species' => $species]);
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
            'animal_name' => ['required', 'min:3', 'max:64'],
            'animal_birth_year' => ['required', 'max:64'],
            'animal_book' => ['required', 'min:3',],
        ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
        
        $manager = Manager::find($request->manager_id);
        if($manager->specie_id != $request->specie_id) {
            return redirect()->route('animal.index')->with('info_message', 'Priziuretojas negali priziureti sita rusi.');
        }

        $animal = new Animal;
        $animal->name = $request->animal_name;
        $animal->specie_id = $request->specie_id;
        $animal->birth_year = $request->animal_birth_year;
        $animal->animal_book = $request->animal_book;
        $animal->manager_id = $request->manager_id;
        $animal->save();
        return redirect()->route('animal.index')->with('success_message', 'Sekmingai sukurtas.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function show(Animal $animal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function edit(Animal $animal)
    {
        $species = Species::all();
        $managers = Manager::all();
        return view('animal.edit', ['animal' => $animal, 'species' => $species, 'managers' => $managers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Animal $animal)
    {
        $validator = Validator::make($request->all(),
        [
            'animal_name' => ['required', 'min:3', 'max:64'],
            'animal_birth_year' => ['required', 'max:64'],
            'animal_book' => ['required', 'min:3',],
        ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
        
        $animal->name = $request->animal_name;
        $animal->specie_id = $request->specie_id;
        $animal->birth_year = $request->animal_birth_year;
        $animal->animal_book = $request->animal_book;
        $animal->manager_id = $request->manager_id;
        $animal->save();
        return redirect()->route('animal.index')->with('success_message', 'Sekmingai pakeistas.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Animal $animal)
    {
        $animal->delete();
        return redirect()->back()->with('info_message', 'Sekmingai istrintas.');
    }

    public function pdf(Animal $animal)
    {
        $species = Species::all();
        $pdf = PDF::loadView('animal.pdf', ['animal' => $animal, 'species' => $species]);
        return $pdf->download('animal-name'.$animal->name.'birth-year'.$animal->birth_year.'.pdf');
    }
}
