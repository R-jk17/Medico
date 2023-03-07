<?php

namespace App\Http\Controllers;
use App\Models\Dossier;
use App\Models\Rendez;
use App\Models\Visite;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

class RendezController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
{
    $query = request()->input("query");
    $month = $request->input('month');
    $year = $request->input('year');
    $rendezs = Rendez::query();
    if ($month && $year) {
        $rendezs->whereMonth('created_at', $month)
                ->whereYear('created_at', $year);
    }

    $rendezs = $rendezs->where(function ($q) use ($query) {
            $q->where('nom', 'like', '%' . $query . '%')
              ->orWhere('prenom', 'like', '%' . $query . '%')
              ->orWhere('tlf', 'like', '%' . $query . '%')
              ->orWhere('adress', 'like', '%' . $query . '%')
              ->orWhere('gender', 'like', '%' . $query . '%');
        })
        ->get();

    return view("rendezs.liste")->with("rendez", $rendezs);
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rendezs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        Rendez::create($input);
        return redirect ("home")->with('success', 'Rendez addedd !'); 
    }

    public function confirm($id)
{
    $rendez = Rendez::findOrFail($id);
    
    

    // Create new dossier and save it
    $dossier = Dossier::firstOrCreate([
    'nompatient' => $rendez->nom,
    'prenompatient' => $rendez->prenom,
    'tlfp' => $rendez->tlf,
    'gender'=> $rendez->gender,
    'datenaissance'=> $rendez->dateN,
    'addressp'=> $rendez->adress,
    ]);


    // Add any other relevant data from the RendezVous to the Dossier
    //$dossier->save();
     // Create new visite and save it
    $visite = new Visite;
    $visite->heure = $rendez->heure;
    $visite->date = $rendez->date;
    // Add any other relevant data from the RendezVous to the Visite
    $visite->dossier_id = $dossier->id;
    $visite->rendez_vous_id = $rendez->id;
    $visite->save();

    // Mark RendezVous as confirmed and save it
    
    $rendez->save();
    


    return redirect('dossiers');
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rendez = Rendez::find($id);
        return view('rendezs/show')->with('rendezs',$rendez);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rendez = Rendez::find($id);
        return view('rendezs.edit')->with('rendezs',$rendez);
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
        $rendez = Rendez::find($id);
        $rendez->timestamps = false;
        $rendez->update($input);
        return redirect('rendezs/'.$id)->with('flash_message', 'Rendez_vous edited !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rendez $rendez)
    {
        $rendez->delete();
    return redirect()->route('rendezs.index')->with('success', 'Rendez has been deleted');
    }
}
