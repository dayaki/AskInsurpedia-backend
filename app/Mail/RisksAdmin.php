<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RisksAdmin extends Mailable
{
    use Queueable, SerializesModels;
    public $data;

    public function __construct($data) {
        $this->$data = $data;
    }

    public function build() {
        $subject = 'Cover my risks enquiry';
        return $this->markdown('emails.risks-admin')->subject($subject);
    }
}
