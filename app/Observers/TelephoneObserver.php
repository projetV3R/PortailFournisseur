<?php

namespace App\Observers;

use App\Models\HistoriqueFournisseur;
use App\Models\Telephone;
use Illuminate\Support\Facades\Session;

class TelephoneObserver
{
    /**
     * Handle the Telephone "created" event.
     */
    public function created(Telephone $telephone): void
    {
        //
    }

    /**
     * Handle the Telephone "updated" event.
     */
    public function updated(Telephone $telephone): void
    {
        // Récupérer l'ID de la fiche fournisseur depuis la session
        $fournisseurId = Session::get('fournisseur_id');

        // Comparer les anciennes et nouvelles valeurs
        $modifications = [];
        foreach ($telephone->getChanges() as $key => $value) {
            $modifications[] = "Le champ $key a été changé de {$telephone->getOriginal($key)} à $value";
        }

        // Enregistrement de l'événement dans l'historique
        HistoriqueFournisseur::create([
            'fiche_fournisseur_id' => $fournisseurId,
            'type_modification' => 'Modification',
            'etat' => null,
            'table_modifiee' => 'Telephone',
            'details_modifications' => implode(', ', $modifications),
            'date_modification' => now(),
        ]);
    }

    /**
     * Handle the Telephone "deleted" event.
     */
    public function deleted(Telephone $telephone): void
    {
        // Récupérer l'ID de la fiche fournisseur depuis la session
        $fournisseurId = Session::get('fournisseur_id');

        // Enregistrement de l'événement dans l'historique
        HistoriqueFournisseur::create([
            'fiche_fournisseur_id' => $fournisseurId,
            'type_modification' => 'Suppression',
            'etat' => null,
            'table_modifiee' => 'Telephone',
            'details_modifications' => 'Suppression du numéro de téléphone: ' . $telephone->numero_telephone,
            'date_modification' => now(),
        ]);
    }

    /**
     * Handle the Telephone "restored" event.
     */
    public function restored(Telephone $telephone): void
    {
        //
    }

    /**
     * Handle the Telephone "force deleted" event.
     */
    public function forceDeleted(Telephone $telephone): void
    {
        //
    }
}
