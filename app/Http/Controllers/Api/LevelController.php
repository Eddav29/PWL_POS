<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MLevel;

class LevelController extends Controller
{
    public function index()
    {
        return MLevel::all();
    }

    public function store(Request $request)
    {
        $level = MLevel::create($request->all());
        return response()->json($level, 201);
    }

    public function show(MLevel $level)
    {
        return MLevel::find($level);
    }

    public function Update(Request $request, MLevel $level)
    {
        $level->update($request->all());
        return MLevel::find($level);
    }

    public function destroy(MLevel $level)
    {
        $level->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data terhapus'
        ]);
    }
}