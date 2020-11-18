<?php
namespace Database\Factories;

use App\Models\User;
use App\Models\Product;
use function Pest\Faker\faker;
use function Pest\Laravel\{get, getJson, postJson, patchJson, delete};


it('products store without payload')
    ->postJson('api/products')
    ->assertStatus(422)
   // ->assertDatabaseMissing('products', $product)
    ->group('api', 'products', 'create');

it('products store with payload', function () {
  
    $productData =   [
        'name' => faker()->name(10),
        'description' => faker()->text('100'),
        'price' => faker()->numberBetween(100, 100000),
        'is_active' => faker()->numberBetween(0, 1)
    ];

    $this->postJson('api/products', $productData)
    ->assertStatus(201);

    $product =  Product::where('name', $productData['name'])->first();
    $this->assertDatabaseHas('products',$productData);
    $this->assertDatabaseHas('products', ['name' => $productData['name']]);
    $this->assertTrue(Product::exists());
})->group('api','products', 'create');

