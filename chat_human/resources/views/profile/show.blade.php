@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">Profil de {{ $user->name }}</h2>

    <div class="bg-white rounded shadow p-4">
        <p><strong>Email:</strong> {{ $user->email }}</p>
        {{-- Ajoute d'autres infos si tu veux --}}
    </div>
</div>
@endsection
