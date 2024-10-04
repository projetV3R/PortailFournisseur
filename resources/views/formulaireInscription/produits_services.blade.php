@vite(['resources/css/app.css', 'resources/js/app.js'])

@extends('layouts.app')

@section('title', 'ProduitService')

@section('contenu')
    <form action="{{ route('StoreProduitsServices') }}" method="post">
        @csrf
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 p-8 lg:p-16">
            <!-- Première colonne -->
            <div>
                <h6 class="font-Alumni font-bold text-3xl md:text-5xl">Produits et services</h6>
                <h1 class="font-Alumni font-semibold text-md md:text-lg mt-2">Parler nous des services que vous offrez</h1>

                <div class="bg-primary-100 py-8 px-4 mt-8">
                    <h4 class="font-Alumni font-bold text-lg md:text-2xl underline">Produits et services</h4>

                    <div class="mt-6 w-full max-w-md">
                        <label for="recherche" class="block font-Alumni text-md md:text-lg mb-2">
                            En peu de mots décrivez vos produits ou services
                        </label>

                        <div class="flex">
                            <input type="text" id="recherche" name="recherche"
                                placeholder="En peu de mots décrivez vos produits ou services"
                                class="font-Alumni w-full p-2 h-12 h-12focus:outline-none focus:border-blue-500 border border-black">

                            <div class="w-1/6 bg-tertiary-400 p-2 ml-4">

                            </div>
                        </div>

                        @error('recherche')
                            <span
                                class="font-Alumni text-lg flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>

                    <div id="toutLesProduitsServices">
                        @for ($i = 0; $i < 5; $i++)
                            <div class="bg-white cursor-pointer px-4 py-2 mt-8 w-full max-w-md mr-8 flex produitService"
                                data-index="{{ $i }}" id="produitService{{ $i }}">
                                <div>
                                    <h6 class="font-Alumni font-bold md:text-3xl">Services</h6>
                                    <h4 class="font-Alumni md:text-xl mt-2">Recherche et développement (R et D)</h4>
                                    <h1 class="font-Alumni italic md:text-lg">Services d'expérimentation ou de recherche sur
                                        les pêcheries</h1>
                                </div>

                                <div class="w-1/6 bg-tertiary-400 p-2 m-8">
                                    <p class="text-white text-5xl">+</p>
                                </div>
                            </div>
                        @endfor


                    </div>



                </div>
            </div>

            <!-- Deuxième colonne -->
            <div>
                <h6 class="font-Alumni text-white font-bold text-3xl md:text-5xl hide">Merci de vous identifier !</h6>
                <h1 class="font-Alumni text-white font-semibold text-md md:text-lg mt-2">Dites-nous en plus sur vous</h1>

                <div class="bg-secondary-100 py-8 px-4 mt-8">
                    <h4 class="font-Alumni font-bold text-lg md:text-2xl underline">Produits et service selectionnees</h4>

                    <div id="produitsServicesSelectionnees">
                        <div class="bg-white px-4 py-2 mt-8 w-full max-w-md mr-8 flex">
                            <div>
                                <h6 class="font-Alumni font-bold md:text-3xl">Services</h6>
                                <h4 class="font-Alumni md:text-xl mt-2">Recherche et développement (R et D)</h4>
                                <h1 class="font-Alumni italic md:text-lg">Services d'expérimentation ou de recherche sur
                                    les pêcheries</h1>
                            </div>

                            <div class="w-1/6 bg-tertiary-400 p-2 m-8">
                                <p class="text-white text-5xl">-</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6">
                        <label for="details" class="block font-Alumni text-md md:text-lg mb-2">
                            Details
                        </label>
                        <textarea id="details" name="details" placeholder="Entrer des détails supplémentaires"
                            class="font-Alumni w-full max-w-md p-2 h-28 focus:outline-none focus:border-blue-500 border border-black"></textarea>

                        @error('details')
                            <span
                                class="font-Alumni text-lg flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <button type="submit" class="mt-2 w-full text-white bg-tertiary-400 hover:bg-tertiary-300 py-2.5">
                        <h1 class="font-Alumni font-bold text-lg md:text-2xl">Suivant</h1>
                    </button>
                </div>
            </div>
        </div>

    </form>

    <script>
        document.querySelectorAll('.produitService').forEach(item => {
            item.addEventListener('click', (event) => {
                const index = event.currentTarget.getAttribute('data-index');
                console.log('Service avec index : ' + index + ' a été cliqué');

                // Sélectionner le div cible (où déplacer l'élément cloné)
                const targetDiv = document.getElementById('produitsServicesSelectionnees');

                // Cloner l'élément cliqué avec ses enfants
                const clonedItem = event.currentTarget.cloneNode(true);

                // Déplacer le clone dans le div cible
                targetDiv.appendChild(clonedItem);

                // Supprimer l'élément original
                event.currentTarget.remove();

                // Ajouter un événement click au clone pour le faire revenir
                clonedItem.addEventListener('click', () => {
                    // Vérifier si l'élément est déjà dans la zone d'origine
                    const originalDiv = document.querySelector('.produitService[data-index="' +
                        index + '"]');

                    if (!originalDiv) {
                        // Si l'élément original n'existe plus, on recrée un nouvel élément avec la même structure
                        const newOriginalDiv = document.createElement('div');
                        newOriginalDiv.className =
                            'bg-white cursor-pointer px-4 py-2 mt-8 w-full max-w-md mr-8 flex produitService';
                        newOriginalDiv.setAttribute('data-index', index);

                        // Ajouter le contenu de l'élément original
                        newOriginalDiv.innerHTML = `
                    <div>
                        <h6 class="font-Alumni font-bold md:text-3xl">Services</h6>
                        <h4 class="font-Alumni md:text-xl mt-2">Recherche et développement (R et D)</h4>
                        <h1 class="font-Alumni italic md:text-lg">Services d'expérimentation ou de recherche sur les pêcheries</h1>
                    </div>
                    <div class="w-1/6 bg-tertiary-400 p-2 m-8">
                        <p class="text-white text-5xl">+</p>
                    </div>
                `;

                        // Ajouter le nouvel élément à la zone d'origine
                        document.getElementById('toutLesProduitsServices').appendChild(
                            newOriginalDiv);

                        // Ajouter à nouveau l'événement de clic pour pouvoir le déplacer à nouveau
                        newOriginalDiv.addEventListener('click', (event) => {
                            const index = event.currentTarget.getAttribute('data-index');
                            console.log('Service avec index : ' + index +
                                ' a été cliqué à nouveau');

                            // Cloner et déplacer l'élément vers la zone cible
                            const clonedItem = event.currentTarget.cloneNode(true);
                            targetDiv.appendChild(clonedItem);

                            // Supprimer l'élément original
                            event.currentTarget.remove();
                        });
                    } else {
                        // Si l'élément original existe déjà, on le déplace à la zone d'origine
                        originalDiv.parentNode.appendChild(clonedItem);
                    }

                    // Supprimer l'élément cloné de la zone cible
                    clonedItem.remove();
                });
            });
        });
    </script>
@endsection
