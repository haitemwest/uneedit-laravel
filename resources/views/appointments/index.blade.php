<x-layout>
    <title>Afspraak</title>

    @vite(["resources/css/appointments/index.css"])

    @auth

    <script>window.location.href = "/appointments/dashboard"</script>

    @else

    <h1>HALLO NIET INGELOGD</h1>

    <div class="container">
    <div class="login-signup">
        <h1>Het lijkt erop dat u nog niet ingelogd bent.</h1>
        <button onclick="window.location.href='/appointments/login'">Log in</button>
        <button onclick="window.location.href='/register'">Registreer</button>
    </div>


    @endauth

</div>
</x-layout>