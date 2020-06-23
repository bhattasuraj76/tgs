<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Token;

class DashboardController extends Controller
{
    public function index(){
        $data['tokens'] = Token::latest()->whereDate('date', '>=', date('Y-m-d'))->take(20)->orderBy('date', 'asc')->paginate(10);
        return view('backend.dashboard', $data);
    }
}
