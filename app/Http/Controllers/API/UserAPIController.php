<?php

namespace App\Http\Controllers\API;

use App\User;
use App\Http\Controllers\Controller;

class UserAPIController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function show($id)
    {
        return User::with(['accounts', 'contacts', 'organization'])->find($id);
    }

    public function store(Request $request)
    {
        return User::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());

        return $user;
    }

    public function delete(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }
}
