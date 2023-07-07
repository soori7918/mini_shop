<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Order;

class Mailer extends Mailable
{
    use Queueable, SerializesModels;


    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function build()
    {
        $order = $this->order;
        return $this->view('emails.email', compact('order'));
    }
}