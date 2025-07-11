<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Medecin;
use App\Models\DoctorSpecilization;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Models\User;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('home');
    }
    public function about()
    {
        return view('about');
    }
    public function services()
    {
        return view('services');
    }
    public function guide_patient()
    {
        return view('guide_patient');
    }
    public function blog()
    {
        return view('blog');
    }
    public function contact()
    {
        return view('contact');
    }
    public function events()
    {
        return view('events');
    }
    public function medecins()
    {
        return view('medecins');
    }
    public function pharmacie()
    {
        return view('pharmacie');
    }

    public function prise_rdv()
    {
        $specialites = DoctorSpecilization::orderBy('specilization')->get();
        $medecins = User::where('role', 'medecin')->orderBy('name')->get();

        return view('prise_rdv', compact('specialites', 'medecins'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'heure' => 'required',
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'sexe' => 'required|in:Homme,Femme',
            'telephone' => 'required|string|max:20',
            'email' => 'required|email',
            'specialite' => 'required|string|max:255',
            'medecin' => 'required|string|max:255',
            'motif' => 'required|string',
        ]);


        $medecin = User::where('name', $request->medecin)
            ->where('role', 'medecin')
            ->first();

        $user = auth()->user();

        $appointment = Appointment::create([
            'appointment_number' => uniqid('RDV-'),
            'name' => $request->nom . ' ' . $request->prenom,
            'mobile_number' => $request->telephone,
            'email' => $request->email,
            'appointment_date' => $request->date,
            'appointment_time' => $request->heure,
            'specialization' => $request->specialite,
            'doctor_id' => $medecin?->id,
            'user_id' => $user?->id,
            'doctor_specialization' => $medecin?->specialization,
            'consultancy_fees' => $medecin?->consultancy_fees ?? 0,
            'message' => $request->motif,
            'apply_date' => now()->toDateString(),
            'posting_date' => now(),
            'user_status' => 1,
            'doctor_status' => 1,
            'status' => 'En attente',
        ]);

        // Envoi du mail si tout est OK
        if ($appointment && $medecin && $medecin->email) {
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = env('MAIL_HOST');
                $mail->SMTPAuth = true;
                $mail->Username = env('MAIL_USERNAME');
                $mail->Password = env('MAIL_PASSWORD');
                $mail->SMTPSecure = env('MAIL_ENCRYPTION', PHPMailer::ENCRYPTION_STARTTLS);
                $mail->Port = env('MAIL_PORT', 587);
                $mail->CharSet = 'UTF-8';


                $mail->setFrom(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME', 'Clinique Espoir Santé'));
                $mail->addAddress(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME', 'Clinique Espoir Santé'));
                $mail->addCC($medecin->email, $medecin->FullName);

                $mail->isHTML(true);
                $mail->Subject = 'Nouveau rendez-vous à approuver';
                $mail->Body = '
                <!DOCTYPE html>
                <html lang="fr">
                <head>
                    <meta charset="UTF-8" />
                    <title>Demande de rendez-vous</title>
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
                        <h1 class="email-title">Demande de Rendez-vous Médical</h1>
                    </div>
                    <div class="email-body">
                        <p>Bonjour Dr. ' . htmlspecialchars($medecin->name) . ',</p>
                        <p>Un nouveau rendez-vous a été demandé par un patient. Voici les informations nécessaires :</p>
                        <ul>
                            <li><strong>Nom :</strong> ' . htmlspecialchars($appointment->name) . '</li>
                            <li><strong>Email :</strong> ' . htmlspecialchars($appointment->email) . '</li>
                            <li><strong>Téléphone :</strong> ' . htmlspecialchars($appointment->mobile_number) . '</li>
                            <li><strong>Motif de la consultation :</strong> ' . nl2br(htmlspecialchars($appointment->message)) . '</li>
                            <li><strong>Spécialité demandée :</strong> ' . htmlspecialchars($appointment->specialization) . '</li>
                            <li><strong>Date souhaitée :</strong> ' . htmlspecialchars($appointment->appointment_date) . ' à ' . htmlspecialchars($appointment->appointment_time) . '</li>
                        </ul>
                        <p>Merci de vous connecter à votre espace pour confirmer ou refuser ce rendez-vous.</p>
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
                // Log::error($mail->ErrorInfo); // à activer si tu veux traquer les erreurs d'envoi
            }
        }

        return $appointment
            ? redirect()->route('prise_rdv')->with('success', true)
            : redirect()->route('prise_rdv')->with('error', true);
    }





    public function blog_details()
    {
        return view('blog_details');
    }
    public function chat()
    {
        return view('chat');
    }
    public function product_details()
    {
        return view('product_details');
    }
    public function checkout_page()
    {
        return view('checkout_page');
    }
    public function recents_posts()
    {
        return view('recents_posts');
    }
    public function visio_consulting()
    {
        return view('visio_consulting');
    }
    // public function discussions()
    // {
    //     return view('discussions');
    // }
}
