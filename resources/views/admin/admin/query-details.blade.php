@extends('admin.layouts.app')

@section('title', 'Admin | Query Details')

@section('content')
    <div class="main-content">
        <div class="wrap-content container" id="container">
            <section id="page-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h1 class="mainTitle">Admin | Query Details</h1>
                    </div>
                    <ol class="breadcrumb">
                        <li><span>Admin</span></li>
                        <li class="active"><span>Query Details</span></li>
                    </ol>
                </div>
            </section>
            <div class="container-fluid container-fullw bg-white">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="over-title margin-bottom-15">Manage <span class="text-bold">Query Details</span></h5>
                        <hr />
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th>Full Name</th>
                                    <td>{{ $query->fullname }}</td>
                                </tr>
                                <tr>
                                    <th>Email Id</th>
                                    <td>{{ $query->email }}</td>
                                </tr>
                                <tr>
                                    <th>Contact Number</th>
                                    <td>{{ $query->contactno }}</td>
                                </tr>
                                <tr>
                                    <th>Message</th>
                                    <td>{{ $query->message }}</td>
                                </tr>
                                <tr>
                                    <th>Query Date</th>
                                    <td>{{ $query->PostingDate ? \Carbon\Carbon::parse($query->PostingDate)->format('d/m/Y H:i') : '' }}
                                    </td>
                                </tr>
                                @if (empty($query->AdminRemark))
                                    <tr>
                                        <th>Admin Remark</th>
                                        <td>
                                            <form method="POST" action="{{ route('admin.queries.update', $query->id) }}">
                                                @csrf
                                                @method('PUT')
                                                <textarea name="AdminRemark" class="form-control" required></textarea>
                                                <button type="submit" class="btn btn-primary pull-left"
                                                    style="margin-top:10px;">
                                                    Update <i class="fa fa-arrow-circle-right"></i>
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                @else
                                    <tr>
                                        <th>Admin Remark</th>
                                        <td>{{ $query->AdminRemark }}</td>
                                    </tr>
                                    <tr>
                                        <th>Last Updation Date</th>
                                        <td>{{ $query->LastupdationDate ? \Carbon\Carbon::parse($query->LastupdationDate)->format('d/m/Y H:i') : '' }}
                                        </td>
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
