@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Mahsulotni tahrirlash</h1>

        <form action="{{ route('products.modify', ['id' => $product->id]) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Mahsulot nomi</label>
                <input type="text" name="name" class="form-control" value="{{ $product->name }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Narxi</label>
                <input type="number" name="price" class="form-control" value="{{ $product->price }}">
            </div>

            <button type="submit" class="btn btn-success">Yangilash</button>
        </form>
    </div>
@endsection