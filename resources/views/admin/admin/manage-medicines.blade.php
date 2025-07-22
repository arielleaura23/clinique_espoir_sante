@extends('admin.layouts.app')

@section('title', 'Admin | Manage Medicines')

@section('content')
<div class="main-content">
    <div class="wrap-content container" id="container">
        <section id="page-title">
            <div class="row">
                <div class="col-sm-8">
                    <h1 class="mainTitle">Admin | Manage Medicines</h1>
                </div>
                <ol class="breadcrumb">
                    <li><span>Admin</span></li>
                    <li class="active"><span>Manage Medicines</span></li>
                </ol>
            </div>
        </section>

        <div class="container-fluid container-fullw bg-white">
            <div class="row">
                <div class="col-md-12">
                    <h5 class="over-title margin-bottom-15">Manage <span class="text-bold">Medicines</span></h5>

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <table class="table table-hover" id="sample-table-1">
                        <thead>
                            <tr>
                                <th class="center">#</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Image</th>
                                <th>Dosage</th>
                                <th>Expiration Date</th>
                                <th>Form</th>
                                <th>Manufacturer</th>
                                <th>Instructions</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($medicines as $index => $medicine)
                                <tr>
                                    <td class="center">{{ $index + 1 }}</td>
                                    <td>{{ $medicine->name }}</td>
                                    <td>{{ $medicine->description }}</td>
                                    <td>{{ $medicine->price }}</td>
                                    <td>{{ $medicine->quantity }}</td>
                                    <td>
                                        @if($medicine->image)
                                            <img src="{{ asset('storage/' . $medicine->image) }}" alt="Image" width="50">
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>{{ $medicine->dosage }}</td>
                                    <td>{{ \Carbon\Carbon::parse($medicine->expiration_date)->format('d/m/Y') }}</td>
                                    <td>{{ $medicine->form }}</td>
                                    <td>{{ $medicine->manufacturer }}</td>
                                    <td>{{ $medicine->instructions }}</td>
                                    <td>{{ \Carbon\Carbon::parse($medicine->created_at)->format('d/m/Y H:i') }}</td>
                                    <td>
                                        <a href="{{ route('medicine.edit', $medicine->id) }}" class="btn btn-xs btn-primary">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <form action="{{ route('medicine.delete', $medicine->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-xs btn-danger">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="13" class="text-center">No medicines found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
