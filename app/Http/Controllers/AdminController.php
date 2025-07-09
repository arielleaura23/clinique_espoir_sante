<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Medecin;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\ContactUs;
use App\Models\DoctorSpecilization;
use Illuminate\Support\Facades\Hash;
use App\Models\MedicalHistory;
use App\Models\ContactQuery;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalUsers = User::count();
        $totalDoctors = User::where('role', 'medecin')->count();
        $totalPatients = User::where('role', 'patient')->count();
        $totalAppointments = Appointment::count();
        $totalNewQueries = ContactUs::whereNull('IsRead')->count();

        return view('admin.admin.dashboard', compact(
            'totalUsers',
            'totalDoctors',
            'totalAppointments',
            'totalPatients',
            'totalNewQueries'
        ));
    }


    public function doctorSpecialization()
    {
        $specializations = DoctorSpecilization::orderBy('creationDate', 'desc')->get();
        return view('admin.admin.doctor-specilization', compact('specializations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'doctorspecilization' => 'required|string|max:255|unique:doctor_specilizations,specilization',
        ]);

        DoctorSpecilization::create([
            'specilization' => $request->doctorspecilization,
            'creationDate' => now(),
        ]);

        return redirect()->route('admin.doctor.specialization')
            ->with('success', 'Doctor Specialization added successfully!');
    }

    public function editDoctorSpecialization($id)
    {
        $spec = DoctorSpecilization::findOrFail($id);
        return view('admin.admin.edit-doctor-specialization', compact('spec'));
    }

    public function updateDoctorSpecialization(Request $request, $id)
    {
        $request->validate([
            'doctorspecilization' => 'required|string|max:255|unique:doctor_specilizations,specilization,' . $id,
        ]);

        $spec = DoctorSpecilization::findOrFail($id);
        $spec->specilization = $request->doctorspecilization;
        $spec->updationDate = now();
        $spec->save();

        return redirect()->route('admin.doctor.specialization')->with('success', 'Doctor Specialization updated successfully!');
    }

    public function manageDoctors()
    {
        $doctors = User::where('role', 'medecin')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.admin.manage-doctors', compact('doctors'));
    }

    public function deleteDoctor($id)
    {
        $doctor = Medecin::findOrFail($id);
        $doctor->delete();

        return redirect()->route('admin.doctor.manage')->with('success', 'Doctor deleted successfully!');
    }

    public function editDoctor($id)
    {
        $medecin = User::where('id', $id)
            ->where('role', 'medecin')
            ->firstOrFail();

        $specializations = DoctorSpecilization::orderBy('specilization')->get();

        return view('admin.admin.edit-doctor', compact('medecin', 'specializations'));
    }


    public function updateDoctor(Request $request, $id)
    {
        $request->validate([
            'Doctorspecialization' => 'required|string|max:255',
            'docname' => 'required|string|max:255',
            'clinicaddress' => 'required|string|max:500',
            'docfees' => 'required|numeric|min:0',
            'doccontact' => 'required|string|max:20',
            'password' => 'nullable|string|min:8|confirmed',
            'password_confirmation' => 'nullable|same:password'
        ]);


        $medecin = User::where('id', $id)
            ->where('role', 'medecin')
            ->firstOrFail();


        $medecin->name = $request->docname;
        $medecin->address = $request->clinicaddress;
        $medecin->consultancy_fees = $request->docfees;
        $medecin->phone = $request->doccontact;
        $medecin->specialization = $request->Doctorspecialization;
        $medecin->password = Hash::make($request->password);


        $medecin->save();

        return redirect()->back()->with('success', 'Le profil du médecin a été mis à jour avec succès.');
    }



    public function destroy($id)
    {
        $spec = DoctorSpecilization::findOrFail($id);
        $spec->delete();

        return redirect()->route('admin.doctor.specialization')
            ->with('success', 'Doctor Specialization deleted!');
    }


    public function addDoctorForm()
    {
        $specializations = DoctorSpecilization::orderBy('specilization')->get();
        return view('admin.admin.add-doctor', compact('specializations'));
    }

    public function addDoctor(Request $request)
    {
        $request->validate([
            'Doctorspecialization' => 'required|exists:doctor_specilizations,specilization',
            'docname' => 'required|string|max:255',
            'clinicaddress' => 'required|string|max:255',
            'docfees' => 'required|numeric',
            'doccontact' => 'required|string|max:20',
            'docemail' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->docname,
            'phone' => $request->doccontact,
            'email' => $request->docemail,
            'consultancy_fees' => $request->docfees,
            'specialization' => $request->Doctorspecialization,
            'password' => ('11111111'),
            'role' => 'medecin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.doctor.add')->with('success', 'Doctor info added Successfully');
    }



    // patients

    public function managePatients(Request $request)
    {
        $query = User::where('role', 'patient');

        // Si recherche par nom, email ou téléphone
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                    ->orWhere('email', 'like', "%$search%")
                    ->orWhere('phone', 'like', "%$search%");
            });
        }

        $patients = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.admin.manage-patient', compact('patients'));
    }




    public function viewPatient($id)
    {
        $patient = User::where('id', $id)
            ->where('role', 'patient')
            ->firstOrFail();

        $medicalHistory = MedicalHistory::where('user_id', $id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.admin.view-patient', compact('patient', 'medicalHistory'));
    }


public function addMedicalHistory(Request $request, $id)
{
    $request->validate([
        'bp' => 'required|string|max:255',
        'bs' => 'required|string|max:255',
        'weight' => 'required|string|max:255',
        'temp' => 'required|string|max:255',
        'pres' => 'required|string',
    ]);


    $patient = User::where('id', $id)->where('role', 'patient')->firstOrFail();

MedicalHistory::create([
    'user_id' => $id, 
    'BloodPressure' => $request->bp,
    'BloodSugar' => $request->bs,
    'Weight' => $request->weight,
    'Temperature' => $request->temp,
    'MedicalPres' => $request->pres,
    'created_at' => now(),
]);


    return redirect()
        ->route('admin.patient.view', $id)
        ->with('success', 'L\'historique médical a bien été ajouté.');
}



    // appointment history
    public function appointmentHistory()
    {
        $appointments = Appointment::with(['doctor', 'patient'])
            ->orderBy('created_at', 'desc')
            ->get();
        return view('admin.admin.appointment-history', compact('appointments'));
    }


    // contact us

    public function unreadQueries()
    {
        $queries = ContactQuery::where('IsRead', 0)->orderByDesc('PostingDate')->get();
        return view('admin.admin.unread-queries', compact('queries'));
    }

    public function queryDetails($id)
    {
        $query = ContactQuery::findOrFail($id);
        return view('admin.admin.query-details', compact('query'));
    }

    public function updateQuery(Request $request, $id)
    {
        $request->validate([
            'AdminRemark' => 'required|string|max:1000',
        ]);

        $query = ContactQuery::findOrFail($id);

        $query->update([
            'AdminRemark' => $request->AdminRemark,
            'IsRead' => 1,
            'LastupdationDate' => now(),
        ]);


        return redirect()->route('admin.queries.read')->with('success', 'Remarque enregistrée. Message déplacé dans Read Queries.');
    }


    public function readQueries()
    {
        $queries = ContactQuery::where('IsRead', 1)->orderByDesc('LastupdationDate')->get();
        return view('admin.admin.read-query', compact('queries'));
    }

    public function editRemark(Request $request, $id)
    {
        $request->validate([
            'AdminRemark' => 'required|string|max:1000',
        ]);

        $query = ContactQuery::findOrFail($id);

        $query->update([
            'AdminRemark' => $request->AdminRemark,
            'LastupdationDate' => now(),
        ]);

        return redirect()->back()->with('success', 'Remarque mise à jour avec succès.');
    }
}
