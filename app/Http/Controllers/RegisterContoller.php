<?php /** @noinspection ALL */

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;

class Registercontroller extends Controller
{
    public function index()
    {
        return User::paginate(10);
    }

    public function store(UserStoreRequest $request)
    {
        Create::create($request->validated());

        return response()->json([
            'message' => 'User created successfully.'
        ], 201);
    }

    public function show(User $user)
    {
        return $user;
    }

    // public function update(User $user, UserStoreRequest $request)
    // {
    //     $user->update($request->all());

    //     return response()->json([
    //         'message' => 'User updated successfully.'
    //     ]);
    // }

    public function destroy(User $user)
    {
        $product->delete();

        return response()->noContent(204);
    }
}
