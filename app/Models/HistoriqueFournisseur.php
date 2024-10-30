<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriqueFournisseur extends Model
{
    use HasFactory;

    protected $table = 'historique_fournisseurs';

    /**
     * Les attributs qui sont assignables.
     *
     * @var array
     */
    protected $fillable = [
        'fournisseur_id',
        'type_modification',
        'etat',
        'table_modifiee',
        'details_modifications',
        'raison',
        'date_modification',
    ];

    /**
     * Relation avec le modèle Fournisseur
     */
    public function fournisseur()
    {
        return $this->belongsTo(FicheFournisseur::class);
    }
}
