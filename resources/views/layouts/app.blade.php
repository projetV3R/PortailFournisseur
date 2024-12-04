<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <script src="https://code.iconify.design/3/3.0.0/iconify.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')


    <link rel="shortcut icon" type="image/png" href="https://upload.wikimedia.org/wikipedia/fr/thumb/c/ce/Logo_de_Trois-Rivi%C3%A8res_2022.png/600px-Logo_de_Trois-Rivi%C3%A8res_2022.png?20220917132718" />

</head>


<body class="flex flex-col min-h-screen dark:bg-gray-900 text-black dark:text-white  daltonien:bg-black-400">
    <header>
        @yield('header')

        <div class="flex w-full bg-tertiary-400 h-32 items-center justify-between p-4 relative">
            <div class="flex items-center">
                <a href="/">
                    <img class="bg-white w-24 h-20 lg:hidden cursor-pointer daltonien:hover:bg-daltonienYellow daltonien:hover:text-black"
                        src="https://upload.wikimedia.org/wikipedia/fr/thumb/c/ce/Logo_de_Trois-Rivi%C3%A8res_2022.png/600px-Logo_de_Trois-Rivi%C3%A8res_2022.png?20220917132718"
                        alt="Logo Trois-Rivières">
                </a>
            </div>
            <div class="hidden lg:flex absolute top-5 left-20 ">
                <a href="/">
                    <img class="w-36 h-36 bg-white shadow-lg daltonien:hover:bg-daltonienYellow daltonien:hover:text-black"
                        src="https://upload.wikimedia.org/wikipedia/fr/thumb/c/ce/Logo_de_Trois-Rivi%C3%A8res_2022.png/600px-Logo_de_Trois-Rivi%C3%A8res_2022.png?20220917132718"
                        alt="Logo Trois-Rivières Desktop">
                </a>
            </div>

            <div class="md:hidden flex items-center text-white gap-2">
                @auth
                <div>
                    <button id="menu-toggle">
                        <span class="iconify size-10 hover:animate-bounce daltonien:hover:bg-daltonienYellow daltonien:hover:text-black" data-icon="mdi:menu"
                            data-inline="false"></span>
                    </button>
                </div>
                @endauth


                <div>
                    <button id="dark-mode-toggle" class=" hover:animate-pulse daltonien:hover:bg-daltonienYellow daltonien:hover:text-black">
                        <span class="iconify size-10 " data-icon="circum:dark" data-inline="false"></span>
                    </button>
                </div>
                <div>
                    <button id="daltonien-mode-toggle" class="text-white hover:bg-green-300 hover:text-black daltonien:bg-daltonienYellow daltonien:text-black">
                        <span class="iconify size-10" data-icon="material-symbols:contrast" data-inline="false"></span>
                    </button>
                </div>

            </div>
            @auth
            <nav
                class="hidden md:flex justify-center w-full text-lg xl:text-2xl items-center gap-4 text-white dark:text-white">
                <a href="/"
                    class="hover:bg-green-300 hover:text-black p-2 transition duration-300 ease-in-out transform hover:shadow-lg daltonien:hover:bg-daltonienYellow daltonien:hover:text-black">Accueil</a>
                |

                <a href="/FicheFournisseur/profil"
                    class="hover:bg-green-300 hover:text-black p-2 transition duration-300 ease-in-out transform hover:shadow-lg daltonien:hover:bg-daltonienYellow daltonien:hover:text-black">Ma Fiche Fournisseur</a>

            </nav>
            @endauth
            <div class="hidden md:flex space-x-4 items-center">

                @auth
                
                
                   
                      
                        <div class="flex items-center space-x-4 ">
                            <form class="deconnexionBtn" action="{{ route('logout') }}" method="POST">
                                @csrf
                            <button class="ml-4 text-white  hover:animate-bounce daltonien:hover:bg-daltonienYellow daltonien:hover:text-black">
                                <span class="iconify size-10" data-icon="mdi:logout" data-inline="false"></span>
                            </button>
                    </form>
                @endauth

                <button id="dark-mode-toggle-desktop" class="text-white hover:animate-pulse daltonien:hover:bg-daltonienYellow daltonien:hover:text-black">
                    <span class="iconify  size-10" data-icon="circum:dark" data-inline="false"></span>
                </button>

                <button id="daltonien-mode-toggle-desktop" class="text-white hover:bg-green-300 hover:text-black daltonien:bg-daltonienYellow daltonien:text-black">
                    <span class="iconify size-8 lg:size-10" data-icon="material-symbols:contrast" data-inline="false"></span>
                </button>
            </div>
        </div>

        </div>
        <div id="mobile-menu"
            class="fixed inset-0 z-50 bg-tertiary-400 transform -translate-x-full transition-transform duration-300 md:hidden ">
            <div class="p-4 flex w-full h-full flex-col">

                <div class="flex items-center w-full">
                    <div class="flex justify-start w-full">
                        <a href="/dashboard">
                            <img class="bg-white w-28 h-28 cursor-pointer daltonien:hover:bg-daltonienYellow daltonien:hover:text-black"
                                src="https://upload.wikimedia.org/wikipedia/fr/thumb/c/ce/Logo_de_Trois-Rivi%C3%A8res_2022.png/600px-Logo_de_Trois-Rivi%C3%A8res_2022.png?20220917132718"
                                alt="Logo Trois-Rivières">
                        </a>
                    </div>
                    <!-- Bouton pour fermer le menu mobile -->
                    <div class="flex justify-end w-full">
                        <button id="close-menu" class="text-white justify-end ">
                            <span class="iconify size-10 hover:bg-red-600 daltonien:hover:bg-daltonienYellow daltonien:hover:text-black" data-icon="mdi:close"
                                data-inline="false"></span>
                        </button>
                    </div>
                </div>
                <!-- Liens de navigation pour mobile -->
                @auth
                <nav class="space-y-4 mt-4 text-white text-xl flex flex-col h-full">
                    <a href="/" class="block hover:bg-green-300 p-2 transition duration-300 flex items-center w-full"><span class="iconify size-10 hover:bg-green-300 daltonien:hover:bg-daltonienYellow daltonien:hover:text-black" data-icon="mdi:home" data-inline="false"></span>Accueil</a>


                    <a href="/FicheFournisseur/profil" class="block hover:bg-green-300 p-2 transition duration-300 flex items-center w-full"> <span class="iconify size-10 hover:bg-green-300 daltonien:hover:bg-daltonienYellow daltonien:hover:text-black" data-icon="mdi:user" data-inline="false"></span>Ma Fiche Fournisseur</a>


                    <!-- Bouton deconnexion pour mobile -->

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class=" text-white hover:bg-red-600 p-2 transition duration-300 flex items-center w-full">
                            <span class="iconify size-10" data-icon="mdi:logout" data-inline="false"></span> Déconnexion
                        </button>
                    </form>

                    <div class="flex h-full justify-center">
                        <div class="flex flex-col items-center justify-end text-xl w-full">
                            <div class="  flex gap-2 justify-center items-center">
                                <a href="https://www.v3r.net/a-propos-de-la-ville/communications/infolettre">
                                    <span class="iconify size-8 " data-icon="mdi:email-newsletter"
                                        data-inline="false"></span>
                                </a>
                                <a href="https://www.facebook.com/villetroisrivieres" class="">
                                    <span class="iconify size-8 " data-icon="akar-icons:facebook-fill"
                                        data-inline="false"></span>
                                </a>
                                <a href="https://www.instagram.com/villedetroisrivieres/" class="">
                                    <span class="iconify size-8 " data-icon="bi:instagram" data-inline="false"></span>
                                </a>
                                <a href="https://www.linkedin.com/company/ville-de-trois-rivi-res" class="">
                                    <span class="iconify size-8 " data-icon="ri:linkedin-fill"
                                        data-inline="false"></span>
                                </a>
                                <a href="https://www.youtube.com/channel/UC4UyW0CoFiJaFCFaOzoQQ5w" class="">
                                    <span class="iconify size-8 " data-icon="fa:youtube" data-inline="false"></span>
                                </a>
                            </div>
                            <span>© Ville de Trois-Rivières. Tous droits réservés.</span>
                        </div>
                    </div>
                </nav>
                @endauth
            </div>
        </div>
    </header>

    <main class="flex-1 ">
        @yield('contenu')

    </main>
    <script>
        @auth
        // Toogle menu mobile
        document.getElementById('menu-toggle').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.remove('-translate-x-full');
        });

        document.getElementById('close-menu').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.add('-translate-x-full');
        });
        @endauth

        // Fonction pour les deux boutons darkMode
        const toggleDarkMode = () => {
            const htmlElement = document.documentElement;
            if (htmlElement.classList.contains('dark')) {
                htmlElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            } else {
                htmlElement.classList.remove('daltonien');
                htmlElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            }
        };

        const toggleDaltonienMode = () => {
            const htmlElement = document.documentElement;
            if (htmlElement.classList.contains('daltonien')) {
                htmlElement.classList.remove('daltonien');
                localStorage.setItem('theme', 'light');
            } else {
                htmlElement.classList.remove('dark');
                htmlElement.classList.add('daltonien');
                localStorage.setItem('theme', 'daltonien');
            }
        };

        //mode dark
        document.getElementById('dark-mode-toggle').addEventListener('click', toggleDarkMode);
        document.getElementById('dark-mode-toggle-desktop').addEventListener('click', toggleDarkMode);

        // mode daltonien
        document.getElementById('daltonien-mode-toggle').addEventListener('click', toggleDaltonienMode);
        document.getElementById('daltonien-mode-toggle-desktop').addEventListener('click', toggleDaltonienMode);

        const savedTheme = localStorage.getItem('theme');
        if (savedTheme === 'dark') {
            document.documentElement.classList.add('dark');
            document.documentElement.classList.remove('daltonien');
        } else {
            document.documentElement.classList.remove('dark');
        }
        if (savedTheme === 'daltonien') {
            document.documentElement.classList.add('daltonien');
            document.documentElement.classList.remove('dark');
        } else {
            document.documentElement.classList.remove('daltonien');
        }

        function removeItemsLocalStorage() {
            localStorage.removeItem('selectedMenu');
        }
    </script>

    @yield('footer')
    <footer class="w-full font-Alumni text-sm md:text-base text-gray-600">
        <div class="bg-gray-200 flex justify-between p-8">
            <div  class="sm:hidden block flex justify-center"></div><!--TODO: ne touche pas je suis importante -->
            <div class="flex flex-row">
                <div class="p-2 hidden sm:block">
                    <a href="https://www.v3r.net/">
                        <img class="h-24 w-24 md:h-15 md:w-15 daltonien:bg-white daltonien:hover:bg-daltonienYellow daltonien:hover:text-black"
                            src="https://www.v3r.net/wp-content/themes/v3r/Images/icons/logo-v3r-v2017.svg"
                            alt="V3R Logo" />
                    </a>
                </div>
                <div class="flex flex-col justify-start text-xl sm:justify-center gap-2">
                    <div class="sm:hidden block flex gap-2 justify-center items-center">
                        <a href="https://www.v3r.net/a-propos-de-la-ville/communications/infolettre" class="daltonien:text-black daltonien:hover:bg-daltonienYellow daltonien:hover:text-black">
                            <span class="iconify size-8 sm:size-6" data-icon="mdi:email-newsletter"
                                data-inline="false"></span>
                        </a>
                        <a href="https://www.facebook.com/villetroisrivieres" class="daltonien:text-black daltonien:hover:bg-daltonienYellow daltonien:hover:text-black">
                            <span class="iconify size-8 sm:size-6" data-icon="akar-icons:facebook-fill"
                                data-inline="false"></span>
                        </a>
                        <a href="https://www.instagram.com/villedetroisrivieres/" class="daltonien:text-black daltonien:hover:bg-daltonienYellow daltonien:hover:text-black">
                            <span class="iconify size-8 sm:size-6" data-icon="bi:instagram" data-inline="false"></span>
                        </a>
                        <a href="https://www.linkedin.com/company/ville-de-trois-rivi-res" class="daltonien:text-black daltonien:hover:bg-daltonienYellow daltonien:hover:text-black">
                            <span class="iconify size-8 sm:size-6" data-icon="ri:linkedin-fill"
                                data-inline="false"></span>
                        </a>
                        <a href="https://www.youtube.com/channel/UC4UyW0CoFiJaFCFaOzoQQ5w" class="daltonien:text-black daltonien:hover:bg-daltonienYellow daltonien:hover:text-black">
                            <span class="iconify size-8 sm:size-6" data-icon="fa:youtube" data-inline="false"></span>
                        </a>
                    </div>
                    <div class="flex flex-col sm:text-center  gap-1">
                        <div class="sm:hover:bg-transparent bg-white sm:bg-gray-200 text-center sm:text-start p-2 sm:p-0 hover:bg-gray-100 daltonien:text-black daltonien:hover:bg-daltonienYellow daltonien:hover:text-black">
                            <b>
                                <h4>Ville de Trois-Rivières</h4>
                            </b>
                        </div>
                        <div
                            class="sm:hover:bg-transparent bg-white sm:bg-gray-200 text-center sm:text-start p-2 sm:p-0 hover:bg-gray-100 daltonien:text-black daltonien:hover:bg-daltonienYellow daltonien:hover:text-black">
                            <a href="https://www.google.ca/maps/place/H%C3%B4tel+de+ville+de+Trois-Rivi%C3%A8res/@46.3430042,-72.545511,17z/data=!4m14!1m7!3m6!1s0x41aa0c6a9ae1712b:0xc5f7bf52c7282858!2sH%C3%B4tel+de+ville+de+Trois-Rivi%C3%A8res!8m2!3d46.3435631!4d-72.5429808!16s%2Fg%2F11bwpv19ny!3m5!1s0x41aa0c6a9ae1712b:0xc5f7bf52c7282858!8m2!3d46.3435631!4d-72.5429808!16s%2Fg%2F11bwpv19ny?entry=ttu&g_ep=EgoyMDI0MDkwNC4wIKXMDSoASAFQAw%3D%3D"
                                class="hover:underline ">
                                1325, place de l'Hôtel-de-Ville, C.P.368 <br> Trois-Rivières, QC G9A 5H3
                            </a>
                        </div>
                        <div class="sm:hover:bg-transparent bg-white sm:bg-gray-200 text-center sm:text-start p-2 sm:p-0 hover:bg-gray-100 daltonien:text-black daltonien:text-black daltonien:hover:bg-daltonienYellow daltonien:hover:text-black">
                            <h4>
                                <b>Téléphone:
                                    <a href="tel:311" class="hover:underline">311</a>
                                    ou
                                    <a href="tel:8193742002" class="hover:underline me-4 md:me-6">819 374-2002</a>
                                </b>
                            </h4>
                        </div>
                        <div class="sm:hover:bg-transparent bg-white sm:bg-gray-200 text-center sm:text-start p-2 sm:p-0 hover:bg-gray-100 daltonien:text-black daltonien:hover:bg-daltonienYellow daltonien:hover:text-black">
                            <a href="tel:18333742002" class="hover:underline">Canada ou États-Unis: 1833 374-2002</a>
                        </div>
                        <div class="sm:hover:bg-transparent bg-white sm:bg-gray-200 text-center sm:text-start p-2 sm:p-0 hover:bg-gray-100 daltonien:text-black daltonien:hover:bg-daltonienYellow daltonien:hover:text-black">
                            <a href="mailto:311@v3r.net" class="hover:underline me-4 md:me-6">Courriel:
                                311@v3r.net</a>
                        </div>

                        <div class="sm:hidden text-xs">
                            <div class="flex justify-center text-gray-400">
                                <a class="mx-2 hover:underline daltonien:text-black daltonien:hover:bg-daltonienYellow daltonien:hover:text-black"
                                    href="https://www.v3r.net/a-propos-de-la-ville/communications">Communications</a> |
                                <a class="mx-2 hover:underline daltonien:text-black daltonien:hover:bg-daltonienYellow daltonien:hover:text-black" href="https://www.v3r.net/faq">FAQ</a> |
                                <a class="mx-2 hover:underline daltonien:text-black daltonien:hover:bg-daltonienYellow daltonien:hover:text-black"
                                    href="https://www.tourismetroisrivieres.com/fr">Tourisme</a>
                            </div>
                            <div class="flex justify-center truncate text-gray-400">
                                <a class="mx-2 hover:underline daltonien:text-black daltonien:hover:bg-daltonienYellow daltonien:hover:text-black"
                                    href="https://www.v3r.net/politique-de-confidentialite">Politique de confidentialité</a>|
                                <a class="mx-2 hover:underline daltonien:text-black daltonien:hover:bg-daltonienYellow daltonien:hover:text-black" href="https://v3r.sharepoint.com/">Intranet</a>|
                                <a class="mx-2 hover:underline daltonien:text-black daltonien:hover:bg-daltonienYellow daltonien:hover:text-black" href="https://organismesv3r.net/">Portail d'accès aux organismes</a>
                            </div>
                            <div class="flex justify-center text-gray-400 daltonien:text-black">© Ville de Trois-Rivières. Tous droit
                                réservés.</div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="xl:flex justify-end hidden text-xl text-gray-600 w-fit  lg:justify-end">
                    <div class="flex flex-col justify-end">
                        <a href="https://www.v3r.net/a-propos-de-la-ville/communications"
                            class="hover:underline font-alumni-sans-bold daltonien:text-black daltonien:hover:bg-daltonienYellow daltonien:hover:text-black">>Communications</a>
                        <a href="https://www.v3r.net/faq" class="hover:underline daltonien:text-black daltonien:hover:bg-daltonienYellow daltonien:hover:text-black">>FAQ</a>
                        <a href="https://www.tourismetroisrivieres.com/fr" class="hover:underline daltonien:text-black daltonien:hover:bg-daltonienYellow daltonien:hover:text-black">>Tourisme</a>
                    </div>
                </div>
            </div>


            <div class="hidden sm:block ">
                <div class="flex flex-row justify-end text-small font-raleway text-gray-800 mb-4">
                    <div class="flex">
                        <a class="mx-2 daltonien:text-black daltonien:hover:bg-daltonienYellow daltonien:hover:text-black" href="https://www.v3r.net/a-propos-de-la-ville/communications/infolettre">
                            <span class="iconify size-10 sm:size-8" data-icon="mdi:email-newsletter"
                                data-inline="false"></span>
                        </a>
                        <a class="mx-2 daltonien:text-black daltonien:hover:bg-daltonienYellow daltonien:hover:text-black" href="https://www.facebook.com/villetroisrivieres" class="">
                            <span class="iconify size-10 sm:size-8" data-icon="akar-icons:facebook-fill"
                                data-inline="false"></span>
                        </a>
                        <a class="mx-2 daltonien:text-black daltonien:hover:bg-daltonienYellow daltonien:hover:text-black" href="https://www.instagram.com/villedetroisrivieres/" class="">
                            <span class="iconify size-10 sm:size-8" data-icon="bi:instagram"
                                data-inline="false"></span>
                        </a>
                        <a class="mx-2 daltonien:text-black daltonien:hover:bg-daltonienYellow daltonien:hover:text-black" href="https://www.linkedin.com/company/ville-de-trois-rivi-res">
                            <span class="iconify size-10 sm:size-8" data-icon="ri:linkedin-fill"
                                data-inline="false"></span>
                        </a>
                        <a class="mx-2 daltonien:text-black daltonien:hover:bg-daltonienYellow daltonien:hover:text-black" href="https://www.youtube.com/channel/UC4UyW0CoFiJaFCFaOzoQQ5w">
                            <span class="iconify size-10 sm:size-8" data-icon="fa:youtube"
                                data-inline="false"></span>
                        </a>
                    </div>
                </div>

                <div class="xl:hidden flex justify-end text-gray-400">
                    <a class="mx-2 hover:underline daltonien:text-black daltonien:hover:bg-daltonienYellow daltonien:hover:text-black"
                        href="https://www.v3r.net/a-propos-de-la-ville/communications">Communications</a> |
                    <a class="mx-2 hover:underline daltonien:text-black daltonien:hover:bg-daltonienYellow daltonien:hover:text-black" href="https://www.v3r.net/faq">FAQ</a> |
                    <a class="mx-2 hover:underline daltonien:text-black daltonien:hover:bg-daltonienYellow daltonien:hover:text-black" href="https://www.tourismetroisrivieres.com/fr">Tourisme</a>
                </div>
                <div class="flex justify-end text-gray-400">
                    <a class="mx-2 hover:underline daltonien:text-black daltonien:hover:bg-daltonienYellow daltonien:hover:text-black" href="https://www.v3r.net/politique-de-confidentialite"
                        class="hover:underline daltonien:text-black daltonien:hover:bg-daltonienYellow daltonien:hover:text-black">Politique de confidentialité</a>|
                    <a class="mx-2 hover:underline daltonien:text-black daltonien:hover:bg-daltonienYellow daltonien:hover:text-black" href="https://v3r.sharepoint.com/">Intranet</a>|
                    <a class="mx-2 hover:underline daltonien:text-black daltonien:hover:bg-daltonienYellow daltonien:hover:text-black" href="https://organismesv3r.net/" class="hover:underline">Portail
                        d'accès aux organismes</a>
                </div>
                <div class="flex justify-end text-gray-400 daltonien:text-black">© Ville de Trois-Rivières. Tous droit réservés.</div>
            </div>
        </div>
        </div>
    </footer>




</body>

</html>