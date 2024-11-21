<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\ParametreSysteme;

class NotificationNouvelleFicheVille extends Notification
{
    use Queueable;
    protected $data;
    /**
     * Create a new notification instance.
     */
    public function __construct($data)
    {
        $this->data = $data; 
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
    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->greeting('Bonjour !')
            ->subject('Nouvelle inscription : ' . $this->data['nomEntreprise'])
            ->line('Une nouvelle inscription a été effectuée pour être ajoutée au bottin :')
            ->line('- Nom de l\'entreprise : ' . $this->data['nomEntreprise'])
            ->line('- Courriel de l\'entreprise : ' . $this->data['emailEntreprise'])
            ->line('- Date et heure : ' . $this->data['dateInscription'])
            ->line('- Inscription effectuée par : ' . $this->data['auteur'])
            ->line('Merci.')
            ->salutation('Portail fournisseur.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function routeNotificationForMail($notifiable)
    {
        return ParametreSysteme::where('cle', 'email_approvisionnement')->value('valeur');
    }
}
