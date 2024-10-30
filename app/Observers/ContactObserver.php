<?php

namespace App\Observers;

use App\Models\Contact;
use App\Models\HistoriqueFournisseur;

class ContactObserver
{
    /**
     * Handle the Contact "created" event.
     */
    public function created(Contact $contact): void
    {
        //
    }

    /**
     * Handle the Contact "updated" event.
     */
    public function updated(Contact $contact): void
    {
        // Comparer les anciennes et nouvelles valeurs
        $modifications = [];
        foreach ($contact->getChanges() as $key => $value) {
            $modifications[] = "Le champ $key a été changé de {$contact->getOriginal($key)} à $value";
        }

        // Enregistrement de l'événement dans l'historique
        HistoriqueFournisseur::create([
            'fiche_fournisseur_id' => $contact->fiche_fournisseur_id,
            'type_modification' => 'Modification',
            'etat' => null,
            'table_modifiee' => 'Contact',
            'details_modifications' => implode(', ', $modifications),
            'date_modification' => now(),
        ]);
    }

    /**
     * Handle the Contact "deleted" event.
     */
    public function deleted(Contact $contact): void
    {
        // Enregistrement de l'événement dans l'historique
        HistoriqueFournisseur::create([
            'fiche_fournisseur_id' => $contact->fiche_fournisseur_id,
            'type_modification' => 'Suppression',
            'etat' => null,
            'table_modifiee' => 'Contact',
            'details_modifications' => 'Suppression du contact: ' . $contact->prenom . ' ' . $contact->nom,
            'date_modification' => now(),
        ]);
    }

    /**
     * Handle the Contact "restored" event.
     */
    public function restored(Contact $contact): void
    {
        //
    }

    /**
     * Handle the Contact "force deleted" event.
     */
    public function forceDeleted(Contact $contact): void
    {
        //
    }
}
