<?php

namespace App\Http\Controllers\Sdisauth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashbordController extends Controller
{

    public function vueDashboard()
    {

        // Gestion des utiliusateurs et leurs permissions
        $nbreUtilisateur = User::count();
        $nbreDeRoles = User::count();
        $nbreDePermissions = 0;



        $nombreAchat = 0;


        $smsDisponible = 0;


        $nombreSmsUtilise = 0;

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
