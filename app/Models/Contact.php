<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table = 'contacts';
    protected $fillable = [
        "prenom",
        "nom",
        "fonction",
        "adresse_courriel",
        "fiche_fournisseur_id",
        "telephone_id"
    ];
}