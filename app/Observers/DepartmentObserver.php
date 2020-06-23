<?php

namespace App\Observers;

use App\Models\Department;
use App\Traits\ObserverHelper;
use App\Models\Log;

class DepartmentObserver
{
    use ObserverHelper;

    public function __construct()
    {
        $this->data['module'] = 'Department';
        $this->data['email'] = $this->getEmail();
    }

    public function created(Department $item)
    {
        $this->data['subject'] = $this->getSubject($this->data['module'], $item, "created");
        Log::create($this->data);
    }

    public function updated(Department $item)
    {
        $this->data['subject'] = $this->getSubject($this->data['module'], $item, "updated");
        Log::create($this->data);
    }

    public function deleted(Department $item)
    {
        $this->data['subject'] = $this->getSubject($this->data['module'], $item, "deleted");
        Log::create($this->data);
    }
}
