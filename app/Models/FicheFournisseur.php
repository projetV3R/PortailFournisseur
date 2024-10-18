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
        "password",
        "adresse_courriel",
        "mot_de_passe",
        "details_specifications",
        "date_changement_etat",
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Retrouve le mot de passe de l'usager.
     * Nécessaire pour l'authentification puisque Laravel a besoin d'un champ qui s'appelle password.
     * @return string
     */

}
