<?php

namespace App\Observers;

use App\Models\Setting;
use App\Models\Log;
use App\Traits\ObserverHelper;

class SettingObserver
{
    use ObserverHelper;

    public function __construct()
    {
        $this->data['module'] = 'Setting';
        $this->data['email'] = $this->getEmail();
    }

    public function created(Setting $item)
    {
        $this->data['subject'] = $this->getSubject($this->data['module'], $item, "updated");
        Log::create($this->data);
    }

    public function updated(Setting $item)
    {
        $this->data['subject'] = $this->getSubject($this->data['module'], $item, "updated");
        Log::create($this->data);
    }

    public function deleted(Setting $item)
    {
        $this->data['subject'] = $this->getSubject($this->data['module'], $item, "deleted");
        Log::create($this->data);
    }
}
