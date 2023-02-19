<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class IssueRaised
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $admin_email, $tenant_email, $tenant_name, $issue_number, $unit_name, $issue_detail;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($admin_email, $tenant_email, $tenant_name, $issue_number, $unit_name, $issue_detail)
    {
        $this->admin_email = $admin_email;
        $this->tenant_email = $tenant_email;
        $this->tenant_name = $tenant_name;
        $this->issue_number = $issue_number;
        $this->unit_name= $unit_name;
        $this->issue_detail = $issue_detail;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
