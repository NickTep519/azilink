<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CopyImagesToPublicStorage extends Command
{
    protected $signature = 'copy:images';
    protected $description = 'Copie les images de storage/app/images vers public/storage/images';

    public function handle()
    {
        $source = storage_path('app/images');
        $destination = public_path('storage/images');

        // 🔧 Créer le dossier source s'il n'existe pas
        if (!File::exists($source)) {
            File::makeDirectory($source, 0755, true);
            $this->warn("📂 Le dossier source $source n'existait pas, il a été créé. (mais il est vide)");
            return 0;
        }

        // 🔧 Créer le dossier destination
        File::ensureDirectoryExists($destination);

        $files = File::allFiles($source);

        if (empty($files)) {
            $this->info('📂 Aucun fichier à copier.');
            return 0;
        }

        foreach ($files as $file) {
            $relativePath = $file->getRelativePathname();
            $targetPath = $destination . '/' . $relativePath;

            File::ensureDirectoryExists(dirname($targetPath));
            File::copy($file->getPathname(), $targetPath);

            $this->info("✅ Copié : $relativePath");
        }

        $this->info('🎉 Toutes les images ont été copiées avec succès !');
        return 0;
    }
}
