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
        Schema::table('annonces', function(Blueprint $table) {
            $table->string('image_city_destination', 1000)->default(' ') ; 
        }) ; 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('annonces', function(Blueprint $table) {
            $table->dropColumn('image_city_destination') ; 
        }) ; 
    }
};
