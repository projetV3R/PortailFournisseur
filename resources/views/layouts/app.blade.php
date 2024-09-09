<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://code.iconify.design/3/3.0.0/iconify.min.js"></script>

  @vite('resources/css/app.css') 
  <link rel="stylesheet" href="{{ asset('style.css') }}">
  <link rel="shortcut icon" type="image/png" href="{{ asset('img/apple-icon-72x72.png') }}"/>
</head>

<body>
    <!-- HEADER -->
    <header>
         
    </header>

    @yield('contenu')

    <footer class="bg-gray-300 text-gray-500">
      @yield('footer')
      <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
        <div class="sm:flex sm:items-center sm:justify-between">
            <div class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
                <a href="https://www.v3r.net/" >
                    <img src="https://www.v3r.net/wp-content/themes/v3r/Images/icons/logo-v3r-v2017.svg" alt="V3R Logo" />
                </a>
                <ul>
                    <li>
                        <div class="text-larger font-raleway-bold">
                            <h4>Ville de Trois-Rivières</h4>
                        </div>
                    </li>
                    <li>
                        <div class="text-small font-raleway">
                            <a href="https://www.google.ca/maps/place/H%C3%B4tel+de+ville+de+Trois-Rivi%C3%A8res/@46.3430042,-72.545511,17z/data=!4m14!1m7!3m6!1s0x41aa0c6a9ae1712b:0xc5f7bf52c7282858!2sH%C3%B4tel+de+ville+de+Trois-Rivi%C3%A8res!8m2!3d46.3435631!4d-72.5429808!16s%2Fg%2F11bwpv19ny!3m5!1s0x41aa0c6a9ae1712b:0xc5f7bf52c7282858!8m2!3d46.3435631!4d-72.5429808!16s%2Fg%2F11bwpv19ny?entry=ttu&g_ep=EgoyMDI0MDkwNC4wIKXMDSoASAFQAw%3D%3D" class="hover:underline me-4 md:me-6">
                                1325, place de l'Hôtel-de-Ville, C.P.368 Trois-Rivières, QC G9A 5H3
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="text-small font-raleway">
                            <h4>
                                <b>
                                    Téléphone: 
                                    <a href="tel:311" class="hover:underline">311</a>
                                    ou
                                    <a href="tel:8193742002" class="hover:underline me-4 md:me-6">819 374-2002</a>
                                </b>
                            </h4>
                        </div>
                    </li>
                    <li>
                        <div class="text-small font-raleway">
                            <a href="tel:18333742002" class="hover:underline me-4 md:me-6">Canada ou États-Unis: 1833 374-2002</a>
                        </div>
                    </li>
                    <li>
                        <div class="text-small font-raleway">
                            <a href="mailto:311@v3r.net" class="hover:underline me-4 md:me-6">Courriel: 311@v3r.net</a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="flex flex-wrap items-center mb-6 text-sm text-small font-raleway">
            <ul class="">
                <li>
                    <a href="https://www.v3r.net/a-propos-de-la-ville/communications/infolettre" class="hover:underline">
                        <img class="" src="{{asset('../icones/email.png')}}" alt="infolettre">
                    </a>
                    <!--
                    <a href="#" class="hover:underline me-4 md:me-6">Facebook</a>
                    <a href="#" class="hover:underline me-4 md:me-6">Instagram</a>
                    <a href="#" class="hover:underline me-4 md:me-6">Indeed</a>
                    <a href="#" class="hover:underline me-4 md:me-6">Youtube</a>
-->
                </li>
                <li>
                    <span>
                        <a href="#" class="hover:underline">Communications</a> | 
                        <a href="#" class="hover:underline">FAQ</a> | 
                        <a href="#" class="hover:underline">Tourisme</a>
                    </span>
                </li>
                <li>
                    <span>
                        <a href="#" class="hover:underline">Intranet</a> | 
                        <a href="#" class="hover:underline">Portail d'accès aux organismes</a> | 
                        <a href="#" class="hover:underline">Politique de confidentialité</a>
                    </span>
                </li>
                <li>
                    <span>© Ville de Trois-Rivières. Tous droit réservés.</span>
                </li>
            </ul>
            </div>
        </div>
    </div>
    </footer>

</body>
</html>
