<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome'); // Zorg ervoor dat er een home.blade.php bestand bestaat in resources/views
    }
}

