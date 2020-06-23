<?php

namespace App\Observers;

use App\Models\Role;
use App\Models\Log;
use App\Traits\ObserverHelper;

class RoleObserver
{
    use ObserverHelper;

    public function __construct()
    {
        $this->data['module'] = 'Role';
        $this->data['email'] = $this->getEmail();
    }

    public function created(Role $item)
    {
        $this->data['subject'] = $this->getSubject($this->data['module'], $item, "created");
        Log::create($this->data);
    }

    public function updated(Role $item)
    {
        $this->data['subject'] = $this->getSubject($this->data['module'], $item, "updated");
        Log::create($this->data);
    }

    public function deleted(Role $item)
    {
        $this->data['subject'] = $this->getSubject($this->data['module'], $item, "deleted");
        Log::create($this->data);
    }
}
