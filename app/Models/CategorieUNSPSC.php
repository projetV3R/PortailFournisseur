<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorieUNSPSC extends Model
{
    protected $table = "unspsc_codes";
    protected $fillable = [
        'segment',
        'segment-title_fr',
        'family',
        'family-title_fr',
        'class',
        'class-title_fr',
        'commodity',
        'commodity-title_fr',
    ];
}
