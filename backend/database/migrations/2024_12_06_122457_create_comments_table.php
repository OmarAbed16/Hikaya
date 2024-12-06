<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id('comment_id');
            $table->foreignId('story_id')->constrained('stories')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); 
            $table->text('content'); 
            $table->foreignId('parent_comment_id')->nullable()->constrained('comments')->onDelete('cascade'); 
            $table->timestamps(); 
            $table->softDeletes(); 
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
