<form action="{{ route('products.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Mahsulot nomi</label>
        <input type="text" name="name" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Narxi</label>
        <input type="number" name="price" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Saqlash</button>
</form>