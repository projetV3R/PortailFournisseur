<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProduitService extends Model
{
    use HasFactory;

    protected $table = 'produits_services';

    protected $fillable = [
        'nature',
        'code_categorie',
        'categorie',
        'code_unspsc',
        'description',
        'details_specifications'
    ];

    protected $guarded = ['*'];
}
