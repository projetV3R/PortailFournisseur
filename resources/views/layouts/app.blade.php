<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>@yield('title')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <script src="https://code.iconify.design/3/3.0.0/iconify.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  @vite('resources/css/app.css')
  <link rel="stylesheet" href="{{ asset('style.css') }}" />
  <link
    rel="shortcut icon"
    type="image/png"
    href="{{ asset('img/apple-icon-72x72.png') }}" />
    
</head>

<body class="flex flex-col min-h-screen">
<header>
    @yield('header')
  </header>
<body class="flex flex-col min-h-screen">
<header>
    @yield('header')
  </header>

  <main class="flex-1 ">
    @yield('contenu')
    
  </main>


  @yield('footer')
  <footer class="w-full font-Alumni text-sm md:text-base text-gray-600 ">
    <div class="bg-gray-200 flex justify-between p-4">
      <div></div><!--TODO: ne touche pas je suis importante -->
      <div class="flex flex-row">
        <div class="p-2 hidden sm:block">
          <a href="https://www.v3r.net/">
            <img class="h-20 w-20 md:h-15 md:w-15" src="https://www.v3r.net/wp-content/themes/v3r/Images/icons/logo-v3r-v2017.svg" alt="V3R Logo" />
          </a>
        </div>
        <div class="flex flex-col justify-start sm:justify-center gap-2">
          <div class="sm:hidden block flex gap-2 justify-center items-center">
            <a href="https://www.v3r.net/a-propos-de-la-ville/communications/infolettre">
              <span class="iconify size-8 sm:size-6" data-icon="mdi:email-newsletter" data-inline="false"></span>
            </a>
            <a href="https://www.facebook.com/villetroisrivieres" class="">
              <span class="iconify size-8 sm:size-6" data-icon="akar-icons:facebook-fill" data-inline="false"></span>
            </a>
            <a href="https://www.instagram.com/villedetroisrivieres/" class="">
              <span class="iconify size-8 sm:size-6" data-icon="bi:instagram" data-inline="false"></span>
            </a>
            <a href="https://www.linkedin.com/company/ville-de-trois-rivi-res" class="">
              <span class="iconify size-8 sm:size-6" data-icon="ri:linkedin-fill" data-inline="false"></span>
            </a>
            <a href="https://www.youtube.com/channel/UC4UyW0CoFiJaFCFaOzoQQ5w" class="">
              <span class="iconify size-8 sm:size-6" data-icon="fa:youtube" data-inline="false"></span>
            </a>
          </div>
          <div class="flex flex-col sm:text-center gap-1">
            <div class="sm:hover:bg-transparent bg-white sm:bg-gray-200 text-center sm:text-start p-2 sm:p-0 hover:bg-gray-100">
              <b>
                <h4>Ville de Trois-Rivières</h4>
              </b>
            </div>
            <div class="sm:hover:bg-transparent bg-white sm:bg-gray-200 text-center sm:text-start p-2 sm:p-0 hover:bg-gray-100">
              <a href="https://www.google.ca/maps/place/H%C3%B4tel+de+ville+de+Trois-Rivi%C3%A8res/@46.3430042,-72.545511,17z/data=!4m14!1m7!3m6!1s0x41aa0c6a9ae1712b:0xc5f7bf52c7282858!2sH%C3%B4tel+de+ville+de+Trois-Rivi%C3%A8res!8m2!3d46.3435631!4d-72.5429808!16s%2Fg%2F11bwpv19ny!3m5!1s0x41aa0c6a9ae1712b:0xc5f7bf52c7282858!8m2!3d46.3435631!4d-72.5429808!16s%2Fg%2F11bwpv19ny?entry=ttu&g_ep=EgoyMDI0MDkwNC4wIKXMDSoASAFQAw%3D%3D"
                class="hover:underline">
                1325, place de l'Hôtel-de-Ville, C.P.368 <br> Trois-Rivières, QC G9A 5H3
              </a>
            </div>
            <div class="sm:hover:bg-transparent bg-white sm:bg-gray-200 text-center sm:text-start p-2 sm:p-0 hover:bg-gray-100">
              <h4>
                <b>Téléphone:
                  <a href="tel:311" class="hover:underline">311</a>
                  ou
                  <a href="tel:8193742002" class="hover:underline me-4 md:me-6">819 374-2002</a>
                </b>
              </h4>
            </div>
            <div class="sm:hover:bg-transparent bg-white sm:bg-gray-200 text-center sm:text-start p-2 sm:p-0 hover:bg-gray-100">
              <a href="tel:18333742002" class="hover:underline ">Canada ou États-Unis: 1833 374-2002</a>
            </div>
            <div class="sm:hover:bg-transparent bg-white sm:bg-gray-200 text-center sm:text-start p-2 sm:p-0 hover:bg-gray-100">
              <a href="mailto:311@v3r.net" class="hover:underline me-4 md:me-6">Courriel: 311@v3r.net</a>
            </div>

            <div class="sm:hidden text-xs">
              <div class="flex justify-center text-gray-400">
                <a class="mx-2 hover:underline" href="https://www.v3r.net/a-propos-de-la-ville/communications">Communications</a> |
                <a class="mx-2 hover:underline" href="https://www.v3r.net/faq">FAQ</a> |
                <a class="mx-2 hover:underline" href="https://www.tourismetroisrivieres.com/fr">Tourisme</a>
              </div>
              <div class="flex justify-center text-gray-400">
                <a class="mx-2 hover:underline" href="https://www.v3r.net/politique-de-confidentialite" class="hover:underline">Politique de confidentialité</a>|
                <a class="mx-2 hover:underline" href="https://v3r.sharepoint.com/">Intranet</a>|
                <a class="mx-2 hover:underline" href="https://organismesv3r.net/" class="hover:underline">Portail d'accès aux organismes</a>
              </div>
              <div class="flex justify-center text-gray-400">© Ville de Trois-Rivières. Tous droit réservés.</div>
            </div>
          </div>
        </div>
      </div>
      <div>
        <div class="xl:flex justify-end hidden text-md w-fit text-gray-800 lg:justify-end">
          <div class="flex flex-col justify-end">
            <a href="https://www.v3r.net/a-propos-de-la-ville/communications" class="hover:underline font-alumni-sans-bold">>Communications</a>
            <a href="https://www.v3r.net/faq" class="hover:underline">>FAQ</a>
            <a href="https://www.tourismetroisrivieres.com/fr" class="hover:underline">>Tourisme</a>
          </div>
        </div>
      </div>


      <div class="hidden sm:block">
        <div class="flex flex-row justify-end text-small font-raleway text-gray-800 mb-4">
          <div class="flex">
            <a class="mx-2" href="https://www.v3r.net/a-propos-de-la-ville/communications/infolettre">
              <span class="iconify size-10 sm:size-8" data-icon="mdi:email-newsletter" data-inline="false"></span>
            </a>
            <a class="mx-2" href="https://www.facebook.com/villetroisrivieres" class="">
              <span class="iconify size-10 sm:size-8" data-icon="akar-icons:facebook-fill" data-inline="false"></span>
            </a>
            <a class="mx-2" href="https://www.instagram.com/villedetroisrivieres/" class="">
              <span class="iconify size-10 sm:size-8" data-icon="bi:instagram" data-inline="false"></span>
            </a>
            <a class="mx-2" href="https://www.linkedin.com/company/ville-de-trois-rivi-res" class="">
              <span class="iconify size-10 sm:size-8" data-icon="ri:linkedin-fill" data-inline="false"></span>
            </a>
            <a class="mx-2" href="https://www.youtube.com/channel/UC4UyW0CoFiJaFCFaOzoQQ5w" class="">
              <span class="iconify size-10 sm:size-8" data-icon="fa:youtube" data-inline="false"></span>
            </a>
          </div>
        </div>

        <div class="xl:hidden flex justify-end text-gray-400">
          <a class="mx-2 hover:underline" href="https://www.v3r.net/a-propos-de-la-ville/communications">Communications</a> |
          <a class="mx-2 hover:underline" href="https://www.v3r.net/faq">FAQ</a> |
          <a class="mx-2 hover:underline" href="https://www.tourismetroisrivieres.com/fr">Tourisme</a>
        </div>
        <div class="flex justify-end text-gray-400">
          <a class="mx-2 hover:underline" href="https://www.v3r.net/politique-de-confidentialite" class="hover:underline">Politique de confidentialité</a>|
          <a class="mx-2 hover:underline" href="https://v3r.sharepoint.com/">Intranet</a>|
          <a class="mx-2 hover:underline" href="https://organismesv3r.net/" class="hover:underline">Portail d'accès aux organismes</a>
        </div>
        <div class="flex justify-end text-gray-400">© Ville de Trois-Rivières. Tous droit réservés.</div>
      </div>
    </div>
    </div>
  </footer>

</body>

</html>

