<?php

namespace App\Events;

use App\Models\Livre;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class LivreModifie
{
    use Dispatchable, SerializesModels;

    public $livre, $action, $details;

    public function __construct(Livre $livre, $action, $details = [])
    {
        $this->livre = $livre;
        $this->action = $action;
        $this->details = $details;
    }
}
