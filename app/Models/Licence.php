<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Licence extends Model
{
    use HasFactory;
    protected $table = 'licences';
    protected $fillable = [
        'numero_licence_rbq',
        'statut',
        'type_licence',
        'fiche_fournisseur_id'
    ];
}
