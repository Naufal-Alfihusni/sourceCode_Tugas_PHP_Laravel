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
}
