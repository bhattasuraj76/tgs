<?php

namespace App\Observers;

use App\Models\Permission;
use App\Models\Log;
use App\Traits\ObserverHelper;

class PermissionObserver
{
    use ObserverHelper;

    public function __construct()
    {
        $this->data['module'] = 'Permission';
        $this->data['email'] = $this->getEmail();
    }

    public function updated(Permission $item)
    {
        $this->data['subject'] = $this->getSubject($this->data['module'], $item, "updated");
        Log::create($this->data);
    }
}
