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
        Schema::create('client_babies', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->boolean('confirmed');
            $table->string('title');
            $table->text('title_about');
            $table->integer('childrencount_id');
            $table->integer('workperiod_id');
            $table->integer('employment_id');
            $table->string('drive');
            $table->string('agents');
            $table->integer('hourpay_id');
            $table->integer('monthpay_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_babies');
    }
};
