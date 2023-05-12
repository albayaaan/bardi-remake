<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
// use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('product.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required',
            'product_name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'product_image' => 'required|image|mimes:jpg,png,jpeg,svg|max:2048'
        ]);

        $destinationPath = public_path('/images');
        $image = $request->file('product_image');
        $fileName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
        $fullFileName = $fileName . "-" . time() . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $fullFileName);

        $validated['product_image'] = $fullFileName;
        Product::create($validated);
        return redirect(route('product.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('product.edit', ['product' => $product, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'category_id' => 'required',
            'product_name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'product_image' => 'image|mimes:jpg,png,jpeg,svg|max:2048'
        ]);
        File::delete(public_path('images/' . $product->product_image));

        if (isset($validated['product_image'])) {
            $destinationPath = public_path('/images');
            $image = $request->file('product_image');
            $fileName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $fullFileName = $fileName . "-" . time() . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $fullFileName);

            $validated['product_image'] = $fullFileName;
        }
        $product->update($validated);
        return redirect(route('product.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        File::delete(public_path('images/' . $product->product_image));
        $product->delete();
        return redirect()->back();
    }
}
