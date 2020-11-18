<?php /** @noinspection ALL */

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return Product::paginate(10);
    }

    public function store(ProductStoreRequest $request)
    {
        Product::create($request->validated());

        return response()->json([
            'message' => 'Product created successfully.'
        ], 201);
    }

    public function show(Product $product)
    {
        return $product;
    }

    public function update(Product $product, ProductStoreRequest $request)
    {
        $product->update($request->all());
 
        return response()->json([
            'message' => 'Product updated successfully.'
        ]);
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return response()->noContent(204);
    }
}
