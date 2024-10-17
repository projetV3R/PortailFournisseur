@vite(['resources/css/app.css', 'resources/js/app.js'])

@extends('layouts.app')

@section('title', 'ProduitService')

@section('contenu')
<form id="produitsServicesForm" action="{{ route('StoreProduitsServices') }}" method="post"> 
    @csrf

    <!-- Texte qui doit s'afficher avant les deux boîtes -->
    <div class="text-center mt-8 mb-4">
        <h6 class="font-Alumni font-bold text-3xl md:text-5xl">Produits et services</h6>
        <h1 class="font-Alumni font-semibold text-md md:text-lg mt-2">
            Parlez-nous des services que vous offrez
        </h1>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 p-8 lg:p-8">

        <!-- Deuxième colonne (produits et services sélectionnés) -->
        <div class="order-1 lg:order-2">
            <div class="bg-secondary-100 py-8 px-4 mt-8">
                <h4 class="font-Alumni font-bold text-lg md:text-2xl underline">Produits et services sélectionnés</h4>

                <div id="produitsServicesSelectionnees" class="mt-8"></div>

                <div class="mt-6">
                    <label for="details" class="block font-Alumni text-md md:text-lg mb-2">Détails</label>
                    <textarea id="details" name="details"
                        class="font-Alumni w-full max-w-md p-2 h-28 focus:outline-none focus:border-blue-500 border border-black"
                        placeholder="Entrer des détails supplémentaires"></textarea>

                    @error('details')
                    <span class="font-Alumni text-lg text-red-500 mt-1 ml-1">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="mt-2 w-full bg-tertiary-400 hover:bg-tertiary-300 py-2.5 text-white">
                    <h1 class="font-Alumni font-bold text-lg md:text-2xl">Suivant</h1>
                </button>
            </div>
        </div>

        <!-- Première colonne (recherche) -->
        <div class="order-2 lg:order-1">
            <div class="bg-primary-100 py-8 px-4 mt-8">
                <h4 class="font-Alumni font-bold text-lg md:text-2xl underline">Produits et services</h4>

                <div class="mt-6 w-full max-w-md">
                    <label for="recherche" class="block font-Alumni text-md md:text-lg mb-2">
                        En peu de mots décrivez vos produits ou services
                    </label>

                    <div class="flex">
                        <input type="text" id="recherche" name="recherche"
                            placeholder="En peu de mots décrivez vos produits ou services"
                            class="font-Alumni w-full p-2 h-12 focus:outline-none focus:border-blue-500 border border-black">
                        <button type="button" class="cursor-pointer w-1/6 bg-tertiary-400 p-1 ml-4 flex items-center justify-center"
                            id="searchButton">
                            <span class="iconify text-white size-6" data-icon="material-symbols:search"></span>
                        </button>
                    </div>

                    <div id="toutLesProduitsServices" class="mt-8"></div>

                    <!-- Pagination -->
                    <div id="pagination" class="mt-4 flex justify-center"></div>

                    @error('recherche')
                    <span class="font-Alumni text-lg text-red-500 mt-1 ml-1">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const searchInput = document.getElementById('recherche');
        const searchButton = document.getElementById('searchButton');

        searchButton.addEventListener('click', () => performSearch());

        searchInput.addEventListener('input', () => {
            if (searchInput.value.length >= 3 || searchInput.value === '') {
                performSearch();
            }
        });

        performSearch(); 
    });

    function performSearch(page = 1) {
        const query = document.getElementById('recherche').value.trim();
        axios.get('/search', { params: { recherche: query, page } })
            .then(response => {
                afficherResultats(response.data.data);
                afficherPagination(response.data);
            })
            .catch(error => console.error("Erreur lors de la recherche :", error));
    }

    function afficherResultats(produits) {
        const resultsContainer = document.getElementById('toutLesProduitsServices');
        resultsContainer.innerHTML = produits.length
            ? produits.map(createProduitHTML).join('')
            : '<p class="font-Alumni text-md text-gray-600">Aucun produit ou service trouvé.</p>';
        assignClickEventsToProducts();
    }

    function afficherPagination(data) {
        const paginationContainer = document.getElementById('pagination');
        paginationContainer.innerHTML = `
            <button type="button" class="rounded-full bg-gray-300 p-2" 
                onclick="performSearch(${data.current_page - 1})" 
                ${!data.prev_page_url ? 'disabled' : ''}>
                Précédent
            </button>
            <span>Page ${data.current_page} sur ${data.last_page}</span>
            <button  type="button"  class="rounded-full bg-gray-300 p-2" 
                onclick="performSearch(${data.current_page + 1})" 
                ${!data.next_page_url ? 'disabled' : ''}>
                Suivant
            </button>`;
    }

    function createProduitHTML(produit) {
        return `
            <div class="bg-white cursor-pointer px-4 py-2 mt-8 w-full max-w-md mr-8 flex produitService"
                data-index="${produit.id}" data-unspsc="${produit.code_unspsc}">
                <div>
                    <h6 class="font-Alumni font-bold md:text-3xl">${produit.nature || 'Nature non disponible'}</h6>
                    <h4 class="font-Alumni md:text-xl mt-2">${produit.code_categorie || ''} - ${produit.categorie || ''}</h4>
                    <h1 class="font-Alumni italic md:text-lg">${produit.code_unspsc || ''} - ${produit.description || ''}</h1>
                </div>
                <div class="w-1/6 flex items-center justify-center bg-tertiary-400 p-2 m-8 rounded-full">
                    <span class="iconify size-8 lg:size-10 text-white" data-icon="material-symbols:add"></span>
                </div>
            </div>`;
    }

    function assignClickEventsToProducts() {
        document.querySelectorAll('.produitService').forEach(item => {
            item.addEventListener('click', () => cloneProduit(item));
        });
    }

    function cloneProduit(item) {
    const productUnspsc = item.getAttribute('data-unspsc');
    const targetDiv = document.getElementById('produitsServicesSelectionnees');

    // Vérifie si un clone existe déjà
    const existingClone = targetDiv.querySelector(`[data-unspsc="${productUnspsc}"].cloned`);
    if (existingClone) {
        afficherMessage("Ce produit est déjà dans la liste sélectionnée.");
        return; 
    }


    const clonedItem = item.cloneNode(true);
    clonedItem.classList.add('cloned'); 


    const iconContainer = clonedItem.querySelector('.iconify');
    const deleteIcon = document.createElement('span');
    deleteIcon.className = 'iconify size-8 lg:size-10 text-white';
    deleteIcon.setAttribute('data-icon', 'material-symbols:delete');

    iconContainer.replaceWith(deleteIcon);


    clonedItem.addEventListener('click', (e) => {
        e.stopImmediatePropagation(); 
        clonedItem.remove(); 
    });


    targetDiv.appendChild(clonedItem);
}


function afficherMessage(message) {
    const messageContainer = document.createElement('p');
    messageContainer.className = 'text-red-500 mt-2'; // Style du message
    messageContainer.textContent = message;

  
    const targetDiv = document.getElementById('produitsServicesSelectionnees');
    targetDiv.appendChild(messageContainer);


    setTimeout(() => messageContainer.remove(), 3000);
}







</script>
@endsection
