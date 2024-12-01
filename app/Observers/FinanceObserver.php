<?php
// App/Observers/FinanceObserver.php

namespace App\Observers;

use App\Models\Finance;
use App\Models\Historique;

use Illuminate\Support\Facades\Auth;
use App\Notifications\NotificationModification;
use Illuminate\Support\Facades\Notification;
use App\Models\ParametreSysteme;
class FinanceObserver
{
    //TODO Update pour lisibilité et fonction a refacto
    public function updating(Finance $finance)
    {
        $fournisseur = Auth::user();
        $historique = new Historique();
        $historique->table_name = $finance->getTable();
        $historique->author = $fournisseur->adresse_courriel;
        $historique->action = 'Modifier';

       
        $newValues = [];
        foreach ($finance->getDirty() as $key => $value) {
            $newValues[] = "+$key: $value";
        }
        $historique->new_values = implode(", ", $newValues); 

  
        $originalValues = [];
        foreach ($finance->getDirty() as $key => $value) {
            $originalValues[] = "-$key: " . $finance->getOriginal($key);
        }
        $historique->old_values = implode(", ", $originalValues); // Convertit en chaîne lisible

        $historique->fiche_fournisseur_id =  $fournisseur->id;
        $historique->save();
        $sectionModifiee = 'Finance';
        $data = [
        'sectionModifiee' => $sectionModifiee,
        'nomEntreprise' => $fournisseur->nom_entreprise,
        'emailEntreprise' => $fournisseur->adresse_courriel,
        'dateModification' => now()->format('d-m-Y H:i:s'),
        'auteur' => $fournisseur->adresse_courriel,
    ];
    $emailApprovisionnement = ParametreSysteme::where('cle', 'email_approvisionnement')->value('valeur');
    Notification::route('mail', $emailApprovisionnement)->notify(new NotificationModification($data));
    }

    public function creating(Finance $finance)
    {    $fournisseur = Auth::user();
        $historique = new Historique();
        $historique->table_name = $finance->getTable();
        $historique->author =  $fournisseur->adresse_courriel;
        $historique->action = 'Modifier';

      
        $newValues = [];
        foreach ($finance->getAttributes() as $key => $value) {
            $newValues[] = "+$key: $value";
        }
        $historique->new_values = implode(", ", $newValues);
        $historique->old_values = null; 

        $historique->fiche_fournisseur_id = $fournisseur->id;
        $historique->save();

     
        $sectionModifiee = 'Finance';
        $data = [
        'sectionModifiee' => $sectionModifiee,
        'nomEntreprise' => $fournisseur->nom_entreprise,
        'emailEntreprise' => $fournisseur->adresse_courriel,
        'dateModification' => now()->format('d-m-Y H:i:s'),
        'auteur' => $fournisseur->adresse_courriel,
    ];
    $emailApprovisionnement = ParametreSysteme::where('cle', 'email_approvisionnement')->value('valeur');
    Notification::route('mail', $emailApprovisionnement)->notify(new NotificationModification($data));
    }
}

