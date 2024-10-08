<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        return view('service'); // Zorg ervoor dat er een service.blade.php bestand bestaat
    }
}

