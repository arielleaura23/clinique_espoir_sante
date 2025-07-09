@extends('admin.layouts.app')

@section('title', 'Admin | Edit Doctor')

@section('content')
    <div class="main-content">
        <div class="wrap-content container" id="container">
            <section id="page-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h1 class="mainTitle">Admin | Edit Doctor</h1>
                    </div>
                    <ol class="breadcrumb">
                        <li><span>Admin</span></li>
                        <li class="active"><span>Edit Doctor</span></li>
                    </ol>
                </div>
            </section>
            <div class="container-fluid container-fullw bg-white">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row margin-top-30">
                            <div class="col-lg-8 col-md-12">
                                <div class="panel panel-white">
                                    <div class="panel-heading">
                                        <h5 class="panel-title">Edit Doctor</h5>
                                    </div>
                                    <div class="panel-body">
                                        @if (session('success'))
                                            <div class="alert alert-success">{{ session('success') }}</div>
                                        @endif
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                @foreach ($errors->all() as $error)
                                                    <div>{{ $error }}</div>
                                                @endforeach
                                            </div>
                                        @endif
                                        <form action="{{ route('admin.doctor.update', $medecin->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label for="DoctorSpecialization">Doctor Specialization</label>
                                                <select name="Doctorspecialization" class="form-control" required>
                                                    <option value="">Select Specialization</option>
                                                    @foreach ($specializations as $spec)
                                                        <option value="{{ $spec->specilization }}"
                                                            {{ old('Doctorspecialization', $medecin->specialization) == $spec->specilization ? 'selected' : '' }}>
                                                            {{ $spec->specilization }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="docname">Doctor Name</label>
                                                <input type="text" value="{{ $medecin->name }}" name="docname"
                                                    class="form-control" placeholder="Enter Doctor Name" required
                                                    value="{{ old('docname') }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="clinicaddress">Doctor Clinic Address</label>
                                                <textarea name="clinicaddress"  class="form-control"
                                                    placeholder="Enter Doctor Clinic Address" required>{{ $medecin->address }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="docfees">Doctor Consultancy Fees</label>
                                                <input type="text" name="docfees"
                                                    value="{{ $medecin->consultancy_fees }}" class="form-control"
                                                    placeholder="Enter Doctor Consultancy Fees" required
                                                    value="{{ old('docfees') }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="doccontact">Doctor Contact no</label>
                                                <input type="text" name="doccontact" class="form-control"
                                                    value="{{ $medecin->phone }}" placeholder="Enter Doctor Contact no"
                                                    required value="{{ old('doccontact') }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="docemail">Doctor Email</label>
                                                <input type="email" id="docemail" name="docemail" class="form-control"
                                                    value="{{ $medecin->email }}" placeholder="Enter Doctor Email id"
                                                    required value="{{ old('docemail') }}">
                                                {{-- Pour la vérification AJAX, à implémenter côté JS si besoin --}}
                                                <span id="email-availability-status"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" name="password" class="form-control"
                                                    placeholder="New Password" >
                                            </div>
                                            <div class="form-group">
                                                <label for="password_confirmation">Confirm Password</label>
                                                <input type="password" name="password_confirmation" class="form-control"
                                                    placeholder="Confirm Password" >
                                            </div>
                                            <button type="submit" class="btn btn-o btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
