<?php

namespace App\Notifications;

use App\Reponse;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NouvelleReponse extends Notification
{
    public $reponse;
    public $principal;
    public $conjoint;

    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(array $reponse)
    {
        $this->reponse = $reponse;
        $this->principal = $reponse['principal'];
        $this->conjoint = $reponse['conjoint'] ?? false;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable) : MailMessage
    {
        $message = (new MailMessage)
            ->subject("Quelqu'un a répondu au formulaire !")
            ->greeting("Coucou {$notifiable->name},")
            ->line("{$this->principal->nom_complet} a répondu **_{$this->principal->presence}_**.");

        if( $this->principal->remarque ) {
            $message->line("{$this->principal->nom_complet} ajoute que **_{$this->principal->remarque}_**.");
        }

        if( $this->conjoint ) {
            $message->line("{$this->principal->nom_complet} sera accompagné/e de {$this->conjoint->nom_complet}.");
        }

        return $message;
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
