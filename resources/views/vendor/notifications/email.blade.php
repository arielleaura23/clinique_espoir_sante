@component('mail::message')
# Bonjour {{ $user->name ?? '' }},

Vous avez demandé la réinitialisation de votre mot de passe.

@component('mail::button', ['url' => $actionUrl])
Réinitialiser mon mot de passe
@endcomponent

Ce lien expirera dans 60 secondes.

Si vous n'avez pas fait cette demande, vous pouvez ignorer ce message.

Merci,<br>
L’équipe de la Clinique Espoir Santé
@endcomponent
