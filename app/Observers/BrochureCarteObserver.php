<?php

namespace App\Observers;

use App\Models\BrochureCarte;
use App\Models\HistoriqueFournisseur;

class BrochureCarteObserver
{
    /**
     * Handle the BrochureCarte "created" event.
     */
    public function created(BrochureCarte $brochureCarte): void {}

    /**
     * Handle the BrochureCarte "updated" event.
     */
    public function updated(BrochureCarte $brochureCarte): void
    {
        // Comparer les anciennes et nouvelles valeurs
        $modifications = [];
        foreach ($brochureCarte->getChanges() as $key => $value) {
            $modifications[] = "Le champ $key a été changé de {$brochureCarte->getOriginal($key)} à $value";
        }

        // Enregistrement de l'événement dans l'historique
        HistoriqueFournisseur::create([
            'fiche_fournisseur_id' => $brochureCarte->fiche_fournisseur_id,
            'type_modification' => 'Modification',
            'table_modifiee' => 'Brochure/Carte',
            'details_modifications' => implode(', ', $modifications),
            'date_modification' => now(),
        ]);
    }

    /**
     * Handle the BrochureCarte "deleted" event.
     */
    public function deleted(BrochureCarte $brochureCarte): void
    {
        //
    }

    /**
     * Handle the BrochureCarte "restored" event.
     */
    public function restored(BrochureCarte $brochureCarte): void
    {
        //
    }

    /**
     * Handle the BrochureCarte "force deleted" event.
     */
    public function forceDeleted(BrochureCarte $brochureCarte): void
    {
        //
    }
}
