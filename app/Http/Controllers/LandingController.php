<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;

class LandingController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View
    {
        return View::make('landing');
    }
}
