<?php

namespace App\Http\Controllers;

use App\Models\Dossier;
use App\Models\Ordonnance;
use App\Models\Bilan;
use App\Models\Rendez;
use App\Models\Traitement;
use App\Models\Visite;

use Illuminate\Http\Request;
use App\Http\Controllers\OrdonnanceController;
use App\Http\Controllers\BilanController;
use App\Http\Controllers\TraitementController;
use App\Http\Controllers\VisiteController;

class DossierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
{
    $month = $request->input('month');
    $year = $request->input('year');

    $dossiers = Dossier::whereMonth('created_at', $month)
                        ->whereYear('created_at', $year)
                        ->get();

    return view('dossiers.liste', compact('dossiers'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dossiers.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$dossier = new Dossier();
        //$dossier->nompatient = $request->input('nompatient');
        //$dossier->prenompatient = $request->input('prenompatient');
        //$dossier->gender = $request->input('gender');
        //$dossier->datenaissance = $request->input('datenaissance');
        //$dossier->situation = $request->input('situation');
        //$dossier->tlfp = $request->input('tlfp');
        //$dossier->addressp = $request->input('addressp');
        //$dossier->taille = $request->input('taille');
        //$dossier->poids = $request->input('poids');
        //$dossier->groupesang = $request->input('groupesang');
        //$dossier->Maladiechronique = $request->input('Maladiechronique');
        //$dossier->allergie = $request->input('allergie');
        //$dossier->antemedi = $request->input('antemedi');
        //$dossier->antechir = $request->input('antechir');
        //$dossier->traitment = $request->input('traitment');
        //$dossier->datedebuttraitement = $request->input('datedebuttraitement');
       
        //$dossier->save();
        $input = $request->all();
        $rendez = Rendez::findOrFail($input['rendezId']);

    $dossier = new Dossier;
    $dossier->nompatient = $rendez->name;
    $dossier->prenompatient = $rendez->prenom; // Add prenompatient to the Dossier
    $dossier->tlfp = $input['tlfp'];
    // Add any other relevant data from the RendezVous to the Dossier
    $dossier->save();
        //Dossier::create($input);
        return redirect ("dossiers")->with('flash_message', 'Patient addedd !'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dossier = Dossier::find($id);
        $ordonnances = $dossier->ordonnances;
        $bilans = $dossier->bilans;
        $traitements = $dossier->traitements;
        $visites = $dossier->visites ;
        return view("dossiers/show")->with('dossiers', $dossier)->with('ordonnance', $ordonnances)->with("bilan", $bilans)->with("traitement", $traitements)->with("visites", $visites);;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dossier = Dossier::find($id);
        return view('dossiers.edit')->with('dossiers',$dossier);

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
        $dossier = Dossier::find($id);
        $dossier->timestamps = false;
        $dossier->update($input);
        return redirect('dossiers/'.$id)->with('flash_message', 'Patient edited !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dossier $dossier)
{
    $dossier->delete();
    return redirect()->route('dossiers.index')->with('success', 'Dossier has been deleted');
}
}
