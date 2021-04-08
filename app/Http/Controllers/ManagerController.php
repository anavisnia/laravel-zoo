<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use App\Models\Species;
use Illuminate\Http\Request;
use Validator;

class ManagerController extends Controller
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
        $managers = Manager::all();
        return view('manager.index', ['managers' => $managers, 'species' => $species]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $species = Species::all();
        return view('manager.create', ['species' => $species]);
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
            'manager_name' => ['required', 'min:3', 'max:64'],
            'manager_surname' => ['required', 'min:3', 'max:64'],
        ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        $manager = new Manager;
        $manager->name = $request->manager_name;
        $manager->surname = $request->manager_surname;
        $manager->specie_id = $request->specie_id;
        $manager->save();
        return redirect()->route('manager.index')->with('success_message', 'Sekmingai įrašytas.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function show(Manager $manager)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function edit(Manager $manager)
    {
        $species = Species::all();
        return view('manager.edit', ['manager' => $manager, 'species' => $species]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manager $manager)
    {
        $validator = Validator::make($request->all(),
        [
            'manager_name' => ['required', 'min:3', 'max:64'],
            'manager_surname' => ['required', 'min:3', 'max:64'],
        ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        $manager->name = $request->manager_name;
        $manager->surname = $request->manager_surname;
        $manager->specie_id = $request->specie_id;
        $manager->save();
        return redirect()->route('manager.index')->with('success_message', 'Sekmingai įrašytas.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manager $manager)
    {
        $manager->delete();
        return redirect()->route('manager.index')->with('info_message', 'Sekmingai istrintas.');
    }
}
