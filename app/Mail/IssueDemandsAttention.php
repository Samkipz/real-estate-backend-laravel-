<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class IssueDemandsAttention extends Mailable
{
    use Queueable, SerializesModels;
    public $issue_number, $tenant_name, $unit_name, $issue_detail, $project_name ;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($issue_number, $tenant_name, $unit_name, $issue_detail, $project_name)
    {

        $this->tenant_name = $tenant_name;
        $this->issue_number = $issue_number;
        $this->unit_name= $unit_name;
        $this->issue_detail = $issue_detail;
        $this->project_name = $project_name;

    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'An Issue Demands Your Attention',
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
            view: 'view.issueDemandsAttention',
            with: [
                'tenant' => $this ->tenant_name,
                'issue_number' => $this ->issue_number,
                'unit_name' => $this->unit_name,
                'issue_body' => $this->issue_detail,
                'project'=>$this->project_name
            ],
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
}
