<?php

namespace App\Mail;

use App\Models\MemoFile;
use App\Models\Memorandum;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MemoFileGenerate extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(MemoFile $memoFile)
    {
        $this->memo_file = $memoFile;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $memorandum = Memorandum::find($this->memo_file->memorandum_id);
        return $this->view('mails.memo-generate')->with([
            'file_name' => $this->memo_file->file_name,
            'property_title' => $memorandum->property_title
        ])->subject('Memorandum Generation');
    }
}
