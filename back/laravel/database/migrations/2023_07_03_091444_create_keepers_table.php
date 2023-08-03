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
        Schema::create('keepers', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->text('keeper_exp');
            $table->integer('experience_id');            
            $table->integer('recommendation_id');
            $table->integer('workperiod_id');
            $table->integer('employment_id');            
            $table->string('technique'); 
            $table->string('material'); 
            $table->string('baby_keeper');          
            $table->string('nurse_keeper');                       
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
        Schema::dropIfExists('keepers');
    }
};
