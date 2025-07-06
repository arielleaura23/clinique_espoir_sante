@extends('admin.layouts.app')

@section('title', 'Admin | Manage Read Queries')

@section('content')
<div class="main-content">
    <div class="wrap-content container" id="container">
        <section id="page-title">
            <div class="row">
                <div class="col-sm-8">
                    <h1 class="mainTitle">Admin | Manage Read Queries</h1>
                </div>
                <ol class="breadcrumb">
                    <li><span>Admin</span></li>
                    <li class="active"><span>Read Queries</span></li>
                </ol>
            </div>
        </section>
        <div class="container-fluid container-fullw bg-white">
            <div class="row">
                <div class="col-md-12">
                    <h5 class="over-title margin-bottom-15">Manage <span class="text-bold">Read Queries</span></h5>
                    <table class="table table-hover" id="sample-table-1">
                        <thead>
                            <tr>
                                <th class="center">#</th>
                                <th>Name</th>
                                <th class="hidden-xs">Email</th>
                                <th>Contact No.</th>
                                <th>Message</th>
                                <th>Query Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($queries as $index => $query)
                                <tr>
                                    <td class="center">{{ $index + 1 }}</td>
                                    <td class="hidden-xs">{{ $query->fullname }}</td>
                                    <td>{{ $query->email }}</td>
                                    <td>{{ $query->contactno }}</td>
                                    <td>{{ $query->message }}</td>
                                    <td>{{ $query->PostingDate ? \Carbon\Carbon::parse($query->PostingDate)->format('d/m/Y H:i') : '' }}</td>
                                    <td>
                                        <a href="{{ route('admin.queries.details', $query->id) }}" class="btn btn-transparent btn-lg" title="View Details">
                                            <i class="fa fa-file"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            @if($queries->isEmpty())
                                <tr>
                                    <td colspan="7" class="text-center">No read queries found.</td>
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