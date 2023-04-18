<?php

namespace App\Notifications;

use App\Models\CouponCode;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendCouponCodeNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(User $user, CouponCode $coupon_code)
    {
		$this->user = $user;
        $this->coupon_code = $coupon_code;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
			        ->greeting('Ciao, ' . $this->user->first_name)
			        ->line('Grazie per aver acquistato su ' . env('APP_NAME'))
			        ->line('Ecco il codice che hai acquistato:')
	                ->line($this->coupon_code->coupon->brand->name . ': ' . $this->coupon_code->code);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
