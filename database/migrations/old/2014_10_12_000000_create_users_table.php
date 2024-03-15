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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->smallInteger('country_id')->index()->nullable();
            $table->bigInteger('phone')->nullable();
            $table->bigInteger('cpf')->unique()->nullable();
            $table->date('birthday')->nullable();
            $table->string('gender', 1)->nullable();
            $table->string('college')->nullable();
            $table->string('id_professional')->nullable();
            $table->string('college_uf', 2)->nullable();
            $table->bigInteger('image')->nullable();
            $table->bigInteger('plan')->nullable();
            $table->smallInteger('is_admin')->index()->nullable();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
