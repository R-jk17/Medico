<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Dossier;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::all();
        
        return view("documents/liste")->with("documents", $documents);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($dossier_id)
    {
        $dossier = Dossier::find($dossier_id);
        return view("documents/create", compact('dossier'));
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
        

        $document = new Document([
            'datedocuments' => $request->get('datedocuments'),
            'descriptiondocuments' => $request->get('descriptiondocuments'),
            'file' => $request->file('file')->store('documents'),
            
            //'dossier_id' => $request->get('dossier_id')
        ]);

        $document->dossier_id = $request->input('dossier_id');
        $document->save();
        $dossier->documents()->save($document);

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
        $document = Document::find($id);
        return view("documents/show")->with('document', $document);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $document = Document::find($id);
        return view("documents.edit")->with('document', $document);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        $request->validate([
            'datedocumets' => 'required|date',
            'descriptiondocuments' => 'required|string',
            'file' => 'nullable|file',
            
        ]);

        $document->datedocumets = $request->get('datedocumets');
        $document->descriptiondocuments = $request->get('descriptiondocuments');

        if ($request->hasFile('file')) {
            $document->file = $request->file('file')->store('documents');
        }

        $document->dossier_id = $request->get('dossier_id');

        $document->save();

        return redirect()->route('documents.liste')
                         ->with('success', 'Document updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
