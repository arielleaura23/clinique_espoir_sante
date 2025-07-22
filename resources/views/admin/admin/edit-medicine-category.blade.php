@extends('admin.layouts.app')

@section('title', 'Admin | Edit Medicine Category')

@section('content')
<div class="main-content">
    <div class="wrap-content container" id="container">
        <section id="page-title">
            <div class="row">
                <div class="col-sm-8">
                    <h1 class="mainTitle">Admin | Edit Medicine Category</h1>
                </div>
                <ol class="breadcrumb">
                    <li><span>Admin</span></li>
                    <li class="active"><span>Edit Medicine Category</span></li>
                </ol>
            </div>
        </section>

        <div class="container-fluid container-fullw bg-white">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="panel panel-white">
                        <div class="panel-heading">
                            <h5 class="panel-title">Edit Medicine Category</h5>
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

                            <form method="POST" action="{{ route('medicine.category.update', $category->id) }}">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label>Category Name</label>
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Enter Category Name" required
                                        value="{{ old('name', $category->name) }}">
                                </div>

                                <div class="form-group">
                                    <label>Category Description (Optional)</label>
                                    <textarea name="description" class="form-control"
                                        placeholder="Enter Category Description">{{ old('description', $category->description) }}</textarea>
                                </div>

                                <button type="submit" class="btn btn-o btn-primary">Update</button>
                                <a href="{{ route('medicine.category.manage') }}" class="btn btn-o btn-default">Back</a>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
