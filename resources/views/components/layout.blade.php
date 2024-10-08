<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="UNEED-IT is de plek waar u moet zijn voor al uw IT producten!">

    @vite(['resources/css/style1.css'])

</head>
<body>
<nav id="navbar">
    <div id="logonav">
        <img src="../../images/cropped-logo%20UNEED-IT.png">
    </div>
    <div id="logoptions">
        <ul>
            <li class="redc"> <a href="/">Home</a> </li>
            <li class="bluec"> <a href="{{ route('about') }}">Over ons</a></li>
            <li class="redc"> <a href="{{ route('service') }}">Service</a></li>
            <li class="bluec"> <a href="{{ route('appointments') }}">Boek een Afspraak</a></li>
            <li class="redc"> <a href="{{ route('faq') }}">Faq</a> </li>
            <li class="bluec"><a href="{{ route('bezorgdiensten') }}">Bezorgdiensten</a></li>

            @auth
                <li class="redc"> <a href="{{ route('logout') }}">Logout</a> </li>
            @endauth
        </ul>
    </div>
</nav>

<main>
    {{ $slot }}
</main>
