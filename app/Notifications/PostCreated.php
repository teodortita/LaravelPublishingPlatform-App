<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\User;

class PostCreated extends Notification
{
    use Queueable;

    protected $user;
    protected $post_id;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user, $post_id)
    {
        $this->user = $user;
        $this->post_id = $post_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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
            'user_id' => $this->user->id,
            'user_name' => $this->user->name,
            'post_id' => $this->post_id
        ];
    }
}
