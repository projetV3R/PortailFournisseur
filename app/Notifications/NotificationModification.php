<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\ParametreSysteme;

class NotificationModification extends Notification
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
     */
    public function via($notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
        ->greeting(('Bonjour !')) 
            ->subject('Notification de modification : ' . $this->data['sectionModifiee'])
            ->line("Une modification a été effectuée dans les informations de **{$this->data['sectionModifiee']}** pour la fiche fournisseur :")
            ->line('- Nom de l\'entreprise : ' . $this->data['nomEntreprise'])
            ->line('- Courriel de l\'entreprise : ' . $this->data['emailEntreprise'])
            ->line('- Date et heure : ' . $this->data['dateModification'])
            ->line('- Modification effectuée par : ' . $this->data['auteur'])
            ->line('Merci.')
            ->salutation('L\'équipe de gestion.');
    }

    /**
     * Détermine l'adresse e-mail pour la notification.
     */
    public function routeNotificationForMail($notifiable)
    {
       
        return ParametreSysteme::where('cle', 'email_approvisionnement')->value('valeur');
    }
}
