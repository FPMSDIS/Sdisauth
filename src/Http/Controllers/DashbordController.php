<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\OrangeSms\AccountAdmin;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\Parametre;

class DashbordController extends Controller
{
    
    /**
     * Cette méthode permet d'afficher le tableau de bord
     * @author TOURE Yanan <yanan.toure@fpmnet.ci>
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function vueDashboard()
    {

        // Gestion des utiliusateurs et leurs permissions
        $nbreUtilisateur = User::count();
        $nbreDeRoles = User::count();
        $nbreDePermissions = Permission::count();



        //Gestion des SMS
        $accountAdmin = new AccountAdmin; //Instanciation de la classe
        $historiqueDesAchats = $accountAdmin->getPurchaseHistory2();
        $nombreAchat = count($historiqueDesAchats);

        $balance = $accountAdmin->getBalance();
        $smsDisponible = $balance[0]['availableUnits'];

        $usageSms = $accountAdmin->getUsageSummary();
        $nombreSmsUtilise = $usageSms['partnerStatistics']['statistics'][0]['serviceStatistics'][0]['countryStatistics'][0]['usage'];

        return view('dashboard', compact(
            'nbreUtilisateur',
            'nbreDeRoles',
            'nbreDePermissions',
            'nombreAchat',
            'smsDisponible',
            'nombreSmsUtilise'
        ));
    }



}
