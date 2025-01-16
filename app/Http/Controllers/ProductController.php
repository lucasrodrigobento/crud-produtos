<?php

namespace App\Http\Controllers;

use App\DTO\ProductDTO;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string',
            'preco' => 'required|numeric|min:0',
            'status' => 'required|string|in:Ativo,Inativo',
        ]);

        $productDTO = ProductDTO::fromArray($validated);

        $product = Product::create($productDTO->toArray());

        return response()->json(['message' => 'Produto criado com sucesso!', 'product' => $product], 201);
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'nome' => 'sometimes|string|max:255',
            'descricao' => 'sometimes|string',
            'preco' => 'sometimes|numeric|min:0',
            'status' => 'sometimes|string|in:Ativo,Inativo',
        ]);

        $productDTO = ProductDTO::fromArray(array_merge($product->toArray(), $validated));

        $product->update($productDTO->toArray());

        return response()->json(['message' => 'Produto atualizado com sucesso!', 'product' => $product]);
    }
}
