<?php

namespace App\Notifications\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordNotification extends Notification
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
            ->subject(__('message.mail.reset.subject', ['app' => config('app.name')]))
            ->greeting(__('message.mail.reset.greeting'))
            ->line(__('message.mail.reset.line_one'))
            ->action(__('message.mail.reset.action'), route('admin.auth.password.reset', $this->token))
            ->line(__('message.mail.reset.line_two'));
    }
}