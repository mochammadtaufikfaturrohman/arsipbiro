<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;

class ResetPasswordNotification extends Notification
{
    /**
     * The password reset token.
     *
     * @var string
     */
    public $token;

    /**
     * Create a notification instance.
     *
     * @param  string  $token
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's channels.
     *
     * @param  mixed  $notifiable
     * @return array|string
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Build the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = url(route('password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false));
    
        return (new MailMessage)
            ->subject('Reset Password Arsip Kesra Jabar')
            ->greeting('Hallo!')
            ->line('Anda menerima email ini karena kami telah menerima permintaan untuk mengatur ulang kata sandi akun Anda.')
            ->action('Reset Password', $url)
            ->line('Tautan pengaturan ulang kata sandi ini akan kedaluwarsa dalam 60 menit.')
            ->line('Jika Anda tidak bermaksud mengatur ulang kata sandi, tidak ada tindakan lebih lanjut yang diperlukan.')
            ->salutation('Salam, Arsip Biro Kesra Jabar');
    }
}
