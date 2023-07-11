<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('welcome');
});

//Auth 
//1-Register
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register/step1', [AuthController::class, 'registerStep1']);
Route::get('/register/step2', [AuthController::class, 'showRegisterStep2']);
Route::post('/register/step2', [AuthController::class, 'registerStep2']);
//1-Login
Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'handleLogin']);
//1-Logout
Route::get('/logout', [AuthController::class, 'logout']);

//Dashboard
Route::get('/dashboard', [ContactController::class, 'retrieveAllContact']);
//Add Contact
Route::get('/add-contact', [ContactController::class, 'showContactForm']);
Route::post('/add-contact', [ContactController::class, 'addContact']);
//Update Contact
Route::get('/update-contact/{id}', [ContactController::class, 'showUpdateContact'])->whereNumber('id');
Route::put('/update-contact/{id}', [ContactController::class, 'updateContact'])->whereNumber('id');
//Delete Contact
Route::get('/delete-contact/{id}', [ContactController::class, 'deleteContact'])->whereNumber('id');

//sitemap
// Route::get('/app/sitemap.xml', [SitemapController::class, 'generateSitemap']);
