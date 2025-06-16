<?php

use App\Models\Annonce;
use App\Models\Conversation;
use App\Models\User;
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
        Schema::create('conversations', function (Blueprint $table) {
            $table->id();
            $table->string('title') ; 
            $table->enum('status', ['actif', 'archive'])->default('actif') ; 
            $table->foreignIdFor(Annonce::class)->constrained()->cascadeOnDelete() ; 
            $table->softDeletes() ; 
            $table->timestamps();
        });

        Schema::create('conversation_user', function(Blueprint $table){
            $table->id() ; 
            $table->foreignIdFor(Conversation::class)->constrained()->cascadeOnDelete() ;
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete() ; 
            $table->softDeletes() ; 
            $table->timestamps() ; 
        }) ; 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conversations');
    }
};
