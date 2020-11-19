<?php

use App\Models\User;
use function Pest\Faker\faker;
use function Pest\Laravel\{get, getJson, postJson, patchJson, delete};
use function Tests\actingAs;

// it('redirects to user profile', function () {
//     $user = factory(User::class)->create();

//     actingAs($user)->get('/')->assertSee($user);
// });
// beforeEach(function(){

    
//     $this->user =    [ 'name' => faker()->name(25),
//     'email' => faker()->email(),
//     'password' => 'secret',
//     'is_active' => faker()->numberBetween(0,1)
// ];
// });

// it('has created user', function (){
//     $this->postJson('api/user', $this->user)
//     ->assertStatus(201);
//     $this->assertDatabaseHas('users',$this->user->toArray());
//     $this->assertTrue(User::exists());
// });
