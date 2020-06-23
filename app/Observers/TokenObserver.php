<?php

namespace App\Observers;

use App\Models\Token;
use App\Traits\ObserverHelper;
use App\Models\Log;

class TokenObserver
{
    use ObserverHelper;

    public function __construct()
    {
        $this->data['module'] = 'Token';
        $this->data['email'] = $this->getEmail();

    }

    public function created(Token $item)
    {
        $this->data['subject'] = $this->getSubject($this->data['module'], $item, "created");
        Log::create($this->data);
    }

    public function updated(Token $item)
    {
        $this->data['subject'] = $this->getSubject($this->data['module'], $item, "updated");
        Log::create($this->data);
    }

    public function deleted(Token $item)
    {
        $this->data['subject'] = $this->getSubject($this->data['module'], $item, "deleted");
        Log::create($this->data);
    }
}
