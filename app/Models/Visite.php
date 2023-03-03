<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visite extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'date',
        'heure',
        'motifvisite',
        'descriptionvisite',
        'montant',
        'versement',

        
        
    ];

    public function dossier()
    {
        return $this->belongsTo(Dossier::class);
    }

    
}
