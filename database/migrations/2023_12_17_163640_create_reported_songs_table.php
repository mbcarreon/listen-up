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
        Schema::create('reported_songs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('artist');
            $table->string('album')->nullable();
            $table->string('country')->nullable();
            $table->string('genre')->nullable();
            $table->string('duration')->nullable();
            $table->string('cover')->nullable();
            $table->string('song_link');
            $table->timestamp('reported_at')->useCurrent(); // Use the ->useCurrent() method
            $table->timestamps();  // This will create the 'created_at' and 'updated_at' columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reported_songs');
    }
};
