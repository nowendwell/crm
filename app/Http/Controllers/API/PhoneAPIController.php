<?php

namespace App\Http\Controllers\API;

use App\Phone;
use App\Http\Controllers\Controller;

class PhoneAPIController extends Controller
{
    public function index()
    {
        return Phone::all();
    }

    public function show($id)
    {
        return Phone::with([])->find($id);
    }

    public function store(Request $request)
    {
        return Phone::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $phone = Phone::findOrFail($id);
        $phone->update($request->all());

        return $phone;
    }

    public function delete(Request $request, $id)
    {
        $phone = Phone::findOrFail($id);
        $phone->delete();

        return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }
}
