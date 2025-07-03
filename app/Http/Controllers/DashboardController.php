<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth:medecin');
    // }

    public function dashboard_medecin()
    {
        return view('medecin.dams.doctor.dashboard');
    }

    public function new_appointment()
    {
        return view('medecin.dams.doctor.new_appointment');
    }

    public function approved_appointment()
    {
        // Pour le développement/test, nous gérons sans vérifier l'authentification pour le moment.
        // En production, cette fonction devrait être protégée par un middleware d'authentification.

        // Récupérer l'utilisateur authentifié. Si aucun, $medecin sera null.
        $medecin = Auth::user();

        // Définir l'ID du médecin.
        // Pour le test sans authentification, nous allons temporairement utiliser un ID fixe (par exemple, 1).
        // Assurez-vous que cet ID existe dans votre table 'medecins' et est associé à des rendez-vous.
        // En production, $docid devrait toujours venir de l'utilisateur authentifié.
        $docid = $medecin ? $medecin->id : 1; // Remplacez '1' par un ID de médecin valide pour vos tests.


        $appointments = Appointment::where('Status', 'Approved')
            ->where('doctor_id', $docid)
            ->get();

        // Passer les données à la vue
        return view('medecin.dams.doctor.approved_appointment', compact('appointments'));
    }



}
