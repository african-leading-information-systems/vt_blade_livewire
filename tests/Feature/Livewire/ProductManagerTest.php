<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\ProductManager;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Livewire\Livewire;
use Tests\TestCase;

class ProductManagerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(ProductManager::class);

        $component->assertStatus(200);
    }

    /** @test */
    public function creation_data_is_available()
    {
        Livewire::test(ProductManager::class)
                    ->call('createProductForm')
                    ->assertSet('editProduct', null)
                    ->assertSet('name', null)
                    ->assertSet('price', null)
                    ->assertSet('description', null)
                    ->assertSet('in_stock', null)
                    ->assertDispatchedBrowserEvent('openProductModal');
    }

    /** @test */
    public function form_is_valid()
    {
        Livewire::test(ProductManager::class)
                ->set('name')
                ->set('description')
                ->set('price')
                ->set('in_stock')
                ->call('manage')
                ->assertHasErrors(['name' => 'required', 'description' => 'required', 'price' => 'required', 'in_stock' => 'required']);

        Livewire::test(ProductManager::class)
            ->set('name', Str::random(256))
            ->set('description', Str::random(301))
            ->set('price', Str::random(23))
            ->set('in_stock', Str::random(23))
            ->call('manage')
            ->assertHasErrors(['name' => ['max'], 'description' => ['max'], 'price' => ['numeric'], 'in_stock' => ['numeric']]);
    }

    /** @test */
    public function can_create_product()
    {
        Livewire::test(ProductManager::class)
                ->set('name', ($name = 'Alicia Tomate'))
                ->set('description', ($description = 'La tomate de toujours'))
                ->set('price', ($price = 1500))
                ->set('in_stock', ($in_stock = 10))
                ->call('manage')
                ->assertDispatchedBrowserEvent('manageSuccess')
                ->assertSet('name', null)
                ->assertSet('description', null)
                ->assertSet('price', null)
                ->assertSet('in_stock', null)
                ->assertEmitted('reloadProductList');

        $product = Product::first();

        $this->assertEquals($product->name, $name);
        $this->assertEquals($product->description, $description);
        $this->assertEquals($product->price, $price);
        $this->assertEquals($product->in_stock, $in_stock);
    }

    /** @test */
    public function edit_data_is_available()
    {
        $product = Product::factory()->create();

        Livewire::test(ProductManager::class)
            ->call('editProductForm', $product->id)
            ->assertSet('editProduct', $product->id)
            ->assertSet('name', $product->name)
            ->assertSet('price', $product->price)
            ->assertSet('description', $product->description)
            ->assertSet('in_stock', $product->in_stock)
            ->assertDispatchedBrowserEvent('openProductModal');
    }


    /** @test */
    public function can_edit_product()
    {
        $product = Product::factory()->create();

        Livewire::test(ProductManager::class)
            ->call('editProductForm', $product->id)
            ->set('name', ($name = 'Alicia Tomate'))
            ->set('description', ($description = 'La tomate de toujours'))
            ->set('price', ($price = 1500))
            ->set('in_stock', ($in_stock = 10))
            ->call('manage')
            ->assertDispatchedBrowserEvent('manageSuccess')
            ->assertEmitted('reloadProductList');

        $product = Product::first();

        $this->assertEquals($product->name, $name);
        $this->assertEquals($product->description, $description);
        $this->assertEquals($product->price, $price);
        $this->assertEquals($product->in_stock, $in_stock);
    }

}
