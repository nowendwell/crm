@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-3">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Welcome back {{ auth()->user()->first_name }}
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header">New Accounts</div>

                <div class="card-body">
                    <table class="table">
                        @if ( @$new_accounts )
                            <thead>
                                <tr>
                                    <th>Account</th>
                                    <th>Source</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            @foreach($new_accounts as $account)
                                <tr>
                                    <td><a href="{{ route('account.show', $account->uuid) }}">{{ $account->name }}</a></td>
                                    <td>{{ $account->source }}</td>
                                    <td>{{ carbon($account->created_at, 'm/d/Y') }}</td>
                                </tr>
                            @endforeach
                        @else
                            Nothing yet. Try adding a new account. <a href="{{ route('account.create') }}">New Account</a>
                        @endif
                    </table>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-header">New Contacts</div>

                <div class="card-body">
                    <table class="table">
                        @if ( @$new_accounts )
                            <thead>
                                <tr>
                                    <th>Contact</th>
                                    <th>Account</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            @foreach($new_contacts as $contact)
                                <tr>
                                    <td><a href="{{ route('contact.show', $contact->uuid) }}">{{ $contact->first_name . ' ' . $contact->last_name }}</a></td>
                                    <td>{{ $contact->account->name }}</td>
                                    <td>{{ carbon($contact->created_at, 'm/d/Y') }}</td>
                                </tr>
                            @endforeach
                        @else
                            Nothing yet. Try adding a new contact. <a href="{{ route('contact.create') }}">New Contact</a>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
