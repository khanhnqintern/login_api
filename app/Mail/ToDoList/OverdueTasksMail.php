<?php

namespace App\Mail\ToDoList;

use App\Models\ToDoList\ToDoList;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OverdueTasksMail extends Mailable
{
    use Queueable, SerializesModels;

    public $task;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ToDoList $task)
    {
        $this->task = $task;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Overdue Tasks Mail',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'view.name',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }

    public function build()
    {
        return $this->subject('Notification of overdue work')
                    ->view('emails.overdue_tasks')
                    ->with(['task' => $this->task]);
    }
}
