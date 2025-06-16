<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class FixPublicStorageFiles extends Command
{
    protected $signature = 'fix:public-storage';
    protected $description = 'Déplace les fichiers de /public/storage vers /storage/app/public';

    public function handle()
    {
        $source = public_path('storage');
        $target = storage_path('app/public');

        if (!File::exists($source)) {
            $this->error("Le dossier $source n'existe pas.");
            return 1;
        }

        $files = File::allFiles($source);
        if (empty($files)) {
            $this->info("Aucun fichier à déplacer.");
            return 0;
        }

        foreach ($files as $file) {
            $relativePath = str_replace($source . '/', '', $file->getPathname());
            $destinationPath = $target . '/' . $relativePath;

            File::ensureDirectoryExists(dirname($destinationPath));
            File::move($file->getPathname(), $destinationPath);

            $this->info("Déplacé : $relativePath");
        }

        $this->info('✅ Tous les fichiers ont été déplacés correctement.');
        return 0;
    }
}
