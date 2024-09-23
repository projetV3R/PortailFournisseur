<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorieUNSPSC extends Model
{
    protected $table = "unspsc_codes";
    protected $fillable = [
        'segment',
        'segmentTitleFr',
        'family',
        'familyTitleFr',
        'class',
        'classTitleFr',
        'commodity',
        'commodityTitleFr',
    ];
}
