<?php

namespace App\Notifications\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WelcomeNotification extends Notification
{
    use Queueable;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject(__('message.mail.welcome.subject', ['app' => config('app.name')]))
            ->greeting(__('message.mail.welcome.greeting', ['name' => $this->data['name']]))
            ->line(__('message.mail.welcome.line_one', ['app' => config('app.name')]))
            ->line(__('message.mail.welcome.line_two'))
            ->action(__('message.mail.welcome.action'), route('admin.auth.password.reset', $this->data['token']))
            ->line(__('message.mail.welcome.line_three'));
    }
}