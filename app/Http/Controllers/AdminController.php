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
        $totalDoctors = Medecin::count();
        $totalAppointments = Appointment::count();
        $totalPatients = Patient::count();
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
        $doctors = Medecin::orderBy('CreationDate', 'desc')->get();
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
        $spec = Medecin::findOrFail($id);
        return view('admin.admin.edit-doctor', compact('spec'));
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
            'docemail' => 'required|email|unique:medecins,Email',
            'npass' => 'required|string|min:6|confirmed',
        ]);

        Medecin::create([
            'FullName' => $request->docname,
            'MobileNumber' => $request->doccontact,
            'Email' => $request->docemail,
            'Specialization' => $request->Doctorspecialization,
            'Password' => Hash::make($request->npass),
            'CreationDate' => now(),
        ]);

        return redirect()->route('admin.doctor.add')->with('success', 'Doctor info added Successfully');
    }


    // patients

    public function managePatients()
    {
        $patients = Patient::orderBy('CreationDate', 'desc')->get();
        return view('admin.admin.manage-patient', compact('patients'));
    }



    public function viewPatient($id)
    {
        $patient = Patient::findOrFail($id);
        $medicalHistory = MedicalHistory::where('PatientID', $id)->orderBy('CreationDate', 'desc')->get();
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

        MedicalHistory::create([
            'PatientID' => $id,
            'BloodPressure' => $request->bp,
            'BloodSugar' => $request->bs,
            'Weight' => $request->weight,
            'Temperature' => $request->temp,
            'MedicalPres' => $request->pres,
            'CreationDate' => now(),
        ]);

        return redirect()->route('admin.patient.view', $id)->with('success', 'Medical history has been added.');
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
        $queries = ContactQuery::whereNull('IsRead')->orderBy('PostingDate', 'desc')->get();
        return view('admin.admin.unread-queries', compact('queries'));
    }

    public function queryDetails($id)
    {
        $query = ContactQuery::findOrFail($id);
        // mark as read
        $query->IsRead = 1;
        $query->save();
        return view('admin.admin.query-details', compact('query'));
    }


    public function updateQuery(Request $request, $id)
    {
        $request->validate([
            'adminremark' => 'required|string',
        ]);

        $query = ContactQuery::findOrFail($id);
        $query->AdminRemark = $request->adminremark;
        $query->IsRead = true;
        $query->LastupdationDate = now();
        $query->save();

        return redirect()->route('admin.queries.details', $id)->with('success', 'Admin Remark updated successfully.');
    }


    public function readQueries()
    {
        $queries = ContactQuery::where('IsRead', true)->orderBy('PostingDate', 'desc')->get();
        return view('admin.admin.read-query', compact('queries'));
    }
}
