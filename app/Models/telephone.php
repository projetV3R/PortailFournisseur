<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class telephone extends Model
{
    use HasFactory;
    protected $table = 'telephones'; 
    protected $fillable = [
        "numero_telephone",
        "poste",
        "type"
    ];
}
