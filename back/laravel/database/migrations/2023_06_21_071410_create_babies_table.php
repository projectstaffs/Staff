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
        Schema::create('babies', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->text('baby_exp');
            $table->integer('experience_id');
            $table->integer('recommendation_id');
            $table->text('education_about');
            $table->integer('workperiod_id');
            $table->integer('employment_id');
            $table->integer('childrencount_id');
            $table->string('children_invalid');
            $table->integer('hourpay_id');
            $table->integer('monthpay_id');
            $table->text('additional')->nullable();
            $table->boolean('confirmed');            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('babies');
    }
};
