<?php

namespace App\Observers;

use App\Models\User;
use App\Models\Log;
use App\Traits\ObserverHelper;

class UserObserver
{
    use ObserverHelper;

    public function __construct()
    {
        $this->data['module'] = 'User';
        $this->data['email'] = $this->getEmail();

    }

    public function created(User $item)
    {
        $this->data['subject'] = $this->getSubject($this->data['module'], $item, "created");
        Log::create($this->data);
    }

    public function updated(User $item)
    {
        $this->data['subject'] = $this->getSubject($this->data['module'], $item, "updated");
        Log::create($this->data);
    }

    public function deleted(User $item)
    {
        $this->data['subject'] = $this->getSubject($this->data['module'], $item, "deleted");
        Log::create($this->data);
    }
}
