<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('shortened_links', function (Blueprint $table) {
            $table->id();
            $table->string('username_id');
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->text('original_url');
            $table->string('shortened_url')->unique();
            $table->string('custom_url')->unique();
            $table->string('tags');
            $table->string('click_location')->nullable();
            $table->integer('total_click')->default(0);
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('shortened_links');
    }
};
