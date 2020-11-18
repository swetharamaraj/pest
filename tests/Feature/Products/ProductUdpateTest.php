<?php
namespace Database\Factories;

use App\Models\User;
use App\Models\Product;
use function Pest\Faker\faker;
use function Pest\Laravel\{get, getJson, postJson, patchJson, delete};

beforeEach(function () {

    $this->productData =   [
      'name' => faker()->name(10),
      'description' => faker()->text('100'),
      'price' => faker()->numberBetween(100, 100000),
      'is_active' => faker()->numberBetween(0, 1)
  ];
    $this->postJson('api/products', $this->productData)
    ->assertStatus(201);
   });
  

it('products_update_with_payload', function(){
    $product =   [
        'name' => faker()->name(10),
        'description' => faker()->text('100'),
        'price' => faker()->numberBetween(100, 100000),
        'is_active' => faker()->numberBetween(0, 1)
    ];
    $productId = Product::where('name', $this->productData['name'])->value('id');
        $this->patchJson('api/products/' .$productId, $product)
        ->assertStatus(200);
        $this->assertDatabaseHas('products', ['name' => $product['name']]);
})->group('api','products','update');


it('products_update_without_payload', function(){
    $productId = Product::where('name', $this->productData['name'])->value('id');
    $this->patchJson('api/products/' .$productId)
    ->assertStatus(422);
})->group('api','products','update');


it('products_update_without_product_id', function(){
    $this->patchJson('api/products/0')
    ->assertStatus(404);
})->group('api','products','update');

