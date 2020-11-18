<?php
namespace Database\Factories;

use Illuminate\Http\Request;

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


it('deletes products', function (){

      $productId = Product::where('name', $this->productData['name'])->value('id');
      $this->delete('api/products/' .$productId)
      ->assertStatus(204);
      $this->assertDatabaseMissing('products', ['name' => $this->productData['name']]);
      $this->assertDeleted('products', ['name' => $this->productData['name']]);

})->group('api','products','delete');



   
