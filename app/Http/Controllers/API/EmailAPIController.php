<?php

namespace App\Http\Controllers\API;

use App\Email;
use App\Http\Controllers\Controller;

class EmailAPIController extends Controller
{
    public function index()
    {
        return Email::all();
    }

    public function show($id)
    {
        return Email::with([])->find($id);
    }

    public function store(Request $request)
    {
        return Email::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $email = Email::findOrFail($id);
        $email->update($request->all());

        return $email;
    }

    public function delete(Request $request, $id)
    {
        $email = Email::findOrFail($id);
        $email->delete();

        return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }
}
