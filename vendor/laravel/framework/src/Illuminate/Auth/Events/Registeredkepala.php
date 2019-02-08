<?php

namespace Illuminate\Auth\Events;

use Illuminate\Queue\SerializesModels;

class Registeredkepala
{
    use SerializesModels;

    /**
     * The authenticated user.
     *
     * @var \Illuminate\Contracts\Auth\Authenticatable
     */
    public $kepala;

    /**
     * Create a new event instance.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @return void
     */
    public function __construct($kepala)
    {
        $this->kepala = $kepala;
    }
}
