<?php /** @noinspection ALL */

namespace App\Http\Controllers;

use App\Http\Requests\TagsStoreRequest;
use App\Models\Tags;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function index()
    {
        return Tags::paginate(10);
    }

    public function store(TagsStoreRequest $request)
    {
        Product::create($request->validated());

        return response()->json([
            'message' => 'Tags created successfully.'
        ], 201);
    }

    public function show(Tags $tags)
    {
        return $tags;
    }

    public function update(Tags $tags, TagsStoreRequest $request)
    {
        $tags->update($request->all());

        return response()->json([
            'message' => 'tags updated successfully.'
        ]);
    }

    public function destroy(tags $tags)
    {
        $tags->delete();

        return response()->noContent(204);
    }
}
