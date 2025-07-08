<?php

namespace App\Listeners;


use App\Models\User;
use App\Models\Annonce;
use App\Models\Commande;
use App\Models\Conversation;
use App\Events\CommandeEvent;
use Illuminate\Console\Command;
use App\Mail\CommandeAlerteMail;
use App\Notifications\NewNotif;
use App\Notifications\NewNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Str;

class CommandeListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CommandeEvent $event)
    {
        if ($event->commande->exists) {

            $event->commande->update(['status' => $event->data['status']]);

            // Définition du sujet et du message en fonction du statut
            switch ($event->commande->status) {

                case 'creee':

                    $subject = "Nouvelle commande pour un colis";
                    $messageBody = "Une nouvelle commande a été créé pour une demande d’envoi de colis.";
                    Mail::to($event->commande->receverUser)->send(new CommandeAlerteMail($subject, $messageBody, $event->commande));
                    $event->commande->receverUser->notify(new NewNotification(Str::limit($messageBody, 40), route('commandes.index')));

                    break;
                case 'accepte':

                    $subject = "Commande Acceptée";
                    $messageBodyRecever = "Vous avez accepté la commande de {$event->commande->creatorUser->name}.";
                    $messageBodyCreator = "{$event->commande->receverUser->name} a accepté votre commande";
                    Mail::to($event->commande->receverUser)->send(new CommandeAlerteMail($subject, $messageBodyRecever, $event->commande));
                    Mail::to($event->commande->creatorUser)->send(new CommandeAlerteMail($subject, $messageBodyCreator, $event->commande));

                    $event->commande->receverUser->notify(new NewNotif(Str::limit($messageBodyRecever, 40), route('commandes.index')));
                    $event->commande->creatorUser->notify(new NewNotif(Str::limit($messageBodyCreator, 40), route('commandes.index')));

                    // Mis à jour du kilo restant de l'annonce
                    $event->commande->annonce->kg_restant = ($event->commande->annonce->kg - $event->commande->kg_commande);
                    $message = '✅ La commande a été acceptée';
                    $content = $this->getContentMessage($event->commande, $message, $subject);


                    $event->commande->conversation->messages()->create([
                        'user_id' => auth()->id(),
                        'content' => $content,

                    ]);
                    break;

                case 'refuse':

                    $subject = "Refu de Commande";
                    $messageBodyRecever = "Vous avez refusé la commande de {$event->commande->creatorUser->name}.";
                    $messageBodyCreator = "{$event->commande->receverUser->name} a refusé votre commande";
                    Mail::to($event->commande->receverUser)->send(new CommandeAlerteMail($subject, $messageBodyRecever, $event->commande));
                    Mail::to($event->commande->creatorUser)->send(new CommandeAlerteMail($subject, $messageBodyCreator, $event->commande));

                    $event->commande->receverUser->notify(new NewNotif(Str::limit($messageBodyRecever, 40), route('commandes.index')));
                    $event->commande->creatorUser->notify(new NewNotif(Str::limit($messageBodyCreator, 40), route('commandes.index')));

                    $message = '❌ La commande a été refusée.';
                    $content = $this->getContentMessage($event->commande, $message, $subject);

                    $event->commande->conversation->messages()->create([
                        'user_id' => auth()->id(),
                        'content' => $content,

                    ]);

                    break;

                case 'annule':

                    $subject = "Commande Annulée";
                    $messageBodyRecever = "{$event->commande->creatorUser->name} a annulé la commande qu'il a créé en votre nom.";
                    $messageBodyCreator = "Vous avez annulé votre commande créé au nom de {$event->commande->receverUser->name}";
                    Mail::to($event->commande->receverUser)->send(new CommandeAlerteMail($subject, $messageBodyRecever, $event->commande));
                    Mail::to($event->commande->creatorUser)->send(new CommandeAlerteMail($subject, $messageBodyCreator, $event->commande));

                    $event->commande->receverUser->notify(new NewNotif(Str::limit($messageBodyRecever, 40), route('commandes.index')));
                    $event->commande->creatorUser->notify(new NewNotif(Str::limit($messageBodyCreator, 40), route('commandes.index')));

                    $message = '⚠️ La commande a été annulée.';
                    $content = $this->getContentMessage($event->commande, $message, $subject);

                    $event->commande->conversation->messages()->create([
                        'user_id' => auth()->id(),
                        'content' => $content,

                    ]);

                    break;

                case 'livree':

                    $subject = "Commande Livrée";
                    $messageBodyRecever = "{$event->commande->creatorUser->name} a livré une commande pour vous.";
                    $messageBodyCreator = "Vous avez livré la commande de {$event->commande->receverUser->name}";
                    Mail::to($event->commande->receverUser)->send(new CommandeAlerteMail($subject, $messageBodyRecever, $event->commande));
                    Mail::to($event->commande->creatorUser)->send(new CommandeAlerteMail($subject, $messageBodyCreator, $event->commande));

                    $event->commande->receverUser->notify(new NewNotif(Str::limit($messageBodyRecever, 40), route('commandes.index')));
                    $event->commande->creatorUser->notify(new NewNotif(Str::limit($messageBodyCreator, 40), route('commandes.index')));

                    $message = '📬 La commande a été livrée.';
                    $content = $this->getContentMessage($event->commande, $message, $subject);

                    $event->commande->conversation->messages()->create([
                        'user_id' => auth()->id(),
                        'content' => $content,

                    ]);

                    break;

                case 'expediee':

                    $subject = "Commande Expediée";
                    $messageBodyRecever = "{$event->commande->creatorUser->name} a expedié la commande qu'il a créé en votre nom.";
                    $messageBodyCreator = "Vous avez expedié la commande de {$event->commande->receverUser->name}";
                    Mail::to($event->commande->receverUser)->send(new CommandeAlerteMail($subject, $messageBodyRecever, $event->commande));
                    Mail::to($event->commande->creatorUser)->send(new CommandeAlerteMail($subject, $messageBodyCreator, $event->commande));

                    $event->commande->receverUser->notify(new NewNotif(Str::limit($messageBodyRecever, 40), route('commandes.index')));
                    $event->commande->creatorUser->notify(new NewNotif(Str::limit($messageBodyCreator, 40), route('commandes.index')));

                    $message = '📦 Commande expédiée. Elle est en cours de livraison.';
                    $content = $this->getContentMessage($event->commande, $message, $subject);

                    $event->commande->conversation->messages()->create([
                        'user_id' => auth()->id(),
                        'content' => $content,

                    ]);

                    break;

                case 'recue':

                    $subject = "Commande Reçue";
                    $messageBodyRecever = "Vous avez reçu la commande de {$event->commande->creatorUser->name}.";
                    $messageBodyCreator = "{$event->commande->receverUser->name}a bien reçu votre commande";
                    Mail::to($event->commande->receverUser)->send(new CommandeAlerteMail($subject, $messageBodyRecever, $event->commande));
                    Mail::to($event->commande->creatorUser)->send(new CommandeAlerteMail($subject, $messageBodyCreator, $event->commande));

                    $event->commande->receverUser->notify(new NewNotif(Str::limit($messageBodyRecever, 40), route('commandes.index')));
                    $event->commande->creatorUser->notify(new NewNotif(Str::limit($messageBodyCreator, 40), route('commandes.index')));

                    $message = '✔️ Réception de la commande confirmée.';
                    $content = $this->getContentMessage($event->commande, $message, $subject);

                    $event->commande->conversation->messages()->create([
                        'user_id' => auth()->id(),
                        'content' => $content,

                    ]);

                    break;

                default:
                    $subject = "Mise à jour sur votre commande";
                    $messageBody = "Votre commande a été mise à jour. Consultez la plateforme pour plus de détails.";

                    Mail::to([$event->commande->receverUser, $event->commande->creatorUser])->send(new CommandeAlerteMail($subject, $messageBody, $event->commande));

                    $event->commande->receverUser->notify(new NewNotif(Str::limit($messageBody, 40), route('commandes.index')));
                    $event->commande->creatorUser->notify(new NewNotif(Str::limit($messageBody, 40), route('commandes.index')));
            }
        } else {

            $total = $event->data['kg_commande'] * $event->data['price'];


            $commande = Commande::create([
                'name' => now() . '_' . Annonce::findOrFail($event->data['annonce_id'])->title,
                'annonce_id' => $event->data['annonce_id'],
                'creator_id' => auth()->id(),
                'status' => 'creee',
                'recever_id' => (int)$event->data['recever_id'],
                'kg_commande' => $event->data['kg_commande'],
                'conversation_id'  => $event->data['conversation_id'],
                'price' => $event->data['price'],
                'total' => $total,
            ]);

            $commande->commande_no = 'CMD000' . $commande->id;
            $commande->save();

            $annonce = $commande->annonce;
            $annonce->travelerUser()->associate($commande->creatorUser);
            $annonce->senderUser()->associate($commande->receverUser);
            $annonce->save();

            if ($annonce->kg_restant !== null && $annonce->kg_restant >= $commande->kg) {
                $annonce->kg_restant -= (int) $commande->kg_commande;
                $annonce->save();
            } else {

                throw new \Exception('Poids insuffisant dans l\'annonce');
            }

            $conversation = Conversation::findOrFail($event->data['conversation_id']);

            $message = '🟡 La commande a été créée et est en attente de validation.';

            $conversation->messages()->create([
                'user_id' => auth()->id(),
                'content' => $this->getContentMessage($commande, $message, 'Nouvelle commande dispo'),
            ]);

            $subject = "Nouvelle commande";
            $messageBodyRecever = "Une nouvelle commande a été créé en votre nom par {$commande->creatorUser?->name}.";
            $messageBodyCreator = "Vous avez créé une nouvelle commande au nom de {$commande->receverUser?->name}";

            Mail::to($commande->receverUser)->send(new CommandeAlerteMail($subject, $messageBodyRecever, $commande));
            Mail::to($commande->creatorUser)->send(new CommandeAlerteMail($subject, $messageBodyCreator, $commande));

            $commande->receverUser->notify(new NewNotif(Str::limit($messageBodyRecever, 40), route('commandes.index')));
            $commande->creatorUser->notify(new NewNotif(Str::limit($messageBodyCreator, 40), route('commandes.index')));
        }
    }


    public function getContentMessage(Commande $commande, string $message, string $subject)
    {

        $userId = auth()->user()->id;
        $creatorId = $commande->creatorUser->id;
        $status = $commande->status;
        $formHtml = '';


        // Sécurité XSS
        $subject = htmlspecialchars($subject, ENT_QUOTES, 'UTF-8');
        $message = nl2br(htmlspecialchars($message, ENT_QUOTES, 'UTF-8'));

        $route =  route('commandes.index') ;


        $content = <<<HTML
        <div class="card border-0 mb-5">
            <div class="card-body">
                <div class="row gx-5">
                    <div class="col-auto">
                    </div>
                    <div class="col">
                        <div class="d-flex align-items-center mb-2">
                            <h5 class="me-auto mb-0">
                                {$subject}
                            </h5>
                            <!-- <span class="extra-small text-muted ms-2">08:45 PM</span> -->
                        </div>
                        <div class="d-flex">
                            <div class="me-auto">
                                {$message}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <div class="row gx-4">
                    <!-- {$formHtml} -->
                    <div class="col">
                        <a href="{$route}" class="btn btn-sm btn-primary w-100">Voir les commandes</a>
                    </div>
                </div>
            </div>
        </div>
    HTML;

        return $content;
    }

    private function generateForm(string $route, string $newStatus, string $label): string
    {
        return <<<HTML
        <div class="col" >
            <form action="{$route}" method="POST">
                <input type="hidden" name="_token" value="{$this->getCsrfToken()}">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="status" value="{$newStatus}">
                <button class="btn btn-sm btn-primary w-100" >
                    {$label}
                </button>
            </form>
        </div>
    HTML;
    }

    private function getCsrfToken(): string
    {
        return csrf_token();
    }
}
