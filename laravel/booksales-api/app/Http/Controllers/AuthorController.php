<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();

        if ($authors->isEmpty()) {
            return response()->json([
                "success" => true,
                "message" => "Resources books no found!",
            ], 200);
        }

        return response()->json([
            "success" => true,
            "message" => "Get all resources authors",
            "data" => $authors,
        ], 200);
    }

    public function store(Request $request)
    {
        //validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:40',
            'photo' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'bio' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        //upload image
        $photo = $request->file('photo');
        $photo->store('author', 'public');

        //insert data
        $author = Author::create([
            'name' => $request->name,
            'photo' => $photo->hashName(),
            'bio' => $request->bio
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Resouce author added successfully',
            'data' => $author
        ]);
    }

    public function show(string $id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                'success' => false,
                'message' => 'Resource not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get detail resource',
            'data' => $author
        ], 200);
    }

    public function update(string $id, Request $request)
    {
        $author = Author::find($id);


        if (!$author) {
            return response()->json([
                'success' => false,
                'message' => 'Resource not found'
            ], 404);
        }

        //validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:40',
            'photo' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'bio' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        $data = [
            'name' => $request->name,
            'bio' => $request->bio
        ];

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $image->store('author', 'public');

            if ($author->photo) {
                Storage::disk('public')->delete('author/' . $author->cover_photo);
            }

            $data['cover_photo'] = $image->hashName();
        }

        $author->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Resource update successfully',
            'data' => $author
        ], 200);
    }

    public function destroy(string $id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                'success' => false,
                'message' => 'Resource not found'
            ], 404);
        }

        $author->delete();

        if ($author->photo) {
            Storage::disk('public')->delete('author/' . $author->photo);
        }

        return response()->json([
            'success' => true,
            'message' => 'Resource update successfully',
            'data' => $author
        ], 200);
    }
}
