<?php
// app/Mail/StatusUpdated.php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StatusUpdated extends Mailable
{
    use Queueable, SerializesModels;

    public $admin;
    public $status;

    public function __construct($admin, $status)
    {
        $this->admin = $admin;
        $this->status = $status;
    }

    public function build()
    {
        return $this->view('emails.status_updated')
            ->subject('Your Status Has Been Updated')
            ->with([
                'adminName' => $this->admin->name,
                'status' => $this->status,
            ]);
    }
}
