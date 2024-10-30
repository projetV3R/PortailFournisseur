<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    use HasFactory;

    protected $table = 'finances';  // Nom de la table

    protected $fillable = [
        'numero_tps',
        'numero_tvq',
        'condition_paiement',
        'devise',
        'mode_communication'
    ];
}
