<?php

namespace App\Observers;

use App\Models\Coordonnee;
use App\Models\HistoriqueFournisseur;
use Illuminate\Support\Facades\Session;

class CoordonneeObserver
{
    /**
     * Handle the Coordonnee "created" event.
     */
    public function created(Coordonnee $coordonnee): void
    {
        //
    }

    /**
     * Handle the Coordonnee "updated" event.
     */
    public function updated(Coordonnee $coordonnee): void
    {
        // Récupérer l'ID de la fiche fournisseur depuis la session
        $fournisseurId = Session::get('fournisseur_id');

        // Comparer les anciennes et nouvelles valeurs
        $modifications = [];
        foreach ($coordonnee->getChanges() as $key => $value) {
            $modifications[] = "Le champ $key a été changé de {$coordonnee->getOriginal($key)} à $value";
        }

        // Enregistrement de l'événement dans l'historique
        HistoriqueFournisseur::create([
            'fiche_fournisseur_id' => $fournisseurId,
            'type_modification' => 'Modification',
            'etat' => null,
            'table_modifiee' => 'Coordonnée',
            'details_modifications' => implode(', ', $modifications),
            'date_modification' => now(),
        ]);
    }

    /**
     * Handle the Coordonnee "deleted" event.
     */
    public function deleted(Coordonnee $coordonnee): void
    {
        // Récupérer l'ID de la fiche fournisseur depuis la session
        $fournisseurId = Session::get('fournisseur_id');

        // Enregistrement de l'événement dans l'historique
        HistoriqueFournisseur::create([
            'fiche_fournisseur_id' => $fournisseurId,
            'type_modification' => 'Suppression',
            'etat' => null,
            'table_modifiee' => 'Coordonnée',
            'details_modifications' => 'Suppression de la coordonnée: ' . $coordonnee->rue,
            'date_modification' => now(),
        ]);
    }

    /**
     * Handle the Coordonnee "restored" event.
     */
    public function restored(Coordonnee $coordonnee): void
    {
        //
    }

    /**
     * Handle the Coordonnee "force deleted" event.
     */
    public function forceDeleted(Coordonnee $coordonnee): void
    {
        //
    }
}
