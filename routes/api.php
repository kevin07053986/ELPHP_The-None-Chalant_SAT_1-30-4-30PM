<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected routes for authenticated users only
Route::middleware('auth:sanctum')->group(function () {
    Route::put('/update', [AuthController::class, 'update']);

    // CRUD operations for chat messages
    Route::post('/chat-message', [ApiController::class, 'createChatMessage']);
    
    // CRUD operations for comments
    Route::post('/comment', [ApiController::class, 'createComment']);
    
    // CRUD operations for documents
    Route::post('/document', [ApiController::class, 'createDocument']);
    
    // CRUD operations for messages
    Route::post('/message', [ApiController::class, 'createMessage']);
    
    // CRUD operations for new messages (chats)
    Route::post('/new-message', [ApiController::class, 'createNewMessage']);
    
    // CRUD operations for new users
    Route::post('/new-user', [ApiController::class, 'createNewUser']);
    
    // CRUD operations for posts
    Route::post('/post', [ApiController::class, 'createPost']);
    
    // CRUD operations for reviews
    Route::post('/review', [ApiController::class, 'createReview']);
});

// This route returns the authenticated user
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

