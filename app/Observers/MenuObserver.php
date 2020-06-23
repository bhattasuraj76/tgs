<?php

namespace App\Observers;

use App\Models\Menu;
use App\Models\Log;
use App\Traits\ObserverHelper;

class MenuObserver
{
    use ObserverHelper;

    public function __construct()
    {
        $this->data['module'] = 'Menu';
        $this->data['email'] = $this->getEmail();
    }

    public function created(Menu $item)
    {
        $this->data['subject'] = $this->getSubject($this->data['module'], $item, "created");
        Log::create($this->data);
    }

    public function updated(Menu $item)
    {
        $this->data['subject'] = $this->getSubject($this->data['module'], $item, "updated");
        Log::create($this->data);
    }

    public function deleted(Menu $item)
    {
        $this->data['subject'] = $this->getSubject($this->data['module'], $item, "deleted");
        Log::create($this->data);
    }

}
