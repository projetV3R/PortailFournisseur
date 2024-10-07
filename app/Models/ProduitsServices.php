<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ProduitsServices extends Model
{
    use HasFactory, Notifiable;
 protected $table = 'produits_services';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nature',
        'code_categorie',
        'categorie',
        'code_unspsc',
        'description',
        'details_specifications',
    ];
}
