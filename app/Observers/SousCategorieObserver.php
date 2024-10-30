<?php

namespace App\Observers;

use App\Models\HistoriqueFournisseur;
use App\Models\SousCategorie;
use Illuminate\Support\Facades\Session;

class SousCategorieObserver
{
    /**
     * Handle the SousCategorie "created" event.
     */
    public function created(SousCategorie $sousCategorie): void
    {
        //
    }

    /**
     * Handle the SousCategorie "updated" event.
     */
    public function updated(SousCategorie $sousCategorie): void
    {
        // Récupérer l'ID de la fiche fournisseur depuis la session
        $fournisseurId = Session::get('fournisseur_id');

        // Comparer les anciennes et nouvelles valeurs
        $modifications = [];
        foreach ($sousCategorie->getChanges() as $key => $value) {
            $modifications[] = "Le champ $key a été changé de {$sousCategorie->getOriginal($key)} à $value";
        }

        // Enregistrement de l'événement dans l'historique
        HistoriqueFournisseur::create([
            'fiche_fournisseur_id' => $fournisseurId,
            'type_modification' => 'Modification',
            'etat' => null,
            'table_modifiee' => 'SousCategorie',
            'details_modifications' => implode(', ', $modifications),
            'date_modification' => now(),
        ]);
    }

    /**
     * Handle the SousCategorie "deleted" event.
     */
    public function deleted(SousCategorie $sousCategorie): void
    {
        // Récupérer l'ID de la fiche fournisseur depuis la session
        $fournisseurId = Session::get('fournisseur_id');

        // Enregistrement de l'événement dans l'historique
        HistoriqueFournisseur::create([
            'fiche_fournisseur_id' => $fournisseurId,
            'type_modification' => 'Suppression',
            'etat' => null,
            'table_modifiee' => 'SousCategorie',
            'details_modifications' => 'Suppression de la sous-catégorie: ' . $sousCategorie->categorie,
            'date_modification' => now(),
        ]);
    }

    /**
     * Handle the SousCategorie "restored" event.
     */
    public function restored(SousCategorie $sousCategorie): void
    {
        //
    }

    /**
     * Handle the SousCategorie "force deleted" event.
     */
    public function forceDeleted(SousCategorie $sousCategorie): void
    {
        //
    }
}
