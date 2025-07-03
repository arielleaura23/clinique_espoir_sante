<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../../vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'cliniqueespoirsante2@gmail.com';
    $mail->Password   = 'bvpr wxjl ywvc meys';
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    // Recipients
    $mail->setFrom('cliniqueespoirsante2@gmail.com', 'Clinique Espoir Sante');  // Sender
    $mail->addAddress('destinataire@gmail.com', 'Destinataire');   // Recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Test - Clinique Espoir Sante';
    $mail->Body    = '<h1>Bonjour !</h1><p>Ceci est un test envoyé depuis PHPMailer.</p>';
    $mail->AltBody = 'Ceci est un test envoyé depuis PHPMailer.';

    $mail->send();
    echo '✅ Mail envoyé avec succès';
} catch (Exception $e) {
    echo "❌ Échec de l'envoi : {$mail->ErrorInfo}";
}
