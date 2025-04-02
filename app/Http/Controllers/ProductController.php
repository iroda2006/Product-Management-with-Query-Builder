<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    // Mahsulot qo‘shish formasi
    public function create()
    {
        return view('products.create');
    }

    // Mahsulotni saqlash (store)
    public function store(Request $request)
    {
        DB::table('products')->insert([
            'name' => $request->name,
            'price' => $request->price,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('products.index')->with('success', 'Mahsulot muvaffaqiyatli qo‘shildi!');
    }
    public function index()
{
    $products = DB::table('products')->get(); // Barcha mahsulotlarni olish
    return view('products.index', compact('products')); // `index.blade.php`ga yuborish
}
public function edit($id)
{
    $product = DB::table('products')->where('id', $id)->first(); // Mahsulotni olish

    if (!$product) {
        return redirect()->route('products.index')->with('error', 'Mahsulot topilmadi!');
    }

    return view('products.edit', compact('product')); // `edit.blade.php` viewga yuborish
}
public function modifyProduct(Request $request, $id)
{
    DB::table('products')->where('id', $id)->update([
        'name' => $request->name,
        'price' => $request->price,
        'updated_at' => now(),
    ]);

    return redirect()->route('products.index')->with('success', 'Mahsulot muvaffaqiyatli yangilandi!');
}
public function destroy($id)
{
    DB::table('products')->where('id', $id)->delete();

    return redirect()->route('products.index')->with('success', 'Mahsulot muvaffaqiyatli o‘chirildi!');
}

}