<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product.index', ['products' => $products]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('product.create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        // dd('rusak');
        $validated = $request->validate([
            'category_id' => 'required',
            'product_name' => 'required',
            'description' => 'required',
            'price' => 'required|integer',
            'product_image' => 'required|image|mimes:jpg,png,jpeg,svg|max:2048'
        ]);
        dd('rusak');

        if (!$validated) {
            dd('gabisa');
        }
        // Product::create($validated);
        dd($validated);

        $destinationPath = public_path('/images');
        $image = $request->file('image');
        $fileName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
        $fullFileName = $fileName . "-" . time() . $image->getClientOriginalExtension();
        $image->move($destinationPath, $fullFileName);

        $validated['product_image'] = $fullFileName;
        if (!$validated) {
            dd('gabisa');
        }
        // Product::create($validated);
        dd($validated);
    }
}
