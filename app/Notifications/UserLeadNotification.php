<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserLeadNotification extends Notification
{
    use Queueable;
    public $name;
    public $type;
    public $status;
    public $user_id;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($name,$type,$status,$user_id)
    {
        $this->name = $name;
        $this->status = $status??'approved';
        $this->user_id = $user_id;
        $this->type = $type;
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

    // /**
    //  * Get the mail representation of the notification.
    //  *
    //  * @param  mixed  $notifiable
    //  * @return \Illuminate\Notifications\Messages\MailMessage
    //  */
    // public function toMail($notifiable)
    // {
    //     return (new MailMessage)
    //                 ->line('The introduction to the notification.')
    //                 ->action('Notification Action', url('/'))
    //                 ->line('Thank you for using our application!');
    // }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
        'user_id' => $this->user_id,
       
        'message' => $this->name.' has pushed lead to '.$this->type.' and status is '.$this->status
        ];
    }
}
