<x-layout>
    <title>Registeren</title>

    @vite(['resources/css/appointments/login.css'])

    <div class="container">
    <h1>Registreer</h1>
    <form action="/user/register" method="post" enctype="multipart/form-data">
        @csrf
        <label for="firstname">Voornaam:</label>
        <input type="text" name="firstname" id="firstname">
        <br>
        <label for="lastname" id="lastname">Achternaam:</label>
        <input type="text" name="lastname" id="lastname">
        <label for="email">Email:</label><br>
        <input type="email" name="email" id="email">
        <label for="password">Wachtwoord:</label>
        <br>
        <input type="password" name="password" id="password">
        <input type="submit" value="Verzenden">

    </form>
</div>

</x-layout>