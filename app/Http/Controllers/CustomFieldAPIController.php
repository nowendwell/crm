<?php

namespace App\Http\Controllers;

use App\CustomField;
 
class CustomFieldAPIController extends Controller
{
    public function index()
    {
        return CustomField::all();
    }
 
    public function show($id)
    {
        return CustomField::with(['customFieldData', 'organization'])->find($id);
    }

    public function store(Request $request)
    {
        return CustomField::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $customField = CustomField::findOrFail($id);
        $customField->update($request->all());

        return $customField;
    }

    public function delete(Request $request, $id)
    {
        $customField = CustomField::findOrFail($id);
        $customField->delete();

        return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }
}
