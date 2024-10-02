<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('adminpage.pages.product.index', compact('products'));
    }

    public function create()
    {
        return view('adminpage.pages.product.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:active,pending',
        ]);

        $imagePath = $request->file('image')->store('products', 'public');

        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $imagePath,
            'status' => $request->status,
        ]);

        return redirect()->route('manage-product')->with('success', 'Product created successfully!');
    }

    public function show(Product $product)
    {
        return view('adminpage.pages.product.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('adminpage.pages.product.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:active,pending',
        ]);

        $data = [
            'name' => $request->name,
            'price' => $request->price,
            'status' => $request->status,
        ];

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($product->image);
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('manage-product')->with('success', 'Product updated successfully!');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('manage-product')->with('success', 'Product deleted successfully!');
    }

    public function toggleStatus(Product $product)
    {
        $product->status = $product->status === 'active' ? 'pending' : 'active';
        $product->save();

        return redirect()->route('manage-product')->with('success', 'Product status updated successfully!');
    }
}
