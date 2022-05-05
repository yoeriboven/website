<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\TelegramMessage;

class NewContactSubmission extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(public array $submission)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'telegram'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Name: '.$this->submission['name'])
                    ->line('Email: '.$this->submission['email'])
                    ->line($this->submission['description']);
    }

    /**
     * Get the telegram representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return TelegramMessage
     */
    public function toTelegram($notifiable)
    {
        $content = '*Name:* '.$this->submission['name'].PHP_EOL;
        $content .= '*Email:* '.$this->submission['email'].PHP_EOL;
        $content .= '*Message:* '.$this->submission['description'];

        return TelegramMessage::create()->content($content);
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
            //
        ];
    }
}
