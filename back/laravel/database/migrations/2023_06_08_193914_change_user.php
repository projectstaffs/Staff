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
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('country')->nullable()->index()->constrained('countries');
            $table->foreignId('city')->nullable()->index()->constrained('cities');
            $table->foreignId('citizen')->nullable()->index()->constrained('countries');
            $table->foreignId('criminal')->nullable()->index()->constrained('criminals');
            $table->foreignId('moving')->nullable()->index()->constrained('movings');
            $table->foreignId('smoking')->nullable()->index()->constrained('smokings');
            $table->foreignId('alcohol')->nullable()->index()->constrained('alcohols');
            $table->foreignId('status')->nullable()->index()->constrained('statuses');
            $table->foreignId('religion')->nullable()->index()->constrained('religions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('preview_url');

            $table->dropColumn('country');
            $table->dropColumn('city');
            $table->dropColumn('citizen');
            $table->dropColumn('criminal');
            $table->dropColumn('moving');
            $table->dropColumn('smoking');
            $table->dropColumn('alcohol');
            $table->dropColumn('status');
            $table->dropColumn('religion');
        });
    }
};
