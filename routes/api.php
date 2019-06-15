<?php

use Illuminate\Http\Request;
use Illuminate\Routing\Router;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
* Snippet for a quick route reference
*/
Route::get('/', function (Router $router) {
    return collect($router->getRoutes()->getRoutesByMethod()["GET"])->map(function($value, $key) {
        return url($key);
    })->values();   
});

Route::resource('accounts', 'AccountAPIController', [
    'only' => ['index', 'show', 'store', 'update', 'delete']
]);

Route::resource('contacts', 'ContactAPIController', [
    'only' => ['index', 'show', 'store', 'update', 'delete']
]);

Route::resource('phones', 'PhoneAPIController', [
    'only' => ['index', 'show', 'store', 'update', 'delete']
]);

Route::resource('emails', 'EmailAPIController', [
    'only' => ['index', 'show', 'store', 'update', 'delete']
]);

Route::resource('addresses', 'AddressAPIController', [
    'only' => ['index', 'show', 'store', 'update', 'delete']
]);

Route::resource('customFields', 'CustomFieldAPIController', [
    'only' => ['index', 'show', 'store', 'update', 'delete']
]);

Route::resource('customFieldData', 'CustomFieldDataAPIController', [
    'only' => ['index', 'show', 'store', 'update', 'delete']
]);

Route::resource('organizations', 'OrganizationAPIController', [
    'only' => ['index', 'show', 'store', 'update', 'delete']
]);

Route::resource('users', 'UserAPIController', [
    'only' => ['index', 'show', 'store', 'update', 'delete']
]);