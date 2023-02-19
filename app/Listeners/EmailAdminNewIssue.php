<?php

namespace App\Listeners;

use App\Events\IssueRaised;
use App\Mail\IssueRaisedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class EmailAdminNewIssue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(IssueRaised $event)
    {
        Mail::to($event->admin_email)->send(new IssueRaisedMail($event->tenant_email, $event->tenant_name, $event->issue_number, $event->unit_name, $event->issue_detail));
    }
}
