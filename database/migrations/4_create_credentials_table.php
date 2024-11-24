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
            $table->id('credential_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('application_id');
            $table->text('credential_user');
            $table->text('credential_token');
            $table->longText('credential_obs');
            $table->enum('credential_token_status', ['UNKNOWN', 'WEAK', 'MEDIUM', 'STRONG'])->default('UNKNOWN');
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
