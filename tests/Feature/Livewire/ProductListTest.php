<?php


namespace Tests\Feature\Livewire;


use App\Http\Livewire\ProductList;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class ProductListTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_delete_product()
    {
        $product = Product::factory()->create();

        Livewire::test(ProductList::class)
                ->call('delete', $product->id)
                ->assertDispatchedBrowserEvent('manageSuccess');

        $this->assertEquals(Product::count(), 0);
    }
}
