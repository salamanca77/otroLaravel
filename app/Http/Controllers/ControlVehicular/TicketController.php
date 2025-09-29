<?php

namespace App\Http\Controllers\ControlVehicular;

use App\Http\Controllers\Controller;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          return view('controlVehicular.dashboard');   

    }

}
