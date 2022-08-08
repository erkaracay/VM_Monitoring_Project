<?php

namespace App\Mail;

use App\Models\User;
use App\Models\Server;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ServerUnclaimed extends Mailable
{
    use Queueable, SerializesModels;

    public User $user;
    public Server $server;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $server)
    {
        $this->user = $user;
        $this->server = $server;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('test@mail.com')->subject('Server Claimed!')->markdown("emails.serverUnClaimed");
    }
}
