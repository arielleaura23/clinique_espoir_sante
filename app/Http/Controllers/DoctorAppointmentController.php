<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment; // Importez le modèle Appointment
use App\Models\Medecin;    // Importez le modèle Medecin
use Illuminate\Support\Facades\Auth; // Pour l'authentification

class DoctorAppointmentController extends Controller
{
    /**
     * Affiche la liste des rendez-vous approuvés pour le médecin connecté.
     */
    public function approvedAppointments()
    {
        // Vérifier si l'utilisateur est authentifié
        if (!Auth::check()) {
            // Rediriger vers la page de connexion si non authentifié
            return redirect()->route('login'); // Assurez-vous que votre route de connexion est nommée 'login'
        }

        $medecin = Auth::user();
        $docid = $medecin->id;


        $appointments = Appointment::where('Status', 'Approved')
            ->where('doctor_id', $docid)
            ->get();

        // Passer les données à la vue
        return view('medecin.dams.doctor.approved_appointment', compact('appointments'));
    }

    /**
     * Affiche les détails d'un rendez-vous spécifique.
     */
    // public function viewAppointmentDetail($id, $aptid)
    // {
    //     // Vérifier si l'utilisateur est authentifié
    //     if (!Auth::check()) {
    //         return redirect()->route('login');
    //     }

    //     // Récupérer l'ID du médecin connecté
    //     $medecin = Auth::user();
    //     $docid = $medecin->id;

    //     // Récupérer le rendez-vous par ID et AppointmentNumber, et s'assurer qu'il appartient au médecin connecté
    //     $appointment = Appointment::where('ID', $id)
    //         ->where('AppointmentNumber', $aptid)
    //         ->where('doctor_id', $docid)
    //         ->firstOrFail(); // firstOrFail lancera une 404 si non trouvé

    //     // Passer les détails du rendez-vous à une nouvelle vue
    //     return view('medecin.dams.doctor.view_appointment_detail', compact('appointment'));
    // }
}
