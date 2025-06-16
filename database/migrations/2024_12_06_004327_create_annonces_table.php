<?php

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
        Schema::create('annonces', function (Blueprint $table) {
            $table->id();
            $table->string('title') ; 
            $table->longText('description') ; 
            $table->float('kg') ; 
            $table->float('price')->nullable() ; 
            $table->string('starts_city') ; 
            $table->string('ends_city') ;
            $table->date('starts_at')->nullable()  ; 
            $table->date('ends_at')->nullable() ;
            $table->string('m_transport')->nullable() ; 
            $table->string('company')->nullable()  ; 
            $table->enum('status', ['en_attente', 'termine', 'archive'])->default('en_attente') ; 
            $table->boolean('type') ; 
            $table->softDeletes() ; 
            $table->timestamps();

            $table->foreignIdFor(User::class, 'traveler_id')->nullable()->constrained('users')->cascadeOnDelete() ; 
            $table->foreignIdFor(User::class, 'sender_id')->nullable()->constrained('users')->cascadeOnDelete() ; 
            $table->foreignIdFor(User::class, 'creator_id')->nullable()->constrained('users')->cascadeOnDelete() ;

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('annonces');
    }
};
