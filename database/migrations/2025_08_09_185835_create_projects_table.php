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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
             $table->string('title');
        $table->string('category'); // web, graphic, print
        $table->text('description')->nullable();
        $table->string('image')->nullable(); // path like projects/filename.jpg
        $table->string('badge')->nullable();
        $table->string('link')->nullable();
        $table->json('tags')->nullable(); // store tags as json array
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
