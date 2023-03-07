<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'datedocuments',
        'nomdocuments',
        'descriptiondocuments',
        'file',
        
    ];

    public function dossier()
    {
        return $this->belongsTo(Dossier::class);
    }

    


    
}

class DocumentPolicy
{
    public function download(User $user, Document $document)
    {
        // Check if the user has permission to download the file
        // For example, you can check if the user has access to the document's dossier
        return $user->hasAccessToDossier($document->dossier);
    }
}
