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

            $table->string('role');
            $table->boolean('confirmed')->nullable();

            $table->string('surname')->nullable();
            $table->string('patronymic')->nullable();            
            $table->integer('phone')->nullable();
            $table->integer('additional_phone')->nullable();
            $table->string('gender')->nullable();
            $table->date('age')->nullable();
            $table->string('right_work')->nullable();
            $table->string('drive')->nullable();
            $table->string('night_work')->nullable();
            $table->string('animal_work')->nullable();
            $table->string('swimming')->nullable();
            $table->text('about')->nullable();
            $table->boolean('is_babysitting')->nullable();
            $table->boolean('is_nurse')->nullable();
            $table->boolean('is_housekeeper')->nullable();

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
