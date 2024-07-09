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
            $table->string('title');
            $table->string('description');
            $table->text('original_url');
            $table->string('shortened_url');
            $table->string('custom_url');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('shortened_links');
    }
};
