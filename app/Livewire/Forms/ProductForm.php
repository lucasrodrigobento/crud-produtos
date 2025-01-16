<?php

namespace App\Livewire\Forms;

use Livewire\Component;
use App\DTO\ProductDTO;
use App\Models\Product;

class ProductForm extends Component
{
    public $nome;
    public $descricao;
    public $preco;
    public $status = 'Ativo';

    public function mount(?Product $product = null)
    {
        if ($product) {
            $dto = ProductDTO::fromArray($product->toArray());
            $this->nome = $dto->nome;
            $this->descricao = $dto->descricao;
            $this->preco = $dto->preco;
            $this->status = $dto->status;
        }
    }

    public function submit()
    {
        $validated = $this->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string',
            'preco' => 'required|numeric|min:0',
            'status' => 'required|string|in:Ativo,Inativo',
        ]);

        $dto = ProductDTO::fromArray($validated);

        if (isset($dto->id)) {
            $product = Product::find($dto->id);
            $product->update($dto->toArray());
        } else {
            Product::create($dto->toArray());
        }

        session()->flash('success', 'Produto salvo com sucesso!');
        $this->reset(['nome', 'descricao', 'preco', 'status']);
    }
}
