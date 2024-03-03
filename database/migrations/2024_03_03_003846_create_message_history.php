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
        Schema::create('message_history', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tiket_id');
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('sender_id');
            $table->text('chat');
            $table->boolean('is_flagged')->default(false);
            $table->timestamps();

            // Foreign keys
            $table->foreign('tiket_id')->references('id')->on('tickets')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('role')->onDelete('cascade');
            $table->foreign('sender_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('message_history');
    }
};
