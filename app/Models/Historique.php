<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historique extends Model
{
    use HasFactory;

    protected $table = 'historiques';

    protected $fillable = [
        'table_name',
        'record_id',
        'user_id',
        'action',
        'old_values',
        'new_values',
        'fiche_fournisseur_id',
    ];

  
    public function getOldValuesAttribute($value)
    {
        return json_decode($value, true);
    }

    public function getNewValuesAttribute($value)
    {
        return json_decode($value, true);
    }

   
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function ficheFournisseur()
    {
        return $this->belongsTo(FicheFournisseur::class, 'fiche_fournisseur_id');
    }
}
