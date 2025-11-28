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
        Schema::create('credentials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name'); // e.g., "GitHub Token", "OpenAI API Key"
            $table->string('type'); // e.g., "api_token", "password", "ssh_key"
            $table->text('value'); // Encrypted value
            $table->text('description')->nullable();
            $table->string('service')->nullable(); // e.g., "GitHub", "OpenAI", "AWS"
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('credentials');
    }
};
