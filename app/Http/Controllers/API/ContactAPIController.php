<?php

namespace App\Http\Controllers\API;

use App\Contact;
use App\Http\Controllers\Controller;

class ContactAPIController extends Controller
{
    public function index()
    {
        return Contact::all();
    }

    public function show($id)
    {
        return Contact::with(['user', 'account'])->find($id);
    }

    public function store(Request $request)
    {
        return Contact::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->update($request->all());

        return $contact;
    }

    public function delete(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }
}
