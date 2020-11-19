<?php
namespace Database\Factories;

use App\Models\User;
use App\Models\Product;
use function Pest\Faker\faker;
use function Pest\Laravel\{get, getJson, postJson, patchJson, delete};

$pr      = new \stdClass();
$pr->data = 0;

beforeAll(function () use ($pr) {
    $pr->data =   [
    'name' => faker()->name(10),
    'description' => faker()->text('100'),
    'price' => faker()->numberBetween(100, 100000),
    'is_active' => faker()->numberBetween(0, 1)
];
});


it('products store with payload', function () use($pr) {
  
    $this->postJson('api/products', $pr->data)
    ->assertStatus(201);

   // $product =  Product::where('name', $pr->data['name'])->first();
    $this->assertDatabaseHas('products',$pr->data);
    $this->assertDatabaseHas('products', ['name' => $pr->data['name']]);
    $this->assertTrue(Product::exists());
})->group('api','products', 'create');



it('products store without payload')
    ->postJson('api/products')
    ->assertStatus(422)
   // ->assertDatabaseMissing('products', $product)
    ->group('api', 'products', 'create');

