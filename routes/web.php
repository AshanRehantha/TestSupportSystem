<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//User Ticket Route
Route::post('/ticket', 'TicketController@store')->name('ticket.store');
Route::get('/ticket/{id}', 'TicketController@show')->name('ticket.show');

// Admin Ticket Route
Route::get('/ticket/reply/{id}', 'TicketController@getAdminTicketById')->name('ticket.admin.reply');
Route::post('/admin/reply/ticket', 'TicketController@getAdminTicketReply')->name('admin.ticket.reply');
