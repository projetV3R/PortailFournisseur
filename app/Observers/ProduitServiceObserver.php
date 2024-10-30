<?php

namespace App\Observers;

use App\Models\HistoriqueFournisseur;
use App\Models\ProduitService;
use Illuminate\Support\Facades\Session;

class ProduitServiceObserver
{
    /**
     * Handle the ProduitService "created" event.
     */
    public function created(ProduitService $produitService): void
    {
        //
    }

    /**
     * Handle the ProduitService "updated" event.
     */
    public function updated(ProduitService $produitService): void
    {
        // Récupérer l'ID de la fiche fournisseur depuis la session
        $fournisseurId = Session::get('fournisseur_id');

        // Comparer les anciennes et nouvelles valeurs
        $modifications = [];
        foreach ($produitService->getChanges() as $key => $value) {
            $modifications[] = "Le champ $key a été changé de {$produitService->getOriginal($key)} à $value";
        }

        // Enregistrement de l'événement dans l'historique
        HistoriqueFournisseur::create([
            'fiche_fournisseur_id' => $fournisseurId,
            'type_modification' => 'Modification',
            'etat' => null,
            'table_modifiee' => 'Produit/Service',
            'details_modifications' => implode(', ', $modifications),
            'date_modification' => now(),
        ]);
    }

    /**
     * Handle the ProduitService "deleted" event.
     */
    public function deleted(ProduitService $produitService): void
    {
        // Récupérer l'ID de la fiche fournisseur depuis la session
        $fournisseurId = Session::get('fournisseur_id');

        // Enregistrement de l'événement dans l'historique
        HistoriqueFournisseur::create([
            'fiche_fournisseur_id' => $fournisseurId,
            'type_modification' => 'Suppression',
            'etat' => null,
            'table_modifiee' => 'Produit/Service',
            'details_modifications' => 'Suppression du produit/service: ' . $produitService->nature,
            'date_modification' => now(),
        ]);
    }

    /**
     * Handle the ProduitService "restored" event.
     */
    public function restored(ProduitService $produitService): void
    {
        //
    }

    /**
     * Handle the ProduitService "force deleted" event.
     */
    public function forceDeleted(ProduitService $produitService): void
    {
        //
    }
}
