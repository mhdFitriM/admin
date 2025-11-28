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
        Schema::create('database_credentials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('project_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('name'); // e.g., "Production DB", "Staging DB"
            $table->string('type')->default('mysql'); // mysql, postgresql, mongodb, etc.
            $table->string('host');
            $table->integer('port')->default(3306);
            $table->string('database_name');
            $table->text('username'); // Encrypted
            $table->text('password'); // Encrypted
            $table->text('connection_string')->nullable(); // For MongoDB, etc.
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('database_credentials');
    }
};
