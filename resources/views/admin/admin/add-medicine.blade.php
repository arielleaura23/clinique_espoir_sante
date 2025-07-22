@extends('admin.layouts.app')

@section('title', 'Admin | Add Medicine')

@section('content')
    <div class="main-content">
        <div class="wrap-content container" id="container">
            <section id="page-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h1 class="mainTitle">Admin | Add Medicine</h1>
                    </div>
                    <ol class="breadcrumb">
                        <li><span>Admin</span></li>
                        <li class="active"><span>Add Medicine</span></li>
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
                                        <h5 class="panel-title">Add Medicine</h5>
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

                                        <form method="POST" action="{{ route('medicine.add.store') }}" enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-group">
                                                <label for="name">Medicine Name</label>
                                                <input type="text" name="name" class="form-control" placeholder="Enter Medicine Name" required value="{{ old('name') }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="description">Medicine Description</label>
                                                <textarea name="description" class="form-control" placeholder="Enter Medicine Description" required>{{ old('description') }}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="quantity">Quantity</label>
                                                <input type="number" name="quantity" class="form-control" placeholder="Enter Quantity" required min="0" value="{{ old('quantity') }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="price">Price (FCFA)</label>
                                                <input type="number" step="0.01" name="price" class="form-control" placeholder="Enter Price" required min="0" value="{{ old('price') }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="dosage">Dosage</label>
                                                <input type="text" name="dosage" class="form-control" placeholder="e.g. 500mg, 10ml, etc." value="{{ old('dosage') }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="form">Form</label>
                                                <input type="text" name="form" class="form-control" placeholder="e.g. tablet, syrup, injection, etc." value="{{ old('form') }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="expiration_date">Expiration Date</label>
                                                <input type="date" name="expiration_date" class="form-control" value="{{ old('expiration_date') }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="manufacturer">Manufacturer</label>
                                                <input type="text" name="manufacturer" class="form-control" placeholder="Enter Manufacturer Name" value="{{ old('manufacturer') }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="instructions">Instructions</label>
                                                <textarea name="instructions" class="form-control" placeholder="Dosage instructions, usage, etc.">{{ old('instructions') }}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="medicine_category_id">Medicine Category</label>
                                                <select name="medicine_category_id" class="form-control">
                                                    <option value="">Select a category</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}" {{ old('medicine_category_id') == $category->id ? 'selected' : '' }}>
                                                            {{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="image">Medicine Image</label>
                                                <input type="file" name="image" class="form-control" accept="image/*" required>
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
