<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use App\Models\Visite;
use Illuminate\Http\Request;

class FactureController extends Controller
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
        $factures = Facture::query();
        if($month && $year) {
            $factures->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year);

        }
    
        $factures = $factures->where(function ($q) use ($query) {
            $q->where('nomF', 'like', '%' . $query . '%')
              ->orWhere('montantT', 'like', '%' . $query . '%');
              
        })
        ->get();
        
        
        return view("factures.liste")->with("facture", $factures);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("factures.create");
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
        Facture::create($input);
        return redirect ("factures")->with('flash_message', 'Facture addedd !'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $facture = Facture::find($id);
        return view("factures/show")->with('factures', $facture);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $facture = Facture::find($id);
        return view("factures.edit")->with('factures', $facture);
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
        $facture = Facture::find($id);
        $facture->timestamps = false;
        $facture->update($input);
        return redirect('factures/'.$id)->with('flash_message', 'Facture edited !');
    }

    public function chart(Request $request)
{
    $month = $request->input('month');
    $year = $request->input('year');

    $income = Visite::whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->sum('versement');

    $expenses = Facture::whereMonth('created_at', $month)
                       ->whereYear('created_at', $year)
                       ->sum('montantT');

    return view('chart', compact('income', 'expenses'));
}




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Facture $facture)
    {
        $facture->delete();
    return redirect()->route('factures.index')->with('success', 'Facture has been deleted');
    }
}
