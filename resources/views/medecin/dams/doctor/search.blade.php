@extends('medecin.dams.layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">🔍 Rechercher un rendez-vous</h2>

    <form method="POST" action="{{ route('appointments.search') }}">
        @csrf
        <div class="form-group">
            <label for="searchdata">Numéro de rendez-vous / Nom / Téléphone</label>
            <input type="text" name="searchdata" id="searchdata" class="form-control" required placeholder="Ex: RDV123 / Jean / 690000000">
        </div>
        <button type="submit" class="btn btn-primary mt-2">Rechercher</button>
    </form>

    @isset($appointments)
        <h4 class="mt-4">Résultats pour : <strong>"{{ $search }}"</strong></h4>
        @if($appointments->isEmpty())
            <div class="alert alert-warning mt-3">Aucun rendez-vous trouvé.</div>
        @else
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Numéro</th>
                    <th>Nom</th>
                    <th>Téléphone</th>
                    <th>Email</th>
                    <th>Statut</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($appointments as $index => $appointment)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $appointment->AppointmentNumber }}</td>
                    <td>{{ $appointment->Name }}</td>
                    <td>{{ $appointment->MobileNumber }}</td>
                    <td>{{ $appointment->Email }}</td>
                    <td>{{ $appointment->Status ?: 'Non mis à jour' }}</td>
                    <td>
                        <a href="{{ url('/medecin/appointments/' . $appointment->id . '/view') }}" class="btn btn-sm btn-primary">Voir</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    @endisset
</div>
@endsection
