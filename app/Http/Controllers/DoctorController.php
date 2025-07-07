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
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Models\Schedule;
use Carbon\Carbon;

class DoctorController extends Controller
{
    public function dashboard()
    {
        $totalUsers = User::count();
        $totalDoctors = Medecin::count();
        $totalAppointments = Appointment::count();
        $totalPatients = Patient::count();
        $totalNewQueries = ContactUs::whereNull('IsRead')->count();

        return view('doctor.doctor.dashboard', compact(
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
        return view('doctor.doctor.doctor-specilization', compact('specializations'));
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
        return view('doctor.doctor.edit-doctor-specialization', compact('spec'));
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
        return view('doctor.doctor.manage-doctors', compact('doctors'));
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
        return view('doctor.doctor.edit-doctor', compact('spec'));
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
        return view('doctor.doctor.add-doctor', compact('specializations'));
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
            'consultancy_fees' => $request->docfees,
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
        return view('doctor.doctor.manage-patient', compact('patients'));
    }



    public function viewPatient($id)
    {
        $patient = Patient::findOrFail($id);
        $medicalHistory = MedicalHistory::where('PatientID', $id)->orderBy('CreationDate', 'desc')->get();
        return view('doctor.doctor.view-patient', compact('patient', 'medicalHistory'));
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


    // appointments
    public function appointmentHistory()
    {
        $appointments = Appointment::with(['doctor', 'patient'])
            ->orderBy('created_at', 'desc')
            ->get();
        return view('doctor.doctor.appointment-history', compact('appointments'));
    }

    public function newAppointment()
    {
        $appointments = Appointment::with(['doctor', 'patient'])
            ->orderBy('created_at', 'desc')
            ->get();
        return view('doctor.doctor.new_appointment', compact('appointments'));
    }
    public function approvedAppointment()
    {
        $appointments = Appointment::with(['doctor', 'patient'])
            ->orderBy('created_at', 'desc')
            ->get();
        return view('doctor.doctor.approved_appointment', compact('appointments'));
    }
    public function cancelledAppointment()
    {
        $appointments = Appointment::with(['doctor', 'patient'])
            ->orderBy('created_at', 'desc')
            ->get();
        return view('doctor.doctor.cancelled_appointment', compact('appointments'));
    }





    public function approve(Request $request, $id)
    {
        $request->validate([
            'remark' => 'required|string',
        ]);

        $appointment = Appointment::findOrFail($id);
        $appointment->doctor_status = 2;
        $appointment->status = 'Approuvé';
        $appointment->remark = $request->remark;
        $appointment->save();

        // Mail de confirmation au patient
        if ($appointment->email) {
            try {
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = env('MAIL_HOST');
                $mail->SMTPAuth = true;
                $mail->Username = env('MAIL_USERNAME');
                $mail->Password = env('MAIL_PASSWORD');
                $mail->SMTPSecure = env('MAIL_ENCRYPTION');
                $mail->Port = env('MAIL_PORT');

                $mail->setFrom(env('MAIL_FROM_ADDRESS'), 'Clinique Espoir Santé');
                $mail->addAddress($appointment->email, $appointment->name);
                $mail->isHTML(true);
                $mail->Subject = 'Votre rendez-vous est approuvé';
                $mail->Body = '
                <h2 style="color: green;">Rendez-vous confirmé</h2>
                <p>Bonjour ' . htmlspecialchars($appointment->name) . ',</p>
                <p>Votre rendez-vous du <strong>' . $appointment->appointment_date . '</strong> à <strong>' . $appointment->appointment_time . '</strong> avec le Dr <strong>' . ($appointment->doctor->FullName ?? '-') . '</strong> a été <strong>approuvé</strong>.</p>
                <p><strong>Remarque du médecin :</strong> ' . nl2br(htmlspecialchars($appointment->remark)) . '</p>
                <p>Merci de vous présenter à l’heure.</p>
                <br><p>— Clinique Espoir Santé</p>
            ';
                $mail->send();
            } catch (Exception $e) {
                // log error si tu veux
            }
        }

        Schedule::create([
            'doctor_id'    => $appointment->doctor_id,
            'date'         => $appointment->appointment_date,
            'start_time'   => $appointment->appointment_time,
            'patient_name' => $appointment->name,
            'motif'        => $appointment->message,
        ]);

        return back()->with('success', 'Rendez-vous approuvé et e-mail envoyé.');
    }


    public function reject(Request $request, $id)
    {
        $request->validate([
            'remark' => 'required|string',
        ]);

        $appointment = Appointment::findOrFail($id);
        $appointment->doctor_status = 0;
        $appointment->status = 'Rejeté';
        $appointment->remark = $request->remark;
        $appointment->save();

        // Mail au patient
        if ($appointment->email) {
            try {
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = env('MAIL_HOST');
                $mail->SMTPAuth = true;
                $mail->Username = env('MAIL_USERNAME');
                $mail->Password = env('MAIL_PASSWORD');
                $mail->SMTPSecure = env('MAIL_ENCRYPTION');
                $mail->Port = env('MAIL_PORT');

                $mail->setFrom(env('MAIL_FROM_ADDRESS'), 'Clinique Espoir Santé');
                $mail->addAddress($appointment->email, $appointment->name);
                $mail->isHTML(true);
                $mail->Subject = 'Votre rendez-vous a été rejeté';
                $mail->Body = '
                <h2 style="color: red;">Rendez-vous rejeté</h2>
                <p>Bonjour ' . htmlspecialchars($appointment->name) . ',</p>
                <p>Malheureusement, votre rendez-vous du <strong>' . $appointment->appointment_date . '</strong> à <strong>' . $appointment->appointment_time . '</strong> a été <strong>rejeté</strong>.</p>
                <p><strong>Raison :</strong> ' . nl2br(htmlspecialchars($appointment->remark)) . '</p>
                <p>Merci de reprendre un rendez-vous ou de contacter la clinique.</p>
                <br><p>— Clinique Espoir Santé</p>
            ';
                $mail->send();
            } catch (Exception $e) {
                // log error
            }
        }

        return back()->with('success', 'Rendez-vous rejeté et e-mail envoyé.');
    }




public function schedule()
{

    $doctorId =1;

    $appointments = Appointment::where('doctor_id', $doctorId)
        ->where('doctor_status', 1) 
        ->orderBy('appointment_date')
        ->orderBy('appointment_time')
        ->get();

    return view('doctor.doctor.schedule', compact('appointments'));
}









    // contact us

    public function unreadQueries()
    {
        $queries = ContactQuery::whereNull('IsRead')->orderBy('PostingDate', 'desc')->get();
        return view('doctor.doctor.unread-queries', compact('queries'));
    }

    public function queryDetails($id)
    {
        $query = ContactQuery::findOrFail($id);
        // mark as read
        $query->IsRead = 1;
        $query->save();
        return view('doctor.doctor.query-details', compact('query'));
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
        return view('doctor.doctor.read-query', compact('queries'));
    }
}
