<?php

namespace App\Jobs;

use App\Models\Conversation;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CheckExpectedMessage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $conversation;

    /**
     * Create a new job instance.
     */
    public function __construct(Conversation $conversation)
    {
        $this->conversation = $conversation;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        try {
            $conversation = $this->conversation->fresh();

            if (!$conversation) {
                logger("🚫 Conversation non trouvée.");
                return;
            }

            $hasExpected = $conversation->messages()
                ->where('content', 'like', 'Bonjour, je vous contacte à propos de l\'annonce : %')
                ->exists();

            if (!$hasExpected) {
                $conversation->delete();
                logger("🗑 Conversation #{$conversation->id} supprimée : message attendu non trouvé.");
            } else {
                logger("✅ Conversation #{$conversation->id} conservée : message attendu trouvé.");
            }
        } catch (\Throwable $e) {
            logger()->error("🔥 Erreur dans CheckExpectedMessage : " . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
            ]);
        }
    }
}
