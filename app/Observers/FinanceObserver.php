<?php

namespace App\Observers;

use App\Models\Finance;
use App\Models\HistoriqueFournisseur;

class FinanceObserver
{
    /**
     * Handle the Finance "created" event.
     */
    public function created(Finance $finance): void
    {
        //
    }

    /**
     * Handle the Finance "updated" event.
     */
    public function updated(Finance $finance): void
    {
        // Comparer les anciennes et nouvelles valeurs
        $modifications = [];
        foreach ($finance->getChanges() as $key => $value) {
            $modifications[] = "Le champ $key a été changé de {$finance->getOriginal($key)} à $value";
        }

        // Enregistrement de l'événement dans l'historique
        HistoriqueFournisseur::create([
            'fiche_fournisseur_id' => $finance->fiche_fournisseur_id,
            'type_modification' => 'Modification',
            'etat' => null,
            'table_modifiee' => 'Finance',
            'details_modifications' => implode(', ', $modifications),
            'date_modification' => now(),
        ]);
    }

    /**
     * Handle the Finance "deleted" event.
     */
    public function deleted(Finance $finance): void
    {
        // Enregistrement de l'événement dans l'historique
        HistoriqueFournisseur::create([
            'fiche_fournisseur_id' => $finance->fiche_fournisseur_id,
            'type_modification' => 'Suppression',
            'etat' => null,
            'table_modifiee' => 'Finance',
            'details_modifications' => 'Suppression des informations financières: Numéro TPS ' . $finance->numero_tps,
            'date_modification' => now(),
        ]);
    }

    /**
     * Handle the Finance "restored" event.
     */
    public function restored(Finance $finance): void
    {
        //
    }

    /**
     * Handle the Finance "force deleted" event.
     */
    public function forceDeleted(Finance $finance): void
    {
        //
    }
}
