@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Mahsulotlar ro‘yxati</h1>
        <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Mahsulot qo‘shish</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nomi</th>
                    <th>Narxi</th>
                    <th>Amallar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Tahrirlash</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">O‘chirish</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection