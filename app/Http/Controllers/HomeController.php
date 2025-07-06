<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Medecin;
use App\Models\DoctorSpecilization;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


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
        $medecins = Medecin::orderBy('FullName')->get();
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
            'specialite' => 'required|string|max:255',
            'medecin' => 'required|string|max:255',
            'motif' => 'required|string',
        ]);

        // Trouver l'id du médecin
        $medecin = Medecin::where('FullName', $request->medecin)->first();

        $appointment = Appointment::create([
            'AppointmentNumber' => uniqid('RDV-'),
            'Name' => $request->nom . ' ' . $request->prenom,
            'MobileNumber' => $request->telephone,
            'Email' => $request->email,
            'AppointmentDate' => $request->date,
            'AppointmentTime' => $request->heure,
            'Specialization' => $request->specialite,
            'doctor_id' => $medecin ? $medecin->id : null,
            'user_id' => auth()->check() ? auth()->id() : null,

            'Message' => $request->motif,
            'ApplyDate' => now()->toDateString(),
            'Remark' => null,
            'Status' => 'En attente',

            // Champs supplémentaires pour l'affichage admin :
            'doctorSpecialization' => $medecin ? $medecin->Specialization : null,
            'consultancyFees' => $medecin->consultancy_fees ?? 0,
            'postingDate' => now(),
            'userStatus' => 1,
            'doctorStatus' => 1,
        ]);


        // Envoi du mail (si médecin trouvé et email présent)
        if ($appointment && $medecin && $medecin->Email) {
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = env('MAIL_HOST');
                $mail->SMTPAuth = true;
                $mail->Username = env('MAIL_USERNAME');
                $mail->Password = env('MAIL_PASSWORD');
                $mail->SMTPSecure = env('MAIL_ENCRYPTION', PHPMailer::ENCRYPTION_STARTTLS);
                $mail->Port = env('MAIL_PORT', 587);

                $mail->setFrom(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME', 'Clinique Espoir Santé'));
                $mail->addAddress(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME', 'Clinique Espoir Santé'));
                $mail->addCC($medecin->Email, $medecin->FullName);

                $mail->isHTML(true);
                $mail->Subject = 'Nouveau rendez-vous à approuver';
                $mail->Body = '
<div style="font-family: Arial; color: #333; padding: 20px; margin: 0 auto; max-width: 600px; border: 1px solid #ccc; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); background-color: #fff;">
    <div style="text-align: center; margin-bottom: 20px;">
        <img src="https://ik.imagekit.io/6behazkytv/logo%20ligne%20fond%20bleu.png?updatedAt=1751769593981" alt="Clinique Espoir Santé" style="max-width: 200px;">
    </div>

    <p>Bonjour Dr. ' . htmlspecialchars($medecin->FullName) . ',</p>
    <p>Un nouveau rendez-vous a été pris par un patient.</p>
    <ul>
        <li><strong>Nom du patient :</strong> ' . htmlspecialchars($appointment->Name) . '</li>
        <li><strong>Date :</strong> ' . htmlspecialchars($appointment->AppointmentDate) . '</li>
        <li><strong>Heure :</strong> ' . htmlspecialchars($appointment->AppointmentTime) . '</li>
        <li><strong>Motif :</strong> ' . nl2br(htmlspecialchars($appointment->Message)) . '</li>
    </ul>

    <p>Merci de vous connecter à votre espace pour valider ce rendez-vous.</p>

    <p style="margin-top: 30px;">
        Cordialement,<br>
        <strong>Clinique Espoir Santé</strong>
    </p>
</div>';

                $mail->send();
            } catch (Exception $e) {
                // Log::error($mail->ErrorInfo);
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
    public function discussions()
    {
        return view('discussions');
    }
}
