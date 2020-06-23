<?php

namespace App\Observers;

use App\Models\Page;
use App\Models\Log;
use App\Traits\ObserverHelper;

class PageObserver
{
    use ObserverHelper;

    public function __construct()
    {
        $this->data['module'] = 'Page';
        $this->data['email'] = $this->getEmail();
    }

    public function created(Page $item)
    {
        $this->data['subject'] = $this->getSubject($this->data['module'], $item, "created");
        Log::create($this->data);
    }

    public function updated(Page $item)
    {
        $this->data['subject'] = $this->getSubject($this->data['module'], $item, "updated");
        Log::create($this->data);
    }

    public function deleted(Page $item)
    {
        $this->data['subject'] = $this->getSubject($this->data['module'], $item, "deleted");
        Log::create($this->data);
    }
}
