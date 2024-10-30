<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        "prenom",
        "nom",
        "fonction",
        "adresse_courriel",
        "fiche_fournisseur_id",
        "telephone_id"
    ];


    // Relation avec la table fiche fournisseur
    public function ficheFournisseur()
    {
        return $this->belongsTo(FicheFournisseur::class);
    }

    // Relation avec la table telephones
    public function telephone()
    {
        return $this->belongsTo(Telephone::class);
    }
}
