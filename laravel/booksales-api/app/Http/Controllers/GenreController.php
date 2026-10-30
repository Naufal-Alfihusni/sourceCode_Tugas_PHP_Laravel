<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all();

        if ($genres->isEmpty()) {
            return response()->json([
                "success" => true,
                "message" => "Resources books no found!",
            ], 200);
        }


        return response()->json([
            "success" => true,
            "message" => "Get all resources",
            "data" => $genres,
        ], 200);
    }

    public function store(Request $request)
    {
        //validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:40',
            'description' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        //insert data
        $genre = Genre::create([
            'name' => $request->name,
            'description' =>  $request->description
        ]);

        //response
        return response()->json([
            'success' => true,
            'message' => 'Resource genre added successfully',
            'data' => $genre
        ]);
    }

    public function show(string $id)
    {
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
                'success' => false,
                'message' => 'Resource not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get detail resource',
            'data' => $genre
        ], 200);
    }

    public function update(string $id,  Request $request)
    {
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
                'success' => false,
                'message' => 'Resource not found'
            ], 404);
        }

        // validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:40',
            'description' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        //persiapan data
        $data =  [
            'name' => $request->name,
            'description' =>  $request->description
        ];

        // update data
        $genre->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Resource update successfully',
            'data' => $genre
        ], 200);
    }

    public function destroy(string $id)
    {
        $genre = Genre::find($id);

        $genre->delete();

        if (!$genre) {
            return response()->json([
                'success' => false,
                'message' => 'Resource not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Delete resource successfully'
        ]);
    }
}
