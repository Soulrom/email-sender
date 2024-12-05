<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;

Route::get('/email-sender', [EmailController::class, 'showForm']);
Route::post('/send-email', [EmailController::class, 'sendEmail']);
Route::get('/{uuid}/success', [EmailController::class, 'success'])->name('email.success');