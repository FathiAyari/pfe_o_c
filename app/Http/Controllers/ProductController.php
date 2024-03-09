<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Client;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(10);
        $categories=Category::all();
        return view('products',compact('products','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Product::create([
            'name' => $request->name,
            'color' => $request->color,
            'category_id' => $request->category_id,
            'price' => $request->price,
        ]);
        return redirect()->route('product.index')->with("success", "le Produit  a été creé.");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories=Category::all();
        return view('updateProduct',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $data=[
            'name' => $request->name,
            'price' => $request->price,
            'color' => $request->color];
        if($request->category_id!=null){
            $data=['category_id' => $request->category_id];
        }
        $product->update($data);
        return redirect()->route('product.index')->with("update", "le Produit  a été mise à jour.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('product.index')->with("delete", "le Produit  a été supprimé.");
    }
}
