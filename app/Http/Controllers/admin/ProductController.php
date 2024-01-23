<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductOption;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function edit($id)
    {
        $product = Product::with('options', 'subcategory')->findOrFail($id);
        $subcategories = Subcategory::all(); // You might want to pass categories if needed
        $user = auth()->user();
        return view('admin.products.edit-products', compact('user', 'product', 'subcategories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            // Add validation rules here as needed
            'prod_name' => 'required|string',
            'composition' => 'nullable|string',
            'allergenes' => 'nullable|string',
            'SKU' => 'required|string',
            'price' => 'required|numeric',
            'text' => 'nullable|string',
            'imgsrc' => 'nullable|string',
            // 'subcat_id' => 'required|exists:subcategories,subcat_id',
            // Add validation for options if needed
        ]);
    
        $product = Product::findOrFail($id);
        $product->update($request->all());
    
        // Update options (assuming options are being passed in the request)
        $options = $request->input('options', []);
    
        foreach ($options as $option) {
            if (isset($option['id'])) {
                // Update existing option
                $existingOption = ProductOption::findOrFail($option['id']);
                $existingOption->update($option);
            } else {
                // Create new option
                // $product->options()->create($option);
            }
        }
    
        return redirect()->route('admin.products.index')
            ->with('success', 'Product updated successfully');
    }
    public function deleteOption($id)
{
    $option = ProductOption::findOrFail($id);
    $option->delete();

    return response()->json(['message' => 'Option deleted successfully']);
}
}
