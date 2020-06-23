<?php

namespace App\Observers;

use App\Models\Employee;
use App\Models\Log;
use App\Traits\ObserverHelper;

class EmployeeObserver
{
    use ObserverHelper;

    public function __construct()
    {
        $this->data['module'] = 'Employee';
        $this->data['email'] = $this->getEmail();
    }

    public function created(Employee $item)
    {
        $this->data['subject'] = $this->getSubject($this->data['module'], $item, "created");
        Log::create($this->data);
    }

    public function updated(Employee $item)
    {
        $this->data['subject'] = $this->getSubject($this->data['module'], $item, "updated");
        Log::create($this->data);
    }

    public function deleted(Employee $item)
    {
        $this->data['subject'] = $this->getSubject($this->data['module'], $item, "deleted");
        Log::create($this->data);
    }
}
