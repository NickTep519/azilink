<?php

use App\Models\Annonce;
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
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->string('name') ; 
            $table->float('kg_commande') ; 
            $table->float('price') ; 
            $table->enum('status', ['en_attente', 'en_cours', 'termine'])->default('en_attente') ; 
            $table->softDeletes() ; 
            $table->timestamps();

            $table->foreignIdFor(Annonce::class)->nullable()->constrained()->cascadeOnDelete() ; 
            $table->foreignIdFor(User::class, 'creator_id')->nullable()->constrained('users')->cascadeOnDelete() ; 
            $table->foreignIdFor(User::class, 'recever_id')->nullable()->constrained('users')->cascadeOnDelete() ; 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};
