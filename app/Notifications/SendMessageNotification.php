<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Event;
use App\Events\NotificationEvent;
use Auth;

class SendMessageNotification extends Notification
{
    use Queueable;
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
     * Set data format to database
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
         return [
                'user'=> [
                    'name' => Auth::user()->name,
                    'id' => Auth::id()
                ],
                'note' => '给你发送了一条私信',
            ];
    }
}
