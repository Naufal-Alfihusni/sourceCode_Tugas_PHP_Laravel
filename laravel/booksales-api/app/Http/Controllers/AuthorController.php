<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
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
}
