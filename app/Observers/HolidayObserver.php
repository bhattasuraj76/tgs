<?php

namespace App\Observers;

use App\Models\Holiday;
use App\Models\Log;
use App\Traits\ObserverHelper;

class HolidayObserver
{
    use ObserverHelper;

    public function __construct()
    {
        $this->data['module'] = 'Holiday';
        $this->data['email'] = $this->getEmail();

    }

    public function created(Holiday $item)
    {
        $this->data['subject'] = $this->getSubject($this->data['module'], $item, "created");
        Log::create($this->data);
    }

    public function updated(Holiday $item)
    {
        $this->data['subject'] = $this->getSubject($this->data['module'], $item, "updated");
        Log::create($this->data);
    }

    public function deleted(Holiday $item)
    {
        $this->data['subject'] = $this->getSubject($this->data['module'], $item, "deleted");
        Log::create($this->data);
    }
}
