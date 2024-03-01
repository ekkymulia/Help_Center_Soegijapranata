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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->unsignedBigInteger('topik_id');
            $table->string('status_layanan');
            $table->boolean('is_public');
            $table->string('chat_api_id');
            $table->timestamps();

            // Add foreign key constraint for topik_id
            $table->foreign('topik_id')->references('id')->on('topic')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
