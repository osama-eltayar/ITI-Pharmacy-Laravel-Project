<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

use App\User;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::put('/clients/forgetpassword', 'API\VerificationApiController@reset');

Route::post('clients/login', 'API\ClientController@login');
Route::post('/clients/register', 'API\ClientController@register');
Route::get('/clients', 'API\ClientController@index')->middleware(['auth:sanctum','APIverified']);
Route::put('/clients/{client}', 'API\ClientController@update')->middleware(['auth:sanctum','APIverified']);
Route::delete('/clients/{client}', 'API\ClientController@destroy')->middleware(['auth:sanctum','APIverified']);
Route::get('/clients/{client}', 'API\ClientController@show')->middleware(['auth:sanctum','APIverified']);



Route::get('email/verifyLink/{id}', 'API\VerificationApiController@verifyLink')->name('verificationapi.verifyLink');
Route::get('email/verify/{id}', 'API\VerificationApiController@verify')->name('verificationapi.verify');
Route::get('email/resend/{id}', 'API\VerificationApiController@resend')->name('verificationapi.resend');

Route::group([
    'name' => 'useraddresses',
    'prefix' => 'useraddresses',
    'middleware' => ['auth:sanctum'],
], function () {
    Route::get('/', 'API\UserAddressController@index')->name('useraddresses.index');

    Route::get('/{useraddress}', 'API\UserAddressController@show')->name('useraddresses.show');

    Route::put('/', 'API\UserAddressController@update')->name('useraddresses.update');
    Route::post('/', 'API\UserAddressController@store')->name('useraddresses.store');
    Route::delete('/{useraddress}', 'UserAddressController@destroy')->name('useraddresses.destroy');
});

// Route::get('/orders', 'API\OrderController@index')->middleware('auth:sanctum');
Route::post('/orders', 'API\OrderController@store')->middleware(['auth:sanctum','APIverified']);
Route::put('/orders/{order}', 'API\OrderController@update')->middleware(['auth:sanctum','APIverified']);
Route::get('/orders/{order}', 'API\OrderController@show')->middleware(['auth:sanctum','APIverified']);
Route::delete('/orders/{order}', 'API\OrderController@destroy')->middleware(['auth:sanctum','APIverified']);
Route::post('/confirmorder/{orderId}', 'API\OrderController@confirmorder')->middleware('auth:sanctum');
