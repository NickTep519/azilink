<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Str;

class GenerateSlugs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:slugs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Génère des slugs pour tous les utilisateurs';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::all();
    
        foreach ($users as $user) {
            $user->slug =  Str::slug($user->pseudo);
            $user->save();
        }
    
        $this->info('Slugs générés pour tous les utilisateurs !');
    }
    
}
