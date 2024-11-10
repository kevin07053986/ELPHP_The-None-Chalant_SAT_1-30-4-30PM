<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('profileImage')->nullable();
            $table->string('accountType');
            $table->string('password');
            $table->timestamp('timestamp');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('chat_message', function (Blueprint $table) {
            $table->id();
            $table->string('senderId');
            $table->string('message');
            $table->timestamp('timestamp');
        });

        Schema::create('comment', function (Blueprint $table) {
            $table->id();
            $table->string('commentUserID');
            $table->string('commentUserComment');
            $table->timestamp('commentTimestamp')->nullable();
            $table->string('commentUserFullName')->nullable();
            $table->string('commentUserProfileImage')->nullable();
        });

        Schema::create('document', function (Blueprint $table) {
            $table->id();
            $table->string('documentImgLink');
        });

        Schema::create('message', function (Blueprint $table) {
            $table->id();
            $table->string('senderId');
            $table->string('receiverId');
            $table->string('message');
            $table->timestamp('timestamp');
        });

        Schema::create('new_message', function (Blueprint $table) {
            $table->id();
            $table->string('avatarUrl');
            $table->string('fullName');
            $table->string('last_chat');
            $table->string('chatId');
        });

        Schema::create('new_user', function (Blueprint $table) {
            $table->id();
            $table->string('userFullName');
            $table->string('userProfileImage');
        });

        Schema::create('post', function (Blueprint $table) {
            $table->id();  // Primary key for the post
            $table->string('postTitle');  // Post title
            $table->string('postDescription');  // Post description
            $table->string('postPosterID');  // Poster ID
            $table->text('postContent');  // Post content
            $table->timestamp('postTimestamp')->nullable();  // Timestamp for the post (nullable)
            $table->integer('postUpVotes')->default(0);  // Number of upvotes (default to 0)
            $table->integer('postDownVotes')->default(0);  // Number of downvotes (default to 0)
            $table->json('postUpVotedBy')->nullable();  // List of users who upvoted (stored as JSON)
            $table->json('postDownVotedBy')->nullable();  // List of users who downvoted (stored as JSON)
            $table->integer('postCommentsCount')->default(0);  // Number of comments (default to 0)
            $table->json('postCommentList')->nullable();  // List of comments (stored as JSON)
        });

        Schema::create('review', function (Blueprint $table) {
            $table->id();
            $table->string('reviewUserID');
            $table->string('reviewUserComment');
            $table->timestamp('commentTimestamp')->nullable();
        });


//----------------------------------------------------------------------------------------------------------------------------//

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
