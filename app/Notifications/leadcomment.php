<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class leadcomment extends Notification
{
    use Queueable;

    public $comment_user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $comment_user)
    {
        $this->comment_user = $comment_user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Han commentado un lead al que sigues')
                ->greeting('Hola, ' . $notifiable->name)
                ->line('El Agente ' . $this->comment_user->name . ' comento un lead que sigues')
                ->action('Revisar el Comment', url('/Leads'))
                ->line('Gracias por formar parte de Vision')
                ->salutation('De parte de Visioncrm.');
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
            'comment_user' => $this->comment_user,
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage(
            [
                'user' => $this->toArray($notifiable),

            ]

        );
    }
}
