<?php

namespace App\Mail;

use App\Models\MemoFile;
use App\Models\Memorandum;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MemoFileSent extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Memorandum $memorandum,\App\Models\MemoFileSent $memoSent,MemoFile $memoFile)
    {
        $this->memorandum = $memorandum;
        $this->memo_file_sent = $memoSent;
        $this->memo_file = $memoFile;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.memo-sent')->with([
            'file_name' => $this->memo_file->file_name,
            'property_title' => $this->memorandum->property_title,
            'first_name' => $this->memo_file_sent->first_name,
            'last_name' => $this->memo_file_sent->last_name,
            'email' => $this->memo_file_sent->email,
            'link_ref' => $this->memo_file_sent->link_ref,
        ])->subject('Memorandum Sent');
    }
}
