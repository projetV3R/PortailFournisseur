<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrochureCarte extends Model
{
    use HasFactory;

    protected $table = 'brochures_cartes';  // Nom de la table

    protected $fillable = [
        'nom',
        'type_de_fichier',
        'chemin',
        'taille',
        'fiche_fournisseur_id'
    ];

    // Relation avec la table fiche fournisseur
    public function ficheFournisseur()
    {
        return $this->belongsTo(FicheFournisseur::class);
    }
}
