<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rdv extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int,float, string>
     */
    protected $fillable = [
        'nom',
        'prenom',
        'gender',
        'dateN',
        
        'tlf',
        'adress',
        'heure',
        'date',
        
        
    ];
}
