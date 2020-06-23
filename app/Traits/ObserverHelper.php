<?php

namespace App\Traits;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

trait ObserverHelper
{
    public function getSubject($module = " ", $item, $verb = " ")
    {
        return $module . " of  id " . $item->id . " " . $verb . " at " .  Carbon::now()->format('F j, Y, g:i a');
    }

    public function getEmail()
    {
        return Auth::guard('employee')->check() ? Auth::guard('employee')->user()->email : 'N/A';
    }
}
