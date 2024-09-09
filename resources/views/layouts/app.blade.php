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
  <link rel="shortcut icon" type="image/png" href="{{ asset('img/apple-icon-72x72.png') }}" />
</head>

<body>
  <!-- HEADER -->
  <header>

  </header>

  @yield('contenu')
  @yield('footer')
  <footer class="bg-gray-200">
    <div class="flex flex-row w-full max-w-screen-xl">
      <div class="flex flex-col justify-self-start items-center w-1/2 m-5">
        <div class="flex justify-self-around">
          <a href="https://www.v3r.net/" class="mx-8">
            <img src="https://www.v3r.net/wp-content/themes/v3r/Images/icons/logo-v3r-v2017.svg" alt="V3R Logo" class="w-20 h-20"/>
          </a>
          <ul>
            <li>
              <div class="text-xl font-raleway-bold text-gray-500">
                <h4>Ville de Trois-Rivières</h4>
              </div>
            </li>
            <li>
              <div class="text-base font-raleway text-gray-400">
                <a class="mx-2" href="https://www.google.ca/maps/place/H%C3%B4tel+de+ville+de+Trois-Rivi%C3%A8res/@46.3430042,-72.545511,17z/data=!4m14!1m7!3m6!1s0x41aa0c6a9ae1712b:0xc5f7bf52c7282858!2sH%C3%B4tel+de+ville+de+Trois-Rivi%C3%A8res!8m2!3d46.3435631!4d-72.5429808!16s%2Fg%2F11bwpv19ny!3m5!1s0x41aa0c6a9ae1712b:0xc5f7bf52c7282858!8m2!3d46.3435631!4d-72.5429808!16s%2Fg%2F11bwpv19ny?entry=ttu&g_ep=EgoyMDI0MDkwNC4wIKXMDSoASAFQAw%3D%3D" class="hover:underline me-4 md:me-6">
                  1325, place de l'Hôtel-de-Ville, C.P.368 Trois-Rivières, QC G9A 5H3
                </a>
              </div>
            </li>
            <li>
              <div class="text-xl font-raleway text-gray-600">
                <h4>
                  <b>
                    Téléphone:
                    <a class="mx-1" href="tel:311" class="hover:underline">311</a>
                    ou
                    <a class="mx-1" href="tel:8193742002" class="hover:underline me-4 md:me-6">819 374-2002</a>
                  </b>
                </h4>
              </div>
            </li>
            <li>
              <div class="text-base font-raleway text-gray-400">
                <a class="mx-2" href="tel:18333742002" class="hover:underline me-4 md:me-6">Canada ou États-Unis: 1833 374-2002</a>
              </div>
            </li>
            <li>
              <div class="text-base font-raleway text-gray-400">
                <a class="mx-2" href="mailto:311@v3r.net" class="hover:underline me-4 md:me-6">Courriel: 311@v3r.net</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
      <div class="flex flex-col justify-self-end w-1/2 m-5 gap-4">
          <ul class="text-base font-raleway">
            <li>
              <div class="flex flex-row flex justify-end text-small font-raleway text-gray-600 mb-4">
                <a class="mx-2" href="https://www.v3r.net/a-propos-de-la-ville/communications/infolettre">
                  <span class="iconify size-10" data-icon="mdi:email-newsletter" data-inline="false"></span>
                </a>
                <a class="mx-2" href="https://www.facebook.com/villetroisrivieres" class="">
                  <span class="iconify size-10" data-icon="akar-icons:facebook-fill" data-inline="false"></span>
                </a>
                <a class="mx-2" href="https://www.instagram.com/villedetroisrivieres/" class="">
                  <span class="iconify size-10" data-icon="bi:instagram" data-inline="false"></span>
                </a>
                <a class="mx-2" href="https://www.linkedin.com/company/ville-de-trois-rivi-res" class="">
                  <span class="iconify size-10" data-icon="ri:linkedin-fill" data-inline="false"></span>
                </a>
                <a class="mx-2" href="https://www.youtube.com/channel/UC4UyW0CoFiJaFCFaOzoQQ5w" class="">
                  <span class="iconify size-10" data-icon="fa:youtube" data-inline="false"></span>
                </a>
              </div>
            </li>
            <li>
              <div class="flex justify-end text-gray-400 text-base">
                <a class="mx-2" href="https://www.v3r.net/a-propos-de-la-ville/communications" class="hover:underline">Communications</a> |
                <a class="mx-2" href="https://www.v3r.net/faq" class="hover:underline">FAQ</a> |
                <a class="mx-2" href="https://www.tourismetroisrivieres.com/fr" class="hover:underline">Tourisme</a>
              </div>
            </li>
            <li>
              <div class="flex justify-end text-gray-400 text-base">
                <a class="mx-2" href="https://v3r.sharepoint.com/" class="hover:underline">Intranet</a> |
                <a class="mx-2" href="https://organismesv3r.net/" class="hover:underline">Portail d'accès aux organismes</a> |
                <a class="mx-2" href="https://www.v3r.net/politique-de-confidentialite" class="hover:underline">Politique de confidentialité</a>
              </div>
            </li>
            <li>
              <div class="flex justify-end text-gray-400 text-sm">© Ville de Trois-Rivières. Tous droit réservés.</div>
            </li>
          </ul>
      </div>
    </div>
  </footer>
</body>

</html>