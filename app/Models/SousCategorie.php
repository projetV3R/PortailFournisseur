<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SousCategorie extends Model
{
    use HasFactory;

    protected $table = 'sous_categories';  // Nom de la table

    protected $fillable = [
        'categorie',
        'code_sous_categorie',
        'travaux_permis'
    ];

    protected $guarded = ['*'];
}
