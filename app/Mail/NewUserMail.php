<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewUserMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $password;

    public function __construct(User $user, string $password)
    {
        $this->user = $user;
        $this->password = $password;
    }

    public function build()
    {
        return $this->from('hi@vascomm.id', 'VASCOMM')
                    ->subject('Your New Account')
                    ->view('email.new-user');
    }
}
