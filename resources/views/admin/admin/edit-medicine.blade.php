@extends('admin.layouts.app')

@section('title', 'Admin | Edit Medicine')

@section('content')
    <div class="main-content">
        <div class="wrap-content container" id="container">
            <section id="page-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h1 class="mainTitle">Admin | Edit Medicine</h1>
                    </div>
                    <ol class="breadcrumb">
                        <li><span>Admin</span></li>
                        <li class="active"><span>Edit Medicine</span></li>
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
                                        <h5 class="panel-title">Edit Medicine</h5>
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

                                        <form method="POST" action="{{ route('medicine.update', $medicine->id) }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')

                                            <div class="form-group">
                                                <label for="name">Medicine Name</label>
                                                <input type="text" name="name" class="form-control" required
                                                    value="{{ old('name', $medicine->name) }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="description">Medicine Description</label>
                                                <textarea name="description" class="form-control" required>{{ old('description', $medicine->description) }}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="quantity">Quantity</label>
                                                <input type="number" name="quantity" class="form-control" min="0"
                                                    required value="{{ old('quantity', $medicine->quantity) }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="price">Price (FCFA)</label>
                                                <input type="number" step="0.01" name="price" class="form-control"
                                                    min="0" required value="{{ old('price', $medicine->price) }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="dosage">Dosage</label>
                                                <input type="text" name="dosage" class="form-control"
                                                    value="{{ old('dosage', $medicine->dosage) }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="form">Form</label>
                                                <input type="text" name="form" class="form-control"
                                                    value="{{ old('form', $medicine->form) }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="expiration_date">Expiration Date</label>
                                                <input type="date" name="expiration_date" class="form-control"
                                                    value="{{ old('expiration_date', $medicine->expiration_date) }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="manufacturer">Manufacturer</label>
                                                <input type="text" name="manufacturer" class="form-control"
                                                    value="{{ old('manufacturer', $medicine->manufacturer) }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="instructions">Instructions</label>
                                                <textarea name="instructions" class="form-control">{{ old('instructions', $medicine->instructions) }}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="medicine_category_id">Medicine Category</label>
                                                <select name="medicine_category_id" class="form-control">
                                                    <option value="">Select a category</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}"
                                                            {{ old('medicine_category_id', $medicine->medicine_category_id) == $category->id ? 'selected' : '' }}>
                                                            {{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                            </div>

                                            <div class="form-group">
                                                <label>Current Medicine Image</label><br>
                                                @if ($medicine->image)
                                                    <img src="{{ asset('storage/' . $medicine->image) }}"
                                                        alt="Current Image"
                                                        style="max-width: 150px; height: auto; margin-bottom: 10px;">
                                                @else
                                                    <p>No image uploaded.</p>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label for="image">Change Medicine Image (optional)</label>
                                                <input type="file" name="image" class="form-control" accept="image/*">
                                            </div>


                                            <button type="submit" class="btn btn-o btn-primary">Update</button>
                                            <a href="{{ route('medicine.manage') }}" class="btn btn-o btn-default">Back</a>
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
