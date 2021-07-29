<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPassword extends Notification
{
    use Queueable;

    public $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Badilisha neno la siri')
            ->line('Unapokea barua pepe hii kwa kua tumepokea ombi la kubadili neno la siri.')
            ->action('Badili Neno la siri', url('password/reset', $this->token))
            ->line('kiungo hiki cha kubadili neno la siri kitakwisha muda waake baada ya dakika 60')
            ->line('Kama hukuhitaji kubadili neno la siri, hakuna hatua inayohitajika tena.');
    }
}
