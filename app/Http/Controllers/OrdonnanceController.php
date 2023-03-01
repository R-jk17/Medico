<?php

namespace App\Http\Controllers;

use App\Models\Ordonnance;
use App\Models\Dossier;
use App\Http\Controllers\DossierController;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

class OrdonnanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = request()->input("query");
        $start = request()->input("from");
        $end = request()->input("to");

        if ($start == null) {
            $start = "1111-11-11 00:00:00";
        }
        if ($end == null) {
            $end = "9999-00-00 00:00:00";
        }
        $ordonnances = Ordonnance::whereBetween('created_at', [$start, $end])->where('medicament1', 'like', '%' . $query . '%')->get();
        return view("ordonnances.liste")->with('ordonnance', $ordonnances);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($dossier_id)

    {
        $dossier = Dossier::find($dossier_id);
        return view('ordonnances.create', compact('dossier'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {
        //$dossier = Dossier::findOrFail($request->id);
        $dossier = Dossier::find($request->dossier_id);
        


        $ordonnance = new Ordonnance();
        //$ordonnance->date = $request->input('date');
        $ordonnance->medicament1 = $request->input('medicament1');
        $ordonnance->dosemedicament1 = $request->input('dosemedicament1');
        $ordonnance->dureemedicament1 = $request->input('dureemedicament1');
        $ordonnance->medicament2 = $request->input('medicament2');
        $ordonnance->dosemedicament2 = $request->input('dosemedicament2');
        $ordonnance->dureemedicament2 = $request->input('dureemedicament2');
        $ordonnance->medicament3 = $request->input('medicament3');
        $ordonnance->dosemedicament3 = $request->input('dosemedicament3');
        $ordonnance->dureemedicament3 = $request->input('dureemedicament3');
        $ordonnance->medicament4 = $request->input('medicament4');
        $ordonnance->dosemedicament4 = $request->input('dosemedicament4');
        $ordonnance->dureemedicament4 = $request->input('dureemedicament4');
        $ordonnance->medicament5 = $request->input('medicament5');
        $ordonnance->dosemedicament5 = $request->input('dosemedicament5');
        $ordonnance->dureemedicament5 = $request->input('dureemedicament5');
        $ordonnance->dossier_id = $request->input('dossier_id');
        $ordonnance->save();
        //$input = $request->all();
        //$ordonnance->Ndossier = $dossier->id;
        //Ordonnance::create($input);
        //$dossier->ordonnances()->save($ordonnance);
       
        //return redirect('dossiers')->with('flash_message', 'Ordonnance addedd !');
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
        $ordonnance = Ordonnance::find($id);
        return view('ordonnances/show')->with('ordonnances',$ordonnance);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ordonnance = Ordonnance::find($id);
        return view('ordonnances.edit')->with('ordonnances',$ordonnance);

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
        $ordonnance = Ordonnance::find($id);
        $ordonnance->timestamps = false;
        $ordonnance->update($input);
        return redirect('dossiers/'.$id)->with('flash_message', 'Ordonnance edited !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ordonnance::destroy($id);
        return redirect('ordonnances')->with('flash_message', 'Ordonnance deleted !');
    }
}
