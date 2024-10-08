<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        return view('about'); // Zorg ervoor dat er een about.blade.php bestand bestaat
    }
}

