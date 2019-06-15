<?php

namespace App\Http\Controllers\API;

use App\Organization;
use App\Http\Controllers\Controller;

class OrganizationAPIController extends Controller
{
    public function index()
    {
        return Organization::all();
    }

    public function show($id)
    {
        return Organization::with(['users', 'accounts', 'customFields', 'customFieldData'])->find($id);
    }

    public function store(Request $request)
    {
        return Organization::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $organization = Organization::findOrFail($id);
        $organization->update($request->all());

        return $organization;
    }

    public function delete(Request $request, $id)
    {
        $organization = Organization::findOrFail($id);
        $organization->delete();

        return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }
}
