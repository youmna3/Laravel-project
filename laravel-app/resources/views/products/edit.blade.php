@extends('layouts.app')
@section('content')
    <h2>Edit Product</h2>
    <form method="POST" action="{{ url('products/' . $product->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="name" value="{{ old('name', $product->name) }}"
                placeholder="Product's Name">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3">{{ old('description', $product->description) }}</textarea>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input name="price" type="number" class="form-control" value="{{ old('price', $product->price) }}">
            @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success ">Edit Product</button>
            <a href="{{ route('products.index') }}" class="btn btn-primary float-right">Go Back</a>
        </div>
    </form>
@endsection
