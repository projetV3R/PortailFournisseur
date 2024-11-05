@extends('layouts.app')

@section('title', 'Inscription Terminée')

@section('contenu')

    <div class="container mx-auto p-4">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-4 p-4">
            <div class="col-span-1 md:col-span-12 text-center mt-8 md:mt-24">
                <h1 class="text-2xl md:text-5xl font-bold font-Alumni">Inscription Terminée !</h1>
                <h6 class="mt-2 text-base md:text-lg font-Alumni">Merci de vous être inscrit. Vous allez être redirigé vers
                    la page de connexion dans <span id="countdown">5</span> secondes.</h6>
            </div>

            <div class="col-span-1 md:col-span-12 text-center mt-8">
                <!-- Bouton de secours pour redirection manuelle -->
                <a href="{{ route('login') }}" id="manual-redirect"
                    class="text-blue-600 hover:underline text-lg font-bold font-Alumni">
                    Si la redirection ne fonctionne pas, cliquez ici pour accéder à la page de connexion.
                </a>
            </div>
        </div>
    </div>

    <script>
        let countdown = 5;
        const countdownElement = document.getElementById('countdown');
        const manualRedirect = document.getElementById('manual-redirect');

        function updateCountdown() {
            countdownElement.innerText = countdown;
            countdown--;

            if (countdown < 0) {

                window.location.href = "{{ route('login') }}";
            }
        }
        setInterval(updateCountdown, 1000);
    </script>

@endsection
