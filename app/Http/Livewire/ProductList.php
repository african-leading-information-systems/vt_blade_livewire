<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductList extends Component
{
    public $search;

    protected $listeners = ['reloadProductList'];

    public function reloadProductList()
    {
        $this->reset();
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        $this->dispatchBrowserEvent('manageSuccess', [
            'message' => 'Product supprimé avec succès'
        ]);
    }

    public function render()
    {
        $products = Product::query();

        if ($this->search) {
            $products->where('name', 'like', '%'.$this->search.'%')
                    ->orWhere('description','like', '%'.$this->search.'%')
                    ->orWhere('price','like', '%'.$this->search.'%')
                    ->orWhere('in_stock','like', '%'.$this->search.'%');
        }

        return view('livewire.product-list', [
            'products' => $products->paginate(10)
        ]);
    }
}
