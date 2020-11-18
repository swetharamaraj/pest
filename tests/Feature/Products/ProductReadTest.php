<?php
namespace Database\Factories;

use App\Models\User;
use App\Models\Product;
use function Pest\Faker\faker;
use function Pest\Laravel\{get, getJson, postJson, patchJson, delete};



it('products show', function() {
    $this->getJson('api/products/6')
    ->assertStatus(200);
   
})->group('api', 'products', 'read');
    

it('products show without valid param', function(){
    $this->getJson('api/products/s')
    ->assertStatus(404);
})->group('api', 'products', 'read');






