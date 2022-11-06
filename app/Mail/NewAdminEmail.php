<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewAdminEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $email = '';
    protected $auth = '';
    protected $password = '';

    public function __construct($email_address, $provider_name, $generate_password)
    {
        $this->email = $email_address;
        $this->auth = $provider_name;
        $this->password = $generate_password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this ->subject('New Admin Access')->markdown('mail.new_admin_mail',[
            'auth' => $this->auth,
            'email' => $this->email,
            'password' => $this->password,
        ]);
    }
}
