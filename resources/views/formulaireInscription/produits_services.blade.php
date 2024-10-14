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

                    <input type="text" id="recherche" name="recherche" class="font-Alumni" required>
                    <button type="submit" class="cursor-pointer w-1/6 bg-tertiary-400">Rechercher</button>

                    <div id="toutLesProduitsServices">
                        @foreach($produitsServices as $produit)
                        <div>
                            <h6>{{ $produit->nature }}</h6>
                            <h4>{{ $produit->code_categorie }} - {{ $produit->categorie }}</h4>
                            <h1>{{ $produit->code_unspsc }} - {{ $produit->description }}</h1>
                        </div>
                        @endforeach
                    </div>

                    <!-- 
                    <div class="flex">
                        <form onsubmit="event.preventDefault(); performSearch();">
                            <input type="text" id="recherche" name="recherche"
                                placeholder="En peu de mots décrivez vos produits ou services"
                                class="font-Alumni w-full p-2 h-12 focus:outline-none focus:border-blue-500 border border-black">

                            <div class="cursor-pointer w-1/6 bg-tertiary-400 p-1 ml-4 flex items-center justify-center">
                                <button type="submit">
                                    <span class="iconify text-white size-6" data-icon="material-symbols:search"></span>
                                </button>
                            </div>
                        </form>
                    </div>



                    @error('recherche')
                    <span
                        class="font-Alumni text-lg flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <div id="toutLesProduitsServices"></div>
                
                    @if($produitsServices->isEmpty())
                    <p class="font-Alumni text-md text-gray-600">Aucun produit ou service trouvé.</p>
                    @else
                    @foreach($produitsServices as $produit)
                    <div class="bg-white cursor-pointer px-4 py-2 mt-8 w-full max-w-md mr-8 flex produitService"
                        data-index="{{ $produit->id }}" data-active="true" id="produitService{{ $produit->id }}">
                        <div>
                            <h6 class="font-Alumni font-bold md:text-3xl">{{ $produit->nature }}</h6>
                            <h4 class="font-Alumni md:text-xl mt-2">{{ $produit->code_categorie }} - {{ $produit->categorie }}</h4>
                            <h1 class="font-Alumni italic md:text-lg">{{ $produit->code_unspsc }} - {{ $produit->description }}</h1>
                        </div>
                        <div class="w-1/6 flex items-center justify-center text-white bg-tertiary-400 p-2 m-8 rounded-full">
                            <span class="iconify size-8 lg:size-10" data-icon="material-symbols:add" data-inline="false"></span>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    -->

                    <script>
                        document.addEventListener('DOMContentLoaded', (event) => {
                            const searchInput = document.getElementById('recherche');

                            // Ajoute un écouteur d'événements sur l'input
                            searchInput.addEventListener('input', function() {
                                performSearch(); // Appelle la fonction de recherche à chaque fois que l'utilisateur tape
                            });
                        });

                        function performSearch() {
                            let query = document.getElementById('recherche').value.trim(); // Récupère la valeur et enlève les espaces

                            console.log("Recherche effectuée pour: ", query);
                            if (query.length >= 3) { // Requête uniquement si 3 caractères ou plus
                                axios.get('/search', {
                                        params: {
                                            recherche: query // Paramètre à envoyer avec la requête
                                        }
                                    })
                                    .then(function(response) {
                                        console.log("Réponse reçue", response.data); // Affiche la réponse dans la console

                                        let resultsContainer = document.getElementById('toutLesProduitsServices');
                                        console.log("Conteneur des résultats trouvé: ", resultsContainer);

                                        resultsContainer.innerHTML = ''; // Efface les résultats précédents

                                        if (response.data.length === 0) {
                                            resultsContainer.innerHTML = '<p class="font-Alumni text-md text-gray-600">Aucun produit ou service trouvé.</p>';
                                        } else {
                                            let content = ''; // Prépare le contenu
                                            response.data.data.forEach(function(produit) {
                                                let produitDiv = `
                                                <div>
                                                    <h6>${produit.nature || 'Nature non disponible'}</h6>
                                                    <p>${produit.code_categorie || 'Code catégorie non disponible'} - ${produit.categorie || 'Catégorie non disponible'}</p>
                                                </div>`;
                                                content += produitDiv; // Ajoute à la variable content
                                            });
                                            resultsContainer.innerHTML = content; // Affiche tout le contenu une seule fois
                                        }
                                    })
                                    .catch(function(error) {
                                        console.error("Erreur lors de la recherche :", error);
                                    });
                            } else {
                                document.getElementById('toutLesProduitsServices').innerHTML = ''; // Efface les résultats si moins de 3 caractères
                            }
                        }
                    </script>

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
                            <h6 class="font-Alumni font-bold md:text-3xl">Nature</h6>
                            <h4 class="font-Alumni md:text-xl mt-2">Recherche et développement (R et D)</h4>
                            <h1 class="font-Alumni italic md:text-lg">Services d'expérimentation ou de recherche sur
                                les pêcheries</h1>
                        </div>

                        <div
                            class="cursor-pointer w-1/6 flex items-center justify-center text-white  bg-tertiary-400 p-2 m-8 rounded-full">
                            <span class="iconify size-8 lg:size-10 hover:text-red-500"
                                data-icon="material-symbols:delete" data-inline="false"></span>
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
            const isActive = event.currentTarget.getAttribute('data-active') === 'true';
            const icon = event.currentTarget.querySelector('.iconify');

            const targetDiv = document.getElementById('produitsServicesSelectionnees');
            const originalDiv = document.getElementById('toutLesProduitsServices');

            if (isActive) {

                event.currentTarget.setAttribute('data-active', 'false');
                icon.setAttribute('data-icon',
                    'material-symbols:delete'); // Change l'icône en corbeille
                targetDiv.appendChild(event.currentTarget);
            } else {

                event.currentTarget.setAttribute('data-active', 'true');
                icon.setAttribute('data-icon', 'material-symbols:add'); // Rétablit l'icône en ajout
                originalDiv.appendChild(event.currentTarget);
            }
        });
    });
</script>




@endsection