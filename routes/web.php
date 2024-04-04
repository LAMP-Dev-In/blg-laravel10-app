<?php

use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;


Route::get('ping', function() {
    $mailchimp = new \MailchimpMarketing\ApiClient();

    $mailchimp->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => config('services.mailchimp.server'),
    ]);

    $response = $mailchimp->lists->addListMember("1c3d358b4b", [
        "email_address" => "gautam.php@gmail.com",
        "status" => "subscribed",
    ]);
    
    
    ddd($response);
});

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);


Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('/login', [SessionController:: class, 'create'])->middleware('guest');
Route::post('/login', [SessionController:: class, 'store'])->middleware('guest');
Route::post('/logout', [SessionController:: class, 'destroy'])->middleware('auth');

