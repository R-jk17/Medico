<?php

namespace App\Http\Controllers;

use App\Models\Bilan;
use App\Models\Dossier;
use App\Http\Controllers\DossierController;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

class BilanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bilans = Bilan::all();
        
        return view('bilans.liste')->with("bilan", $bilans);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($dossier_id)
    {
        $dossier = Dossier::find($dossier_id);
        return view("bilans.create", compact('dossier'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {
        $dossier = Dossier::find($request->dossier_id);
        
        $bilan = new Bilan();
        //$bilan->datebilan = $request->input('datebilan');
        $bilan->nombilan = $request->input('nombilan');
        $bilan-> typebilan = $request->input('typebilan');
        $bilan->dureebilan = $request->input('dureebilan');
        $bilan->descriptionbilan = $request->input('descriptionbilan');
        
        $bilan->dossier_id = $request->input('dossier_id');
        $bilan->save();
        //$input = $request->all();
        //Bilan::create($input);
        $dossier->bilans()->save($bilan);
        //return redirect()->route('dossiers.show', $dossier->id)->with('success', ' bilan created successfully.');
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
        $bilan = Bilan::find($id);
        return view("bilans/show")->with('bilans', $bilan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bilan = Bilan::find($id);
        return view('bilans.edit')->with('bilans',$bilan);

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
        $bilan = Bilan::find($id);
        $bilan->timestamps = false;
        $bilan->update($input);
        return redirect('bilans/'.$id)->with('flash_message', 'bilan edited !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bilan::destroy($id);
        return redirect('bilans')->with('flash_message', 'Bilan deleted !');
    }
}
