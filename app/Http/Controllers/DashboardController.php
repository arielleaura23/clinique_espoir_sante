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
        // // Vérifier si l'utilisateur est authentifié
        // if (!Auth::check()) {
        //     // Rediriger vers la page de connexion si non authentifié
        //     return redirect()->route('login'); // Assurez-vous que votre route de connexion est nommée 'login'
        // }

        $medecin = Auth::user();
        // $docid = $medecin->id;


        // $appointments = Appointment::where('Status', 'Approved')
        //     ->where('doctor_id', $docid)
        //     ->get();

        $docid = $medecin ? $medecin->id : 1;


        $appointments = Appointment::where('Status', 'Approved')
            ->where('doctor_id', $docid)
            ->get();

        return view('medecin.dams.doctor.approved_appointment', compact('appointments'));
    }


    public function cancelled_appointment()
    {

        $medecin = Auth::user();

        $docid = $medecin ? $medecin->id : 1;

        $appointments = Appointment::where('Status', 'Cancelled')
            ->where('doctor_id', $docid)
            ->get();

        return view('medecin.dams.doctor.cancelled_appointment', compact('appointments'));
    }

    public function showSearchForm()
    {
        return view('medecin.dams.doctor.search');
    }

    public function searchAppointments(Request $request)
    {
        $request->validate([
            'searchdata' => 'required|string|max:255',
        ]);

        $search = $request->input('searchdata');
        $doctorId = 1;

        $appointments = Appointment::where(function ($query) use ($search) {
            $query->where('AppointmentNumber', 'like', "$search%")
                ->orWhere('Name', 'like', "$search%")
                ->orWhere('MobileNumber', 'like', "$search%");
        })
            ->where('doctor_id', $doctorId)
            ->get();

        return view('medecin.dams.doctor.search', compact('appointments', 'search'));
    }
}
