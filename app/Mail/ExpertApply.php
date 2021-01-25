<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ExpertApply extends Mailable {
    use Queueable, SerializesModels;
    public $data;

    public function __construct($data) {
        $this->data = $data;
    }

    public function build() {
        $subject = 'Expert Application';
        
        return $this->markdown('emails.expert-apply')->subject($subject);

        // return $this->markdown('emails.contact-support')->from($address, $name)->replyTo($address, $name)->subject($subject);
    }
}
