@extends('layouts.app')
@section('content')
    <h2>List Of Products</h2>
    <a class="btn btn-success" href="{{ route('products.create') }}">Add</a>
    <table class="table table-striped-columns">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Status</th>
                <th colspan="3">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($products as $product)
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>${{ $product->price }}</td>
                    <td>{{ $product->status }}</td>
                    <td><a href="{{ url('products/' . $product['id'] . '/edit') }}" class="btn btn-success">EDIT</a>
                    <td>
                        <form action="{{ url('products/' . $product->id) }} " method="POST">
                            @method('DELETE')
                            @csrf
                            <button onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
