<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dossier extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int,float, string>
     */
    protected $fillable = [
        'nompatient',
        'prenompatient',
        'gender',
        'datenaissance',
        'situation',
        'tlfp',
        'addressp',
        'taille',
        'poids',
        'groupesang',
        'Maladiechronique',
        'allergie',
        'allergiemedi',
        'antemedi',
        'antechir',
        'traitment',
        'datedebuttraitement',
        
    ];

    public function ordonnances()
    {
        return $this->hasMany(Ordonnance::class);
    }

    public function bilans()
    {
        return $this->hasMany(Bilan::class);
    }

    public function traitements()
    {
        return $this->hasMany(Traitement::class);
    }

    public function visites()
    {
        return $this->hasMany(Visite::class);
    }

    
    //public function ordonnance(){
        //return $this->hasMany('App\Ordonnance');
    //}

}
