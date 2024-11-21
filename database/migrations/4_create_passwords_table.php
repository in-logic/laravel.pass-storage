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
        Schema::create('passwords', function (Blueprint $table) {
            $table->id('password_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('application_id');
            $table->text('password_text');
            $table->longText('password_obs');
            $table->enum('password_status', ['UNKNOWN', 'WEAK', 'MEDIUM', 'STRONG'])->default('UNKNOWN');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('passwords');
    }
};
