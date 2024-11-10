<?php

namespace App\Http\Controllers;

use App\Models\ChatMessage;
use App\Models\Comment;
use App\Models\Document;
use App\Models\Message;
use App\Models\NewMessage;
use App\Models\NewUser;
use App\Models\Post;
use App\Models\Review;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    // Function to create a new chat message
    public function createChatMessage(Request $request)
    {
        $message = ChatMessage::create([
            'senderId' => $request->senderId,
            'message' => $request->message,
            'timestamp' => now(),
        ]);
        return response()->json($message);
    }

    // Function to create a new comment
    public function createComment(Request $request)
    {
        $comment = Comment::create([
            'commentUserID' => $request->commentUserID,
            'commentUserComment' => $request->commentUserComment,
            'commentTimestamp' => now(),
            'commentUserFullName' => $request->commentUserFullName,
            'commentUserProfileImage' => $request->commentUserProfileImage,
        ]);
        return response()->json($comment);
    }

    // Function to create a new document
    public function createDocument(Request $request)
    {
        $document = Document::create([
            'documentImgLink' => $request->documentImgLink,
        ]);
        return response()->json($document);
    }

    // Function to create a new message
    public function createMessage(Request $request)
    {
        $message = Message::create([
            'senderId' => $request->senderId,
            'receiverId' => $request->receiverId,
            'message' => $request->message,
            'timestamp' => now(),
        ]);
        return response()->json($message);
    }

    // Function to create a new chat
    public function createNewMessage(Request $request)
    {
        $newMessage = NewMessage::create([
            'avatarUrl' => $request->avatarUrl,
            'fullName' => $request->fullName,
            'last_chat' => $request->last_chat,
            'chatId' => $request->chatId,
        ]);
        return response()->json($newMessage);
    }

    // Function to create a new user
    public function createNewUser(Request $request)
    {
        $newUser = NewUser::create([
            'userFullName' => $request->userFullName,
            'userProfileImage' => $request->userProfileImage,
        ]);
        return response()->json($newUser);
    }

    // Function to create a new post
    public function createPost(Request $request)
    {
        $post = Post::create([
            'postTitle' => $request->postTitle,
            'postDescription' => $request->postDescription,
            'postPosterID' => $request->postPosterID,
            'postContent' => $request->postContent,
            'postTimestamp' => now(),
            'postUpVotes' => $request->postUpVotes ?? 0,
            'postDownVotes' => $request->postDownVotes ?? 0,
            'postUpVotedBy' => $request->postUpVotedBy ?? [],
            'postDownVotedBy' => $request->postDownVotedBy ?? [],
            'postCommentsCount' => $request->postCommentsCount ?? 0,
            'postCommentList' => $request->postCommentList ?? [],
        ]);
        return response()->json($post);
    }

    // Function to create a new review
    public function createReview(Request $request)
    {
        $review = Review::create([
            'reviewUserID' => $request->reviewUserID,
            'reviewUserComment' => $request->reviewUserComment,
            'commentTimestamp' => now(),
        ]);
        return response()->json($review);
    }
}
