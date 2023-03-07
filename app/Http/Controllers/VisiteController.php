<?php

namespace App\Http\Controllers;

use App\Models\Visite;
use App\Models\Dossier;
use App\Http\Controllers\DossierController;
use Illuminate\Http\Request;

class VisiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visites = Visite::all();
        
        return view("visites/liste")->with("visites", $visites);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($dossier_id)
    {
        $dossier = Dossier::find($dossier_id);
        return view("visites/create", compact('dossier'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dossier = Dossier::find($request->dossier_id);
        $visite = new Visite();
        $visite->heure = $request->input('heure');
        $visite->date = $request->input('date');
        $visite->motifvisite = $request->input('motifvisite');
        $visite->descriptionvisite = $request->input('descriptionvisite');
       
        $visite->dossier_id = $request->input('dossier_id');
        //$visite->save();
        //$input = $request->all();
        //Visite::create($input);
        $dossier->visites()->save($visite);
        //return redirect()->route('dossiers.show', $dossier->id)->with('success', 'Visite created successfully.');
        return redirect()->route('dossiers.show', $request->input('dossier_id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $visite = Visite::find($id);
        return view("visites/show")->with('visite', $visite);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $visite = Visite::find($id);
        return view("visites/edit")->with('visite', $visite);
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
        $input = $request->all();
        $visite = Visite::find($id);
        $visite->timestamps = false;
        $visite->update($input);
        return redirect('visites/'.$id)->with('flash_message', 'Visite edited !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visite $visite)
    {
        $visite->delete();
    return redirect()->route('dossiers.show')->with('success', 'Visite has been deleted');
    }
}
