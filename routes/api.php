<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected routes for authenticated users only
Route::middleware('auth:sanctum')->group(function () {
    Route::put('/update', [AuthController::class, 'update']);

    Route::get('/users', [ApiController::class, 'getAllUsers']);

    // CRUD operations for chat messages
    Route::post('/chat-message', [ApiController::class, 'createChatMessage']);
    Route::get('/chat-messages', [ApiController::class, 'getAllChatMessages']);

    // CRUD operations for comments
    Route::post('/comment', [ApiController::class, 'createComment']);
    Route::get('/comments', [ApiController::class, 'getAllComments']);

    // CRUD operations for documents
    Route::post('/document', [ApiController::class, 'createDocument']);
    Route::get('/documents', [ApiController::class, 'getAllDocuments']);

    // CRUD operations for messages
    Route::post('/message', [ApiController::class, 'createMessage']);
    Route::get('/messages', [ApiController::class, 'getAllMessages']);

    // CRUD operations for new messages (chats)
    Route::post('/new-message', [ApiController::class, 'createNewMessage']);
    Route::get('/new-messages', [ApiController::class, 'getAllNewMessages']);

    // CRUD operations for new users
    Route::post('/new-user', [ApiController::class, 'createNewUser']);
    Route::get('/new-users', [ApiController::class, 'getAllNewUsers']);

    // CRUD operations for posts
    Route::post('/post', [ApiController::class, 'createPost']);
    Route::get('/posts', [ApiController::class, 'getAllPosts']);

    // CRUD operations for reviews
    Route::post('/review', [ApiController::class, 'createReview']);
    Route::get('/reviews', [ApiController::class, 'getAllReviews']);
});

// This route returns the authenticated user
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

