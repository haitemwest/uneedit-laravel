<x-layout>
    <title>Login</title>

    @vite(['resources/css/appointments/login.css'])

    <div class="container">
    <h1>Log in met uw email en wachtwoord</h1>
    <form action="/user/login" method="POST">
        @csrf
        <label for="email">Email:</label><br>
        <input type="email" name="email" id="email">
        <br>
        <label for="password">Wachtwoord:</label>
        <input type="password" name="password" id="password">
        <input type="submit" value="Inloggen">

    </form>
</div>

</x-layout>