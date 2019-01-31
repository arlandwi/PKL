<?php

namespace Illuminate\Auth\Events;

use Illuminate\Queue\SerializesModels;

class Registeredskpd
{
    use SerializesModels;

    /**
     * The authenticated user.
     *
     * @var \Illuminate\Contracts\Auth\Authenticatable
     */
    public $skpd;

    /**
     * Create a new event instance.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @return void
     */
    public function __construct($skpd)
    {
        $this->skpd = $skpd;
    }
}
