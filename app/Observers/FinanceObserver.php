<?php
// App/Observers/FinanceObserver.php

namespace App\Observers;

use App\Models\Finance;
use App\Models\Historique;

use Illuminate\Support\Facades\Auth;

class FinanceObserver
{
    public function updating(Finance $finance)
    {
        $historique = new Historique();
        $historique->table_name = $finance->getTable();
        $historique->record_id = $finance->id;
        $historique->user_id = Auth::id();
        $historique->action = 'update';

       
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

        $historique->fiche_fournisseur_id = $finance->fiche_fournisseur_id;
        $historique->save();
    }
}

