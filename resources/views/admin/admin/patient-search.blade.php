@extends('doctor.layouts.app')

@section('title', 'Admin | View Patients')

@section('content')
<div class="main-content">
    <div class="wrap-content container" id="container">
        <section id="page-title">
            <div class="row">
                <div class="col-sm-8">
                    <h1 class="mainTitle">Admin | View Patients</h1>
                </div>
                <ol class="breadcrumb">
                    <li><span>Admin</span></li>
                    <li class="active"><span>View Patients</span></li>
                </ol>
            </div>
        </section>

        <div class="container-fluid container-fullw bg-white">
            <div class="row">
                <div class="col-md-12">

                    {{-- Formulaire de recherche --}}
                    <form method="GET" action="{{ route('admin.patient.search') }}">
                        <div class="form-group">
                            <label>Search by Name / Email / Phone</label>
                            <input type="text" name="search" class="form-control" placeholder="Search..."
                                value="{{ request('search') }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Search</button>
                        <a href="{{ route('admin.patient.search') }}" class="btn btn-secondary">Reset</a>
                    </form>

                    @if (request('search'))
                        <h4 class="text-center mt-3">Results for "<strong>{{ request('search') }}</strong>"</h4>
                    @endif

                    <hr>

                    {{-- Résultats --}}
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="center">#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Gender</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($patients as $index => $patient)
                                <tr>
                                    <td>{{ $patients->firstItem() + $index }}</td>
                                    <td>{{ $patient->name }}</td>
                                    <td>{{ $patient->email }}</td>
                                    <td>{{ $patient->phone }}</td>
                                    <td>{{ ucfirst($patient->gender) }}</td>
                                    <td>{{ $patient->created_at->format('d/m/Y H:i') }}</td>
                                    <td>{{ $patient->updated_at ? $patient->updated_at->format('d/m/Y H:i') : '—' }}</td>
                                    <td>
                                        <a href="{{ route('admin.patient.view', $patient->id) }}" class="btn btn-xs btn-primary" target="_blank">View</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">No patients found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{-- Pagination --}}
                    <div class="text-center">
                        {{ $patients->appends(['search' => request('search')])->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
