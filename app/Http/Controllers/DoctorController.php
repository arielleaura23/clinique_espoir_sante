<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Appointment;
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

        return view('doctor.doctor.dashboard');
    }




    // patients

    public function managePatients(Request $request)
    {
        $query = User::where('role', 'patient');

        $patients = $query->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.admin.manage-patient', compact('patients'));
    }



    public function viewPatient($id)
    {
        $patient = User::findOrFail($id);
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
            ->whereNull('doctor_status') // non encore traité
            ->orWhere('doctor_status', 1)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('doctor.doctor.new_appointment', compact('appointments'));
    }

    public function approvedAppointment()
    {
        $appointments = Appointment::with(['doctor', 'patient'])
            ->where('doctor_status', 2)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('doctor.doctor.approved_appointment', compact('appointments'));
    }

    public function cancelledAppointment()
    {
        $appointments = Appointment::with(['doctor', 'patient'])
            ->where('doctor_status', 0)
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
                $mail->CharSet = 'UTF-8';

                $mail->setFrom(env('MAIL_FROM_ADDRESS'), 'Clinique Espoir Santé');
                $mail->addAddress($appointment->email, $appointment->name);
                $mail->isHTML(true);
                $mail->Subject = 'Votre rendez-vous est approuvé';
                $mail->Body = '
                    <!DOCTYPE html>
                    <html lang="fr">
                    <head>
                        <meta charset="UTF-8" />
                        <title>Confirmation de rendez-vous</title>
                        <style>
                        body {
                            background-color: #f6f8fa;
                            margin: 0;
                            padding: 40px 0;
                            font-size: 14px;
                            font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Oxygen, Ubuntu, sans-serif;
                        }
                        .email-container {
                            max-width: 600px;
                            margin: auto;
                            background-color: #ffffff;
                            border: 1px solid #e1e4e8;
                            border-radius: 6px;
                            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
                            overflow: hidden;
                        }
                        .email-header {
                            background-color: #ffffff;
                            text-align: center;
                            border-bottom: 1px solid #e1e4e8;
                            padding-bottom: 20px!important;
                        }
                        .email-header img {
                            height: 80px;
                            width: 100%;
                            margin-bottom: 10px;
                        }
                        .email-title {
                            font-size: 22px;
                            color: #1d77fe;
                            margin: 0;
                            font-weight: 600;
                        }
                        .email-body {
                            padding: 30px;
                            color: #2c2c2c;
                            font-size: 15px;
                            line-height: 1.7;
                        }
                        .email-footer {
                            padding: 20px 30px;
                            font-size: 12px;
                            text-align: center;
                            color: #888;
                            background-color: #f9f9f9;
                            border-top: 1px solid #e1e4e8;
                        }
                        .signature {
                            margin-top: 30px;
                            font-weight: 500;
                        }
                        </style>
                    </head>
                    <body>
                        <div class="email-container">
                            <div class="email-header">
                                <img src="https://ik.imagekit.io/6behazkytv/logo%20ligne%20fond%20bleu.png?updatedAt=1751769593981" alt="Clinique Espoir Santé" />
                                <h1 class="email-title">Rendez-vous confirmé</h1>
                            </div>
                            <div class="email-body">
                                <p>Bonjour ' . htmlspecialchars($appointment->name) . ',</p>
                                <p>Votre rendez-vous du <strong>' . htmlspecialchars($appointment->appointment_date) . '</strong> à <strong>' . htmlspecialchars($appointment->appointment_time) . '</strong> avec le Dr <strong>' . htmlspecialchars($appointment->doctor->name ?? '-') . '</strong> a été <strong>approuvé</strong>.</p>
                                <p><strong>Remarque du médecin :</strong> ' . nl2br(htmlspecialchars($appointment->remark ?? "Aucune remarque")) . '</p>
                                <p>Merci de vous présenter à l’heure.</p>
                                <p class="signature">Cordialement,<br />Clinique Espoir Santé</p>
                            </div>
                            <div class="email-footer">
                                Clinique Espoir Santé – Yaoundé, Cameroun<br />
                                📞 +237 6 55 41 88 41 | ✉️ cliniqueespoirsante2@gmail.com | 🌐 www.cliniquesante.cm<br />
                                © 2025 Tous droits réservés.
                            </div>
                        </div>
                    </body>
                    </html>';

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
                $mail->CharSet = 'UTF-8';

                $mail->setFrom(env('MAIL_FROM_ADDRESS'), 'Clinique Espoir Santé');
                $mail->addAddress($appointment->email, $appointment->name);
                $mail->isHTML(true);
                $mail->Subject = 'Rendez-vous rejeté - Clinique Espoir Santé';

                $mail->Body = '
        <!DOCTYPE html>
        <html lang="fr">
        <head>
            <meta charset="UTF-8" />
            <title>Rendez-vous rejeté</title>
            <style>
            body {
                background-color: #f6f8fa;
                margin: 0;
                padding: 40px 0;
                font-size: 14px;
                font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Oxygen, Ubuntu, sans-serif;
            }
            .email-container {
                max-width: 600px;
                margin: auto;
                background-color: #ffffff;
                border: 1px solid #e1e4e8;
                border-radius: 6px;
                box-shadow: 0 4px 10px rgba(0,0,0,0.05);
                overflow: hidden;
            }
            .email-header {
                background-color: #ffffff;
                text-align: center;
                border-bottom: 1px solid #e1e4e8;
                padding-bottom: 20px!important;
            }
            .email-header img {
                height: 80px;
                width: 100%;
                margin-bottom: 10px;
            }
            .email-title {
                font-size: 22px;
                color: #1d77fe;
                margin: 0;
                font-weight: 600;
            }
            .email-body {
                padding: 30px;
                color: #2c2c2c;
                font-size: 15px;
                line-height: 1.7;
            }
            .email-body ul {
                padding-left: 20px;
            }
            .email-footer {
                padding: 20px 30px;
                font-size: 12px;
                text-align: center;
                color: #888;
                background-color: #f9f9f9;
                border-top: 1px solid #e1e4e8;
            }
            .signature {
                margin-top: 30px;
                font-weight: 500;
            }
            </style>
        </head>
        <body>
            <div class="email-container">
                <div class="email-header">
                    <img src="https://ik.imagekit.io/6behazkytv/logo%20ligne%20fond%20bleu.png?updatedAt=1751769593981" alt="Clinique Espoir Santé" />
                    <h1 class="email-title">Rendez-vous rejeté</h1>
                </div>

                <div class="email-body">
                    <p>Bonjour ' . htmlspecialchars($appointment->name) . ',</p>
                    <p>Nous sommes désolés de vous informer que votre rendez-vous prévu le <strong>' . htmlspecialchars($appointment->appointment_date) . '</strong> à <strong>' . htmlspecialchars($appointment->appointment_time) . '</strong> a été <strong>rejeté</strong>.</p>

                    <p><strong>Motif du rejet :</strong><br>' . nl2br(htmlspecialchars($appointment->remark)) . '</p>

                    <p>Nous vous invitons à reprendre un rendez-vous via notre plateforme ou à contacter notre service d’accueil pour plus d’assistance.</p>

                    <p class="signature">
                        Cordialement,<br />
                        Clinique Espoir Santé
                    </p>
                </div>

                <div class="email-footer">
                    Clinique Espoir Santé – Yaoundé, Cameroun<br />
                    📞 +237 6 55 41 88 41 | ✉️ cliniqueespoirsante2@gmail.com | 🌐 www.cliniquesante.cm<br />
                    © 2025 Tous droits réservés.
                </div>
            </div>
        </body>
        </html>';

                $mail->send();
            } catch (Exception $e) {
                // Log the error if necessary
            }
        }


        return back()->with('success', 'Rendez-vous rejeté et e-mail envoyé.');
    }




    public function schedule()
    {

        $doctorId = 1;

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
