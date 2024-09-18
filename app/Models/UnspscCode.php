<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnspscCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'segment',
        'segment_title_en',
        'segment_title_fr',
        'family',
        'family_title_en',
        'family_title_fr',
        'class',
        'class_title_en',
        'class_title_fr',
        'commodity',
        'commodity_title_en',
        'commodity_title_fr',
    ];
}
