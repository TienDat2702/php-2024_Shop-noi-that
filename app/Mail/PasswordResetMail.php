<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordResetMail extends Mailable
{
    use Queueable, SerializesModels;

    public $introLines;
    public $outroLines;
    public $actionText;
    public $actionUrl;

    public function __construct($introLines, $outroLines, $actionText, $actionUrl)
    {
        $this->introLines = $introLines;
        $this->outroLines = $outroLines;
        $this->actionText = $actionText;
        $this->actionUrl = $actionUrl;
    }

    public function build()
    {
        return $this->view('emails.password_reset')
                    ->with([
                        'introLines' => $this->introLines,
                        'outroLines' => $this->outroLines,
                        'actionText' => $this->actionText,
                        'actionUrl' => $this->actionUrl,
                    ]);
    }
}
