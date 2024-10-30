<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telephone extends Model
{
    use HasFactory;

    protected $table = 'telephones';  // Nom de la table

    protected $fillable = [
        'numero_telephone',
        'ligne',
        'poste'
    ];
}
