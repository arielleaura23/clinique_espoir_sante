@extends('doctor.layouts.app')

@section('title', 'Admin | Edit Doctor Specialization')

@section('content')
<div class="main-content">
    <div class="wrap-content container" id="container">
        <section id="page-title">
            <div class="row">
                <div class="col-sm-8">
                    <h1 class="mainTitle">Admin | Edit Doctor Specialization</h1>
                </div>
                <ol class="breadcrumb">
                    <li><span>Admin</span></li>
                    <li class="active"><span>Edit Doctor Specialization</span></li>
                </ol>
            </div>
        </section>
        <div class="container-fluid container-fullw bg-white">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="panel panel-white">
                        <div class="panel-heading">
                            <h5 class="panel-title">Edit Doctor Specialization</h5>
                        </div>
                        <div class="panel-body">
                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $error)
                                        <div>{{ $error }}</div>
                                    @endforeach
                                </div>
                            @endif
                            <form method="POST" action="{{ route('admin.doctor.specialization.update', $spec->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="doctorspecilization">Edit Doctor Specialization</label>
                                    <input type="text" name="doctorspecilization" class="form-control" value="{{ old('doctorspecilization', $spec->specilization) }}" required>
                                </div>
                                <button type="submit" class="btn btn-o btn-primary">Update</button>
                                <a href="{{ route('admin.doctor.specialization') }}" class="btn btn-default">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
