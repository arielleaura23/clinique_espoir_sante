@extends('admin.layouts.app')

@section('title', 'Admin | Manage Doctors')

@section('content')
<div class="main-content">
    <div class="wrap-content container" id="container">
        <section id="page-title">
            <div class="row">
                <div class="col-sm-8">
                    <h1 class="mainTitle">Admin | Manage Doctors</h1>
                </div>
                <ol class="breadcrumb">
                    <li><span>Admin</span></li>
                    <li class="active"><span>Manage Doctors</span></li>
                </ol>
            </div>
        </section>
        <div class="container-fluid container-fullw bg-white">
            <div class="row">
                <div class="col-md-12">
                    <h5 class="over-title margin-bottom-15">Manage <span class="text-bold">Doctors</span></h5>
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <table class="table table-hover" id="sample-table-1">
                        <thead>
                            <tr>
                                <th class="center">#</th>
                                <th>Specialization</th>
                                <th class="hidden-xs">Doctor Name</th>
                                <th>Creation Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($doctors as $index => $doctor)
                                <tr>
                                    <td class="center">{{ $index + 1 }}</td>
                                    <td class="hidden-xs">{{ $doctor->Specialization }}</td>
                                    <td>{{ $doctor->FullName }}</td>
                                    <td>{{ $doctor->CreationDate ? \Carbon\Carbon::parse($doctor->CreationDate)->format('d/m/Y H:i') : '' }}</td>
                                    <td>
                                        <div class="visible-md visible-lg hidden-sm hidden-xs">
                                            <a href="{{ route('admin.doctor.edit', $doctor->id) }}" class="btn btn-transparent btn-xs" title="Edit">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <form action="{{ route('admin.doctor.delete', $doctor->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-transparent btn-xs" title="Remove">
                                                    <i class="fa fa-times fa fa-white"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            @if($doctors->isEmpty())
                                <tr>
                                    <td colspan="5" class="text-center">No doctors found.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection