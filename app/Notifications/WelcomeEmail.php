<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WelcomeEmail extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('Merci pour votre inscription !')
                    ->greeting('Bonjour,')
                    ->line('Merci de vous être inscrit pour collaborer avec la Ville de Trois-Rivières.')
                    ->line('Vous recevrez une réponse d\'ici quelques jours concernant l\'acceptation ou le refus de votre candidature.')
                    ->line('Pour toute question, veuillez contacter le service au citoyen au 311.')
                    ->line('Si votre candidature est acceptée, vous pourrez vous connecter avec les identifiants que vous avez enregistrés lors de votre inscription.')
                    ->line('Nous vous remercions pour votre intérêt et espérons collaborer avec vous dans le futur.')
                    ->line('Bonne journée et à bientôt !')
                    ->salutation('L\'équipe du service d\'approvisionnement de la Ville de Trois-Rivières.');
    }
    

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
