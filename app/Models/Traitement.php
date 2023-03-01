<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Traitement extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, float,string>
     */
    protected $fillable = [
        'debuttraitement',
        'nommedicament',
        'dosemedicament',
        'dureemedicament',
        
        
    ];
    public function dossier()
    {
        return $this->belongsTo(Dossier::class);
    }

    
}
