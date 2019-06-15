<?php

namespace App\Http\Controllers;

use App\Address;
 
class AddressAPIController extends Controller
{
    public function index()
    {
        return Address::all();
    }
 
    public function show($id)
    {
        return Address::with([])->find($id);
    }

    public function store(Request $request)
    {
        return Address::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $address = Address::findOrFail($id);
        $address->update($request->all());

        return $address;
    }

    public function delete(Request $request, $id)
    {
        $address = Address::findOrFail($id);
        $address->delete();

        return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }
}
