<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductManager extends Component
{
    public $editProduct;
    public $name;
    public $description;
    public $price;
    public $in_stock;

   protected $listeners = ['createProductForm', 'editProductForm'];

    public function createProductForm()
    {
        $this->setForm();

        $this->dispatchBrowserEvent('openProductModal');
    }

    public function editProductForm($id)
    {
        $product = Product::findOrFail($id);

        $this->setForm($product);

        $this->dispatchBrowserEvent('openProductModal');
    }

    private function setForm($product = null)
    {
        $this->editProduct = $product ? $product->id : null;
        $this->name = $product ? $product->name : null;
        $this->description = $product ? $product->description : null;
        $this->price = $product ? $product->price : null;
        $this->in_stock = $product ? $product->in_stock : null;
    }

    public function manage()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:300',
            'price' => 'required|numeric',
            'in_stock' => 'required|numeric',
        ]);

        $fields = [
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'in_stock' => $this->in_stock
        ];

        if ($this->editProduct) {
            $product = Product::findOrFail($this->editProduct);
            $product->update($fields);
            $message = 'Product modifié avec succès';

        } else {
            Product::create($fields);
            $message = 'Product ajouté avec succès';
        }

        $this->dispatchBrowserEvent('manageSuccess', [
            'message' => $message
        ]);

        $this->name = null;
        $this->description = null;
        $this->price = null;
        $this->in_stock = null;

        $this->emit('reloadProductList');
    }

    public function render()
    {
        return view('livewire.product-manager');
    }
}
