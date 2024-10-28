<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coordonnee extends Model
{
    use HasFactory;
    protected $fillable = [
        "numero_civique",
        "rue",
        "bureau",
        "ville",
        "province",
        "site_internet",
        "code_postal",
        "region_administrative",
        "fiche_fournisseur_id"
    ];

    public function telephones()
{
    return $this->belongsToMany(Telephone::class, 'coordonnee_telephone');
}

}
