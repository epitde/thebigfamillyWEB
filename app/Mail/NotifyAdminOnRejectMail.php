<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Arr;

class NotifyAdminOnRejectMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $response['user'] = $this->data['user'];
        $response['language'] = $this->data['language'];
        $response['translator'] = $this->data['translator'];

        return $this->view('emails.notify_admin_on_reject')
            ->subject('Translator has rejected response')
            ->with($response);
    }
}
