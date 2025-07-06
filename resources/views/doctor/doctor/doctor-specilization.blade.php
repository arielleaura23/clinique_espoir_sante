@extends('doctor.layouts.app')

@section('title', 'Admin | Doctor Specialization')

@section('content')
<div class="main-content">
    <div class="wrap-content container" id="container">
        <section id="page-title">
            <div class="row">
                <div class="col-sm-8">
                    <h1 class="mainTitle">Admin | Add Doctor Specialization</h1>
                </div>
                <ol class="breadcrumb">
                    <li><span>Admin</span></li>
                    <li class="active"><span>Add Doctor Specialization</span></li>
                </ol>
            </div>
        </section>
        <div class="container-fluid container-fullw bg-white">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="panel panel-white">
                        <div class="panel-heading">
                            <h5 class="panel-title">Doctor Specialization</h5>
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
                            <form method="POST" action="{{ route('admin.doctor.specialization.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Doctor Specialization</label>
                                    <input type="text" name="doctorspecilization" class="form-control" placeholder="Enter Doctor Specialization" required>
                                </div>
                                <button type="submit" class="btn btn-o btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="panel panel-white">
                        <div class="panel-heading">
                            <h5 class="over-title margin-bottom-15">Manage <span class="text-bold">Doctor Specialization</span></h5>
                        </div>
                        <div class="panel-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="center">#</th>
                                        <th>Specialization</th>
                                        <th>Creation Date</th>
                                        <th>Updation Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($specializations as $index => $spec)
                                        <tr>
                                            <td class="center">{{ $index + 1 }}</td>
                                            <td>{{ $spec->specilization }}</td>
                                            <td>
                                                {{ $spec->creationDate ? \Carbon\Carbon::parse($spec->creationDate)->format('d/m/Y H:i') : '' }}
                                            </td>
                                            <td>
                                                {{ $spec->updationDate ? \Carbon\Carbon::parse($spec->updationDate)->format('d/m/Y H:i') : '' }}
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.doctor.specialization.edit', $spec->id) }}" class="btn btn-transparent btn-xs" title="Edit">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <form action="{{ route('admin.doctor.specialization.delete', $spec->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-transparent btn-xs" title="Remove">
                                                        <i class="fa fa-times fa fa-white"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if($specializations->isEmpty())
                                        <tr>
                                            <td colspan="5" class="text-center">No specialization found.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
