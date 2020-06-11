<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderMailer extends Mailable
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
        $dh_id = $this->data['donhang']['dh_id'];
        return $this->from(env('MAIL_FROM_ADDRESS', 'queanhst98@gmail.com'), env('MAIL_FROM_NAME', 'ex'))
            ->subject("Đơn hàng hoàn tất")
            ->view('emails.order-email')
            ->with('data', $this->data);    
        }
    }
