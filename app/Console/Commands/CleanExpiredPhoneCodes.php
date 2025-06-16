<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\PhoneVerification;

class CleanExpiredPhoneCodes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'codes:clean';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Supprime les codes de vérification expirés';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $deleted = PhoneVerification::where('expires_at', '<', now())->delete();
        $this->info("Codes expirés supprimés : $deleted");
    }
}
