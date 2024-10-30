<?php

namespace App\Observers;

use App\Models\HistoriqueFournisseur;
use App\Models\Licence;

class LicenceObserver
{
    /**
     * Handle the Licence "created" event.
     */
    public function created(Licence $licence): void
    {
        //
    }

    /**
     * Handle the Licence "updated" event.
     */
    public function updated(Licence $licence): void
    {
        // Comparer les anciennes et nouvelles valeurs
        $modifications = [];
        foreach ($licence->getChanges() as $key => $value) {
            $modifications[] = "Le champ $key a été changé de {$licence->getOriginal($key)} à $value";
        }

        // Enregistrement de l'événement dans l'historique
        HistoriqueFournisseur::create([
            'fiche_fournisseur_id' => $licence->fiche_fournisseur_id,
            'type_modification' => 'Modification',
            'etat' => null,
            'table_modifiee' => 'Licence',
            'details_modifications' => implode(', ', $modifications),
            'date_modification' => now(),
        ]);
    }

    /**
     * Handle the Licence "deleted" event.
     */
    public function deleted(Licence $licence): void
    {
        HistoriqueFournisseur::create([
            'fiche_fournisseur_id' => $licence->fiche_fournisseur_id,
            'type_modification' => 'Suppression',
            'etat' => null,
            'table_modifiee' => 'Licence',
            'details_modifications' => 'Suppression de la licence RBQ : ' . $licence->numero_licence_rbq,
            'date_modification' => now(),
        ]);
    }

    /**
     * Handle the Licence "restored" event.
     */
    public function restored(Licence $licence): void
    {
        //
    }

    /**
     * Handle the Licence "force deleted" event.
     */
    public function forceDeleted(Licence $licence): void
    {
        //
    }
}
