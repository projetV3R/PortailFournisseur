<?php

namespace App\Observers;

use App\Models\FicheFournisseur;
use App\Models\HistoriqueFournisseur;

class FicheFournisseurObserver
{
    /**
     * Handle the FicheFournisseur "created" event.
     */
    public function created(FicheFournisseur $ficheFournisseur): void
    {
        HistoriqueFournisseur::create([
            'fiche_fournisseur_id' => $ficheFournisseur->id,
            'type_modification' => 'Creation',
            'etat' => 'En attente',
            'table_modifiee' => 'Fiche fournisseur',
            'details_modifications' => 'Création de la fiche fournisseur ' . $ficheFournisseur->nom_entreprise,
            'date_modification' => now(),
        ]);
    }

    /**
     * Handle the FicheFournisseur "updated" event.
     */
    public function updated(FicheFournisseur $ficheFournisseur): void
    {
        // Comparer les anciennes et nouvelles valeurs
        $modifications = [];
        foreach ($ficheFournisseur->getChanges() as $key => $value) {
            $modifications[] = "Le champ $key a été changé de {$ficheFournisseur->getOriginal($key)} à $value";
        }

        HistoriqueFournisseur::create([
            'fiche_fournisseur_id' => $ficheFournisseur->id,
            'type_modification' => 'Modification',
            'table_modifiee' => 'Fiche fournisseur',
            'details_modifications' => implode(', ', $modifications),
            'date_modification' => now(),
        ]);
    }

    /**
     * Handle the FicheFournisseur "deleted" event.
     */
    public function deleted(FicheFournisseur $ficheFournisseur): void
    {
        //
    }

    /**
     * Handle the FicheFournisseur "restored" event.
     */
    public function restored(FicheFournisseur $ficheFournisseur): void
    {
        //
    }

    /**
     * Handle the FicheFournisseur "force deleted" event.
     */
    public function forceDeleted(FicheFournisseur $ficheFournisseur): void
    {
        //
    }
}
