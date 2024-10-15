<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class FicheFournisseur extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        "neq",
        "etat",
        "nom_entreprise",
        "adresse_courriel",
        "mot_de_passe",
        "details_specifications",
        "date_changement_etat",
    ];

    protected $hidden = [
        'mot_de_passe',
        'remember_token',
    ];

    /**
     * Retrouve le mot de passe de l'usager.
     * Nécessaire pour l'authentification puisque Laravel a besoin d'un champ qui s'appelle password.
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->mot_de_passe; // Remplace 'motdepasse' par le champ réel où le mot de passe est stocké dans ta base de données
    }

    public function getAuthIdentifierName()
    {
        // Si la colonne pour l'authentification est 'adresse_courrriel', changez ici
        return 'adresse_courrriel';
    }
}
