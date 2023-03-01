<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordonnance extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int,float,string>
     */
    protected $fillable = [
        
        'medicament1',
        'dosemedicament1',
        'dureemedicament1',
        'medicament2',
        'dosemedicament2',
        'dureemedicament2',
        'medicament3',
        'dosemedicament3',
        'dureemedicament3',
        'medicament4',
        'dosemedicament4',
        'dureemedicament4',
        'medicament5',
        'dosemedicament5',
        'dureemedicament5',
        //'Ndossier'
        
    ];

    public function dossier()
    {
        return $this->belongsTo(Dossier::class);
    }

    //public function dossier(){
        //return $this->hasOne('App\dossier');
   // }

    

    
}
