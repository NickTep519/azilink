<?php

use App\Models\Conversation;
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
        Schema::table('commandes', function(Blueprint $table) {
            $table->foreignIdFor(Conversation::class)->nullable()->constrained()->cascadeOnDelete() ; 
        }) ; 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('commandes', function(Blueprint $table){
            $table->dropForeignIdFor(Conversation::class) ; 
        }) ; 
    }
};
