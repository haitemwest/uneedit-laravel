<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeliveryServiceController extends Controller
{
    public function index()
    {
        return view('bezorgdiensten'); // Zorg ervoor dat er een bezorgdiensten.blade.php bestand bestaat
    }
}

