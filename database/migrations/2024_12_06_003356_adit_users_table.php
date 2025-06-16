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
        Schema::table('users', function(Blueprint $table){
            $table->string('first_name')->nullable() ; 
            $table->string('phone')->nullable() ;
            $table->string('adress')->nullable() ; 
            $table->string('sex')->nullable() ; 
            $table->date('date_of_birth')->nullable() ; 
            $table->string('role')->default('user') ;
        }) ;
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
