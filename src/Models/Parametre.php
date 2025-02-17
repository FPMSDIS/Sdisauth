<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

 
class Parametre extends Authenticatable
{
    /**
     * Cette méthode permet d'obtenir l'historique des achats
     * @author OUATTARA EL HADJ YOUSSOUF <youssouf.ouattara@fpmnet.ci>
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public static function transformeEnCollectionEtRetouneLaPagination($donnee){
        $balanceCollection = collect($donnee);
        // Récupérer le numéro de page actuel
        $page = request()->get('page', 1);
        $perPage = 10;
        // Créer la pagination manuellement
        $paginatedBalance = new LengthAwarePaginator(
            $balanceCollection->forPage($page, $perPage), // Données pour la page actuelle
            $balanceCollection->count(), // Nombre total d'éléments
            $perPage, // Nombre d'éléments par page
            $page, // Numéro de la page actuelle
            ['path' => request()->url()] // Garde l'URL actuelle pour la pagination
        );
        return $paginatedBalance;
    }

}
