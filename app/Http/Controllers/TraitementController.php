<?php

namespace App\Http\Controllers;

use App\Models\Traitement;
use App\Models\Dossier;
use App\Http\Controllers\DossierController;
use Illuminate\Http\Request;

class TraitementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $traitements = Traitement::all();
        
        return view("traitements/liste")->with("traitement", $traitements);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($dossier_id)
    {
        $dossier = Dossier::find($dossier_id);
        return view("traitements.create", compact('dossier'));
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
        $traitement = new Traitement();
        $traitement->debuttraitement = $request->input('debuttraitement');
        $traitement->nommedicament = $request->input('nommedicament');
        $traitement->dosemedicament = $request->input('dosemedicament');
        $traitement->dureemedicament = $request->input('dureemedicament');
        
        $traitement->dossier_id = $request->input('dossier_id');
        $traitement->save();
        //$input = $request->all();
        //Traitement::create($input);
        $dossier->traitements()->save($traitement);
        //return redirect()->route('dossiers.show', $dossier->id)->with('success', 'Traitement created successfully.');
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
        $traitement = Traitement::find($id);
        return view("traitements/show")->with('traitements', $traitement);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $traitement = Traitement::find($id);
        return view('traitements.edit')->with('traitements',$traitement);
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
        $traitement = Traitement::find($id);
        $traitement->timestamps = false;
        $traitement->update($input);
        return redirect('traitements/'.$id)->with('flash_message', 'Traitement edited !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Traitement $traitement)
    {
        $traitement->delete();
    return redirect()->route('traitements.index')->with('success', 'Traitement has been deleted');
    }
}
