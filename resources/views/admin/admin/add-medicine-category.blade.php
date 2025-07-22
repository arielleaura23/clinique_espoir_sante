@extends('admin.layouts.app')

@section('title', 'Admin | Add Medicine Category')

@section('content')
<div class="main-content">
    <div class="wrap-content container" id="container">
        <section id="page-title">
            <div class="row">
                <div class="col-sm-8">
                    <h1 class="mainTitle">Admin | Add Medicine Category</h1>
                </div>
                <ol class="breadcrumb">
                    <li><span>Admin</span></li>
                    <li class="active"><span>Add Medicine Category</span></li>
                </ol>
            </div>
        </section>

        <div class="container-fluid container-fullw bg-white">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="panel panel-white">
                        <div class="panel-heading">
                            <h5 class="panel-title">Medicine Category</h5>
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

                            <form method="POST" action="{{ route('medicine.category.store') }}">
                                @csrf

                                <div class="form-group">
                                    <label>Category Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter Category Name" required value="{{ old('name') }}">
                                </div>

                                <div class="form-group">
                                    <label>Category Description (Optional)</label>
                                    <textarea name="description" class="form-control" placeholder="Enter Category Description">{{ old('description') }}</textarea>
                                </div>

                                <button type="submit" class="btn btn-o btn-primary">Submit</button>
                            </form>

                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12">
                    <div class="panel panel-white">
                        <div class="panel-heading">
                            <h5 class="over-title margin-bottom-15">Manage <span class="text-bold">Medicine Categories</span></h5>
                        </div>
                        <div class="panel-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="center">#</th>
                                        <th>Category Name</th>
                                        <th>Description</th>
                                        <th>Creation Date</th>
                                        <th>Updation Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $index => $category)
                                        <tr>
                                            <td class="center">{{ $index + 1 }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->description }}</td>
                                            <td>{{ $category->created_at ? $category->created_at->format('d/m/Y H:i') : '' }}</td>
                                            <td>{{ $category->updated_at ? $category->updated_at->format('d/m/Y H:i') : '' }}</td>
                                            <td>
                                                <a href="{{ route('medicine.category.edit', $category->id) }}" class="btn btn-transparent btn-xs" title="Edit">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <form action="{{ route('medicine.category.delete', $category->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-transparent btn-xs" title="Remove">
                                                        <i class="fa fa-times fa fa-white"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if($categories->isEmpty())
                                        <tr>
                                            <td colspan="6" class="text-center">No categories found.</td>
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
