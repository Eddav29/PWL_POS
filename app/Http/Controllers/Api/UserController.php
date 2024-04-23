<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MUser;

class UserController extends Controller
{
    public function index()
    {
        return MUser::all();
    }

    public function store(Request $request)
    {
        $user = MUser::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' =>bcrypt($request->password),
            'level_id' => $request->level_id
        ]);
        return response()->json($user, 201);
    }

    public function show(MUser $user)
    {
        return MUser::find($user);
    }

    public function Update(Request $request, MUser $user)
    {
        $user->update($request->all());
        return response()->json($user, 200);
    }

    public function destroy(MUser $user)
    {
        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data terhapus'
        ]);
    }
}