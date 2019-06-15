<?php

namespace App\Http\Controllers;

use App\CustomFieldData;
 
class CustomFieldDataAPIController extends Controller
{
    public function index()
    {
        return CustomFieldData::all();
    }
 
    public function show($id)
    {
        return CustomFieldData::with(['customField', 'organization'])->find($id);
    }

    public function store(Request $request)
    {
        return CustomFieldData::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $customFieldData = CustomFieldData::findOrFail($id);
        $customFieldData->update($request->all());

        return $customFieldData;
    }

    public function delete(Request $request, $id)
    {
        $customFieldData = CustomFieldData::findOrFail($id);
        $customFieldData->delete();

        return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }
}
