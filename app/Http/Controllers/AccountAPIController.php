<?php

namespace App\Http\Controllers;

use App\Account;
 
class AccountAPIController extends Controller
{
    public function index()
    {
        return Account::all();
    }
 
    public function show($id)
    {
        return Account::with(['contacts', 'user', 'organization'])->find($id);
    }

    public function store(Request $request)
    {
        return Account::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $account = Account::findOrFail($id);
        $account->update($request->all());

        return $account;
    }

    public function delete(Request $request, $id)
    {
        $account = Account::findOrFail($id);
        $account->delete();

        return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }
}
