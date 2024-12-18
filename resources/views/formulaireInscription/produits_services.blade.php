@extends('layouts.app')

@section('title', 'ProduitService')

@section('contenu')

<form id="produitsServicesForm" action="{{ route('StoreProduitsServices') }}" method="post">
    @csrf
    <div class="flex w-full lg:flex-col flex-col gap-4 p-8 lg:p-16">
        <div class="flex w-full flex-col 2xl:flex-row gap-4">
            <div class="flex w-full flex-col">
                <h6 class="font-Alumni font-bold text-3xl md:text-5xl text-black dark:text-white">Produits et services</h6>
                <h1 class="font-Alumni font-semibold text-md md:text-lg mt-2 text-black dark:text-white">
                    Parlez-nous des services que vous offrez
                </h1>
            </div>
            @include('partials.progress_bar')
        </div>
        <!-- Conteneur principal -->
        <div class="flex w-full lg:flex-row flex-col gap-x-4">
            <!-- Colonne des produits non sélectionnés -->
            <div class="flex flex-col">
                @if (session('errors'))
                    <ul>
                        @foreach (session('errors')->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <div class="bg-primary-100 dark:bg-primary-dark-100 py-8 px-2 md:px-4 mt-8">
                    <div class="flex w-full">
                        <div class="justify-start flex w-full">
                            <h4 class="font-Alumni font-bold text-lg md:text-2xl underline text-black dark:text-white">Produits et services</h4>
                        </div>
                        <div class="flex justify-end items-end w-full font-bold">
                            <button type="button" id="unspscButton" class="flex items-center gap-x-1 text-black dark:text-white">
                                <span class="iconify size-6" data-icon="grommet-icons:help-book"></span>
                                <span class="hidden lg:block">UNSPSC</span>
                            </button>
                        </div>
                    </div>
                    <div class="mt-6 w-full flex flex-col">
                        <label for="recherche" class="block font-Alumni text-md md:text-lg mb-2 text-black dark:text-white">
                            En peu de mots décrivez vos produits ou services, le secteur ou le code UNSPSC
                        </label>
                        <div class="flex flex-col">
                            <input type="text" id="recherche"
                                placeholder="En peu de mots décrivez vos produits ou services"
                                class="font-Alumni w-full p-2 h-12 focus:outline-none focus:border-blue-500 border border-black dark:border-gray-600 dark:bg-gray-800 dark:text-white">
                            <select id="selectCategorie"
                                class="font-Alumni w-full p-2 h-12 focus:outline-none focus:border-blue-500 border border-black dark:border-gray-600 dark:bg-gray-800 dark:text-white">
                                <option value="" disabled selected>Choisissez une catégorie pour filtrer les produits et services</option>
                            </select>
                        </div>
                        <div id="pagination" class="mt-4 flex justify-center items-center gap-x-2"></div>

                        <div id="toutLesProduitsServices" class="grid grid-cols-2 gap-4 mt-4"></div>

                        @error('recherche')
                            <span class="font-Alumni text-lg text-red-500 mt-1 ml-1">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <!-- Colonne des produits sélectionnés -->
            <div class="bg-secondary-100 dark:bg-secondary-dark-100 py-10 px-8 mt-8 w-full lg:max-w-4xl mx-auto flex flex-col h-fit">
                <h4 class="font-Alumni font-bold text-lg md:text-2xl underline text-black dark:text-white">Produits et services sélectionnés</h4>

                <!-- Ajout du compteur -->
                <p id="selectedCount" class="font-Alumni text-md md:text-lg mt-2 text-black dark:text-white">Nombre de produits sélectionnés : 0</p>

                <!-- Conteneur de pagination pour les produits sélectionnés -->
                <div id="paginationSelected" class="mt-4 flex justify-center items-center gap-x-2 truncate"></div>

                <!-- Conteneur des produits sélectionnés -->
                <div id="produitsServicesSelectionnees" class="grid grid-cols-1 2xl:grid-cols-2 gap-4 mt-4"></div>

                @error('produits_services[]')
                    <span class="font-Alumni text-lg text-red-500 mt-1 ml-1">{{ $message }}</span>
                @enderror
                <div class="mt-6">
                    <label for="details_specifications" class="block font-Alumni text-md md:text-lg mb-2 text-black dark:text-white">Détails</label>
                    <textarea id="details_specifications" name="details_specifications"
                        class="font-Alumni w-full max-w-md p-2 h-28 focus:outline-none focus:border-blue-500 border border-black dark:border-gray-600 dark:bg-gray-800 dark:text-white"
                        placeholder="Entrer des détails supplémentaires"
                        oninput="updateCharacterCount(event)">{{ old('details_specifications', session('produitsServices.details_specifications')) }}</textarea>
                    <div class="text-black dark:text-white">
                        <span id="characterCount">0</span>/500 caractères
                    </div>

                    @error('details_specifications')
                        <span class="font-Alumni text-lg text-red-500 mt-1 ml-1">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit"
                    class="mt-4 w-full bg-tertiary-400 hover:bg-tertiary-300 dark:bg-tertiary-dark-400 dark:hover:bg-tertiary-dark-300 py-3 text-white daltonien:hover:bg-daltonienYellow daltonien:hover:text-black">
                    <h1 class="font-Alumni font-bold text-lg md:text-2xl">
                        {{ session()->has('produitsServices') ? 'Enregistrer' : 'Suivant' }}
                    </h1>
                </button>
            </div>
        </div>
    </div>
</form>


<script>
    let selectedProductIds = [];
    let selectedProducts = [];
    const itemsPerPageSelected = 10; // 2 colonnes x 5 lignes
    let currentPageSelected = 1;

    function performSearch(page = 1) {
        const query = document.getElementById('recherche').value.trim();
        const selectedCategory = document.getElementById('selectCategorie').value || null; // Gérer l'option vide

        axios.get('/search', { 
            params: { 
                recherche: query, 
                categorie: selectedCategory, 
                page 
            } 
        })
        .then(response => {
            afficherResultats(response.data.data);
            afficherPagination(response.data);
        })
        .catch(error => console.error("Erreur lors de la recherche :", error));
    }

    function updateCharacterCount(event) {
        const textarea = event.target;
        const counter = document.getElementById('characterCount');
        if (textarea && counter) {
            counter.textContent = textarea.value.length;
        }
    }

    function initializeCharacterCount() {
        const textarea = document.getElementById('details_specifications');
        const counter = document.getElementById('characterCount');
        if (textarea && counter) {
            counter.textContent = textarea.value.length;
        }
    }

    initializeCharacterCount();


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
            <!-- Vos boutons de pagination existants -->
            ${paginationButtons(data, 'performSearch')}
        `;
    }

    function paginationButtons(data, functionName) {
        return `
            <button type="button"
                class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-2 md:px-4 rounded-l
                daltonien:bg-daltonienBleu daltonien:text-black daltonien:hover:bg-daltonienYellow daltonien:hover:text-black
                ${!data.prev_page_url ? 'cursor-not-allowed' : ''}"
                onclick="${functionName}(1)" ${!data.prev_page_url ? 'disabled' : ''}>
                &lt;&lt;
            </button>
            <button type="button"
                class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-2 md:px-4 
                daltonien:bg-daltonienBleu daltonien:text-black daltonien:hover:bg-daltonienYellow daltonien:hover:text-black
                ${!data.prev_page_url ? 'cursor-not-allowed' : ''}"
                onclick="${functionName}(${data.current_page - 1})" ${!data.prev_page_url ? 'disabled' : ''}>
                <span class="md:hidden">&lt;</span>
                <span class="hidden md:inline">Précédente</span>
            </button>
            <span class="text-xs  font-bold mx-2">Page ${data.current_page} sur ${data.last_page}</span>
            <button type="button"
                class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-2 md:px-4
                daltonien:bg-daltonienBleu daltonien:text-black daltonien:hover:bg-daltonienYellow daltonien:hover:text-black
                ${!data.next_page_url ? 'cursor-not-allowed' : ''}"
                onclick="${functionName}(${data.current_page + 1})" ${!data.next_page_url ? 'disabled' : ''}>
                <span class="md:hidden">&gt;</span>
                <span class="hidden md:inline">Suivante</span>
            </button>
            <button type="button"
                class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-2 md:px-4 rounded-r
                daltonien:bg-daltonienBleu daltonien:text-black daltonien:hover:bg-daltonienYellow daltonien:hover:text-black
                ${!data.next_page_url ? 'cursor-not-allowed' : ''}"
                onclick="${functionName}(${data.last_page})" ${!data.next_page_url ? 'disabled' : ''}>
                &gt;&gt;
            </button>
        `;
    }

    function createProduitHTML(produit) {
    const isSelected = selectedProductIds.includes(produit.id);
    const iconHtml = isSelected
        ? '<span class="iconify size-4 md:size-8 lg:size-10 text-green-500" data-icon="material-symbols:check-circle"></span>'
        : '<span class="iconify size-4 md:size-8 lg:size-10 text-white dark:text-gray-400" data-icon="material-symbols:add"></span>';

    return `
        <div class="bg-white dark:bg-gray-800 cursor-pointer px-4 py-2 w-full flex flex-row produitService hover:bg-green-500 dark:hover:bg-green-700"
            data-index="${produit.id}" data-unspsc="${produit.code_unspsc}">
            <div class="flex flex-col w-full">
                <h6 class="font-Alumni text-xs font-bold md:text-3xl text-gray-800 dark:text-gray-200">${produit.nature || 'Nature non disponible'}</h6>
                <h4 class="font-Alumni text-xs md:text-xl mt-2 text-gray-600 dark:text-gray-300">${produit.code_categorie || ''}</h4>
                <h1 class="font-Alumni text-xs italic md:text-lg text-gray-500 dark:text-gray-400">${produit.code_unspsc || ''} - ${produit.description || ''}</h1>
            </div>
            <div class="flex flex-col items-end justify-start w-full">
                <div class="flex items-center justify-center bg-tertiary-400 dark:bg-tertiary-dark-400 md:p-2 rounded-full">
                    ${iconHtml}
                </div>
            </div>
        </div>`;
}


    function assignClickEventsToProducts() {
        document.querySelectorAll('.produitService').forEach(item => {
            item.addEventListener('click', () => cloneProduit(item));
        });
    }

    function cloneProduit(item) {
        const productId = parseInt(item.getAttribute('data-index'), 10);

        if (selectedProductIds.includes(productId)) {
            afficherMessage("Ce produit est déjà dans la liste sélectionnée.");
            return;
        }

        selectedProductIds.push(productId);
        updateHiddenInput();

        const produit = {
            id: productId,
            nature: item.querySelector('h6').textContent,
            code_categorie: item.querySelector('h4').textContent,
            code_unspsc: item.getAttribute('data-unspsc'),
            description: item.querySelector('h1').textContent,
        };
        ajouterProduitSelectionneVisuellement(produit);

    
        const iconElement = item.querySelector('.iconify');
        if (iconElement) {
            iconElement.setAttribute('data-icon', 'material-symbols:check-circle');
            iconElement.classList.remove('text-white');
            iconElement.classList.add('text-green-500');
        }
    }

    function ajouterProduitSelectionneVisuellement(produit) {
        selectedProducts.push(produit);
        afficherProduitsSelectionnes();
        updateSelectedCount(); 
    }

    function afficherProduitsSelectionnes() {
        const produitsServicesSelectionnees = document.getElementById('produitsServicesSelectionnees');

        if (selectedProducts.length === 0) {
            produitsServicesSelectionnees.innerHTML = '<p class="font-Alumni text-md text-gray-600">Aucun produit ou service sélectionné.</p>';
          
            document.getElementById('paginationSelected').innerHTML = '';
            return;
        }

        // S'assurer que currentPageSelected est au moins 1
        currentPageSelected = Math.max(currentPageSelected, 1);

        const startIndex = (currentPageSelected - 1) * itemsPerPageSelected;
        const endIndex = startIndex + itemsPerPageSelected;
        const produitsPage = selectedProducts.slice(startIndex, endIndex);

        produitsServicesSelectionnees.innerHTML = produitsPage.map(produit => createProduitSelectionneHTML(produit)).join('');
        assignClickEventsToSelectedProducts();

        afficherPaginationSelected();
    }

    function createProduitSelectionneHTML(produit) {
        return `
    <div class="bg-white dark:bg-gray-800 cursor-pointer px-4 py-2 w-full flex flex-row produitSelectionne hover:bg-red-500 dark:hover:bg-red-700"
        data-index="${produit.id}">
        <div class="flex flex-col w-full">
            <h1 class="font-Alumni text-xs italic md:text-lg text-gray-800 dark:text-gray-200">
                ${produit.code_unspsc || ''} - ${produit.description || ''}
            </h1>
        </div>
        <div class="flex flex-col items-end justify-start w-full">
            <div class="flex items-center justify-center bg-tertiary-400 dark:bg-tertiary-dark-400 md:p-2 rounded-full">
                <span class="iconify size-4 md:size-8 lg:size-10 text-white dark:text-gray-400" data-icon="material-symbols:delete"></span>
            </div>
        </div>
    </div>`;

    }

    function assignClickEventsToSelectedProducts() {
        document.querySelectorAll('.produitSelectionne').forEach(item => {
            item.addEventListener('click', (e) => {
                e.stopImmediatePropagation();
                const productId = parseInt(item.getAttribute('data-index'), 10);
                removeSelectedProduct(productId);
            });
        });
    }

    function afficherPaginationSelected() {
        const totalPages = Math.ceil(selectedProducts.length / itemsPerPageSelected);
        if (totalPages > 1) {
            const data = {
                current_page: currentPageSelected,
                last_page: totalPages,
                prev_page_url: currentPageSelected > 1 ? true : null,
                next_page_url: currentPageSelected < totalPages ? true : null
            };
            const paginationContainer = document.getElementById('paginationSelected');
            paginationContainer.innerHTML = `
                ${paginationButtons(data, 'changePageSelected')}
            `;
        } else {
            document.getElementById('paginationSelected').innerHTML = '';
        }
    }

    function changePageSelected(page) {
        currentPageSelected = page;
        afficherProduitsSelectionnes();
    }

    function removeSelectedProduct(productId) {
        selectedProductIds = selectedProductIds.filter(id => id !== productId);
        selectedProducts = selectedProducts.filter(produit => produit.id !== productId);
        updateHiddenInput();

        // Mettre à jour l'icône dans la liste des produits
        const productItem = document.querySelector(`.produitService[data-index="${productId}"]`);
        if (productItem) {
            const iconElement = productItem.querySelector('.iconify');
            if (iconElement) {
                iconElement.setAttribute('data-icon', 'material-symbols:add');
                iconElement.classList.remove('text-green-500');
                iconElement.classList.add('text-white');
            }
        }

        
        const totalPages = Math.ceil(selectedProducts.length / itemsPerPageSelected);
        currentPageSelected = totalPages > 0 ? Math.min(currentPageSelected, totalPages) : 1;

        afficherProduitsSelectionnes();
        updateSelectedCount();
    }

    function updateHiddenInput() {
    
        const existingInputs = document.querySelectorAll('input[name="produits_services[]"]');
        existingInputs.forEach(input => input.remove());

      
        const form = document.getElementById('produitsServicesForm');
        selectedProductIds.forEach(id => {
            const hiddenInput = document.createElement('input');
            hiddenInput.type = 'hidden';
            hiddenInput.name = 'produits_services[]';
            hiddenInput.value = id;
            form.appendChild(hiddenInput);
        });
    }

    function afficherMessage(message) {
        const messageContainer = document.createElement('p');
        messageContainer.className = 'text-red-500 mt-2';
        messageContainer.textContent = message;
        document.getElementById('produitsServicesSelectionnees').appendChild(messageContainer);
        setTimeout(() => messageContainer.remove(), 3000);
    }

    function updateSelectedCount() {
        const countElement = document.getElementById('selectedCount');
        countElement.textContent = `Nombre de produits sélectionnés : ${selectedProducts.length}`;
    }

    document.addEventListener('DOMContentLoaded', () => {
        const searchInput = document.getElementById('recherche');
        const searchButton = document.getElementById('searchButton');

   
        const produitsServicesSession = {!! json_encode(session('produitsServices.produits_services', [])) !!};


        selectedProductIds = produitsServicesSession.map(id => parseInt(id, 10));
        updateHiddenInput();

    
        if (selectedProductIds.length > 0) {
            axios.get('/produits-services/multiple', {
                params: {
                    ids: selectedProductIds
                }
            })
            .then(response => {
                selectedProducts = response.data;
                afficherProduitsSelectionnes();
                updateSelectedCount();
            })
            .catch(error => console.error("Erreur lors de la récupération des produits :", error));
        } else {
            afficherProduitsSelectionnes(); 
            updateSelectedCount(); 
        }

     
        searchInput.addEventListener('input', () => {
            if (searchInput.value.length >= 3 || searchInput.value === '') {
                performSearch();
            }
        });
        document.getElementById('selectCategorie').addEventListener('change', () => {
    performSearch(); 
});

        function getCategories() {
            axios.get('/categories')
                .then(response => {
                    const categories = response.data;

            
                    selectCategorie.innerHTML = '<option value="" disabled selected>Choisissez une catégorie pour filtrer les produits et services</option>  <option value="">Toutes les catégories</option>';

             
                    categories.forEach(categorie => {
                        const option = document.createElement('option');
                        option.value = categorie;
                        option.textContent = categorie;
                        selectCategorie.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error('Erreur lors de la récupération des catégories :', error);
                });
        }

        // Appeler la fonction pour récupérer les catégories au chargement de la page
        getCategories();
        performSearch();

        const unspscButton = document.getElementById('unspscButton');
        
        unspscButton.addEventListener('click', () => {
            Swal.fire({
                title: 'Petit guide des codes UNSPSC',
                html: `
                    <div class="text-left">
                        <p class="font-bold mb-2">Qu'est-ce qu'un code UNSPSC ?</p>
                        <p>Le code UNSPSC (United Nations Standard Products and Services Code) est un système de classification mondial qui attribue des codes uniques à des produits et services. Cet outil de recherche vous permet de trier les produits et services selon leur code UNSPSC, la nature, le code de catégorie, ou un élément de la description.</p>
                        <p class="font-bold mt-4 mb-2">Différentes catégories exemple  :</p>
<ul class="list-disc pl-5">
    <li><strong>C01</strong> - Bâtiments : Cette catégorie comprend tous les types de bâtiments, allant des maisons aux bâtiments commerciaux, et couvre une large gamme de constructions.</li>
    <li><strong>C02</strong> - Ouvrages de génie civil : Cela inclut les infrastructures telles que les ponts, les routes, et autres travaux d'ingénierie civile.</li>
    <li><strong>G10</strong> - Produits électriques et électroniques : Cette catégorie regroupe les équipements électriques et électroniques, tels que les circuits et les composants électriques.</li>
    <li><strong>G15</strong> - Alimentation : Comprend les produits alimentaires, y compris les matières premières et les produits préparés.</li>
    <li><strong>S18</strong> - Location à bail / Location d'équipement : Cette catégorie se rapporte à la location d'équipement pour divers besoins, tels que la construction ou l'industrie.</li>
    <!-- Ajouter d'autres catégories selon les besoins -->
</ul>
                        <p class="font-bold mt-4 mb-2">Attributs disponibles pour la recherche :</p>
                        <ul class="list-disc pl-5">
                            <li><strong>Code UNSPSC</strong> : Un code unique qui identifie un produit ou un service composé uniquement de 8 chiffres. Exemple : "12345678" pour un équipement spécifique.</li>
                            <li><strong>Nature</strong> : Catégorie générale du produit ou service. Exemple : "Travaux de construction".</li>
                            <li><strong>Code de catégorie</strong> : Code qui correspond à un ensemble de produits ou services liés. Exemple : "C01" pour des bâtiments.</li>
                            <li><strong>Description</strong> : Une description textuelle qui permet de rechercher par mots-clés. Exemple : "Cafétéria" ou "Stationnement".</li>
                        </ul>
                    </div>
                `,
                icon: 'info',
                confirmButtonText: 'Compris'
            });
        });
    });
</script>

@endsection
