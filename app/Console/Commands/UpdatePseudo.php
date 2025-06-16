<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class UpdatePseudo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:pseudo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mettre à jour les pseudo en enlevant les @';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::where('pseudo', 'LIKE', '@%')->get();

        foreach ($users as $user) {
            $user->pseudo = ltrim($user->pseudo, '@');
            $user->save();
        }

        $this->info("Tous les pseudo sont mis à jour ! ") ; 
    }
}
