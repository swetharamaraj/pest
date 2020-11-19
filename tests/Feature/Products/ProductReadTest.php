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

it('products show', function() {
    $productId = Product::where('name', $this->productData['name'])->value('id');
    $this->getJson('api/products/' .$productId)
    ->assertStatus(200);
 
 
})->group('api', 'products', 'read');
    
it('assert Product Count', function(){
    $expectedData = 1;
    $this->assertCount($expectedData,['products'], "doesn't match");
});

it('products show without valid param', function(){
    $this->getJson('api/products/s')
    ->assertStatus(404);
})->group('api', 'products', 'read');






