<x-layout>
<title>Home</title>

@vite(['resources/css/style1.css'])

<main id="mainhome">
<div id="hometext">
    <img src="images/cropped-logo%20UNEED-IT(notext).png">
    <p>
        <span class="white-text">voor al uw reparaties kunt u terecht bij </span>
        <span class="red-text">Uneed-</span>
        <span  class="blue-text">it</span>
        <br><br>
    </p>
    <br>
    <span class="call-to-action">
        <button class="click-me">
            <a href="/appointments">
                Boek nu een afspraak!
            </a>
        </button>
    </span>
</div>
</main>
<footer id="footer">
    <div id="adress">
        <img src="../../images/location.png">
        <p>ZUIDBAAN 514, 2841MD</p>
       <p> MOORDRECHT</p>
    </div>
    <div id="telefoonnnumer">
        <img src="../../images/phone.png">
        <p>+316 30 985 409 SERVICENUMMER</p>
        <p>+3118 28 202 18 KANTOOR </p>
        <p> BEREIKBAAR VAN 09:00-18:00</p>
    </div>
    <div id="tijd">
        <img src="../../images/clock.png">
        <p>MA T/M VRIJ, 09:00 - 23:00</p>
        <p>TELEFONISCH BEREIKBAAR</p>
        <p>VOOR ABONNEMENTHOUDERS</p>
    </div>
</footer>
</x-layout>
