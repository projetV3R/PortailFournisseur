@extends('layouts.app')

@section('title', 'ProduitService')

@section('contenu')

<form id="produitsServicesForm" action="{{ route('StoreProduitsServices') }}" method="post">
    @csrf
    <div class="flex w-full lg:flex-col flex-col gap-4 p-8 lg:p-16">
        <div class="flex w-full flex-col">
            <h6 class="font-Alumni font-bold text-3xl md:text-5xl">Produits et services</h6>
            <h1 class="font-Alumni font-semibold text-md md:text-lg mt-2">
                Parlez-nous des services que vous offrez      
            </h1>
        </div>
        <!-- Conteneur principal -->
        <div class="flex w-full gap-x-4">
            <!-- Colonne des produits non sélectionnés -->
            <div class="flex flex-col w-1/2">
                @if (session('errors'))
                    <ul>
                        @foreach (session('errors')->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <div class="bg-primary-100 py-8 px-2 md:px-4 mt-8">
                    <h4 class="font-Alumni font-bold text-lg md:text-2xl underline">Produits et services</h4>

                    <div class="mt-6 w-full flex flex-col">
                        <label for="recherche" class="block font-Alumni text-md md:text-lg mb-2">
                            En peu de mots décrivez vos produits ou services, le secteur ou le code UNSPSC
                        </label>
                        <div class="flex">
                            <input type="text" id="recherche"
                                placeholder="En peu de mots décrivez vos produits ou services"
                                class="font-Alumni w-full p-2 h-12 focus:outline-none focus:border-blue-500 border border-black">
                            <button type="button" class="cursor-pointer w-1/6 bg-tertiary-400 p-1 ml-4 flex items-center justify-center"
                                id="searchButton">
                                <span class="iconify text-white size-6" data-icon="material-symbols:search"></span>
                            </button>
                        </div>
                        <div id="pagination" class="mt-4 flex justify-center items-center gap-x-2"></div>

                        <div id="toutLesProduitsServices" class="grid grid-cols-1 2xl:grid-cols-2 gap-4 mt-4"></div>

                        @error('recherche')
                            <span class="font-Alumni text-lg text-red-500 mt-1 ml-1">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <!-- Colonne des produits sélectionnés -->
            <div class="bg-secondary-100 py-10 px-8 mt-8 w-full lg:max-w-4xl mx-auto flex flex-col h-fit">
                <h4 class="font-Alumni font-bold text-lg md:text-2xl underline">Produits et services sélectionnés</h4>

                <!-- Ajout du compteur -->
                <p id="selectedCount" class="font-Alumni text-md md:text-lg mt-2">Nombre de produits sélectionnés : 0</p>

                <!-- Conteneur de pagination pour les produits sélectionnés -->
                <div id="paginationSelected" class="mt-4 flex justify-center items-center gap-x-2"></div>

                <!-- Conteneur des produits sélectionnés -->
                <div id="produitsServicesSelectionnees" class="grid grid-cols-1 2xl:grid-cols-2 gap-4 mt-4"></div>

                @error('produits_services[]')
                    <span class="font-Alumni text-lg text-red-500 mt-1 ml-1">{{ $message }}</span>
                @enderror
                <div class="mt-6">
                    <label for="details_specifications" class="block font-Alumni text-md md:text-lg mb-2">Détails</label>
                    <textarea id="details_specifications" name="details_specifications"
                        class="font-Alumni w-full max-w-md p-2 h-28 focus:outline-none focus:border-blue-500 border border-black"
                        placeholder="Entrer des détails supplémentaires">{{ old('details_specifications', session('produitsServices.details_specifications')) }}</textarea>

                    @error('details_specifications')
                        <span class="font-Alumni text-lg text-red-500 mt-1 ml-1">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="mt-4 w-full bg-tertiary-400 hover:bg-tertiary-300 py-3 text-white rounded-md">
                    <h1 class="font-Alumni font-bold text-lg md:text-2xl">Suivant</h1>
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
            <!-- Vos boutons de pagination existants -->
            ${paginationButtons(data, 'performSearch')}
        `;
    }

    function paginationButtons(data, functionName) {
        return `
            <button type="button"
                class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-2 md:px-4 rounded-l
                ${!data.prev_page_url ? 'cursor-not-allowed' : ''}"
                onclick="${functionName}(1)" ${!data.prev_page_url ? 'disabled' : ''}>
                &lt;&lt;
            </button>
            <button type="button"
                class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-2 md:px-4
                ${!data.prev_page_url ? 'cursor-not-allowed' : ''}"
                onclick="${functionName}(${data.current_page - 1})" ${!data.prev_page_url ? 'disabled' : ''}>
                <span class="md:hidden">&lt;</span>
                <span class="hidden md:inline">Précédente</span>
            </button>
            <span class="text-xs font-bold mx-2">Page ${data.current_page} sur ${data.last_page}</span>
            <button type="button"
                class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-2 md:px-4
                ${!data.next_page_url ? 'cursor-not-allowed' : ''}"
                onclick="${functionName}(${data.current_page + 1})" ${!data.next_page_url ? 'disabled' : ''}>
                <span class="md:hidden">&gt;</span>
                <span class="hidden md:inline">Suivante</span>
            </button>
            <button type="button"
                class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-2 md:px-4 rounded-r
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
            : '<span class="iconify size-4 md:size-8 lg:size-10 text-white" data-icon="material-symbols:add"></span>';

        return `
            <div class="bg-white cursor-pointer px-4 py-2 w-full flex flex-row produitService hover:bg-green-500"
                data-index="${produit.id}" data-unspsc="${produit.code_unspsc}">
                <div class="flex flex-col w-full">
                    <h6 class="font-Alumni text-xs font-bold md:text-3xl">${produit.nature || 'Nature non disponible'}</h6>
                    <h4 class="font-Alumni text-xs md:text-xl mt-2">${produit.code_categorie || ''}</h4>
                    <h1 class="font-Alumni text-xs italic md:text-lg">${produit.code_unspsc || ''} - ${produit.description || ''}</h1>
                </div>
                <div class="flex flex-col items-end justify-start w-full">
                    <div class="flex items-center justify-center bg-tertiary-400 md:p-2 rounded-full">
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

        // Mettre à jour l'icône dans l'élément
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
        updateSelectedCount(); // Mise à jour du compteur
    }

    function afficherProduitsSelectionnes() {
        const produitsServicesSelectionnees = document.getElementById('produitsServicesSelectionnees');

        // Si aucun produit sélectionné, afficher un message et quitter la fonction
        if (selectedProducts.length === 0) {
            produitsServicesSelectionnees.innerHTML = '<p class="font-Alumni text-md text-gray-600">Aucun produit ou service sélectionné.</p>';
            // Cacher la pagination s'il n'y a pas de produits
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
            <div class="bg-white cursor-pointer px-4 py-2 w-full flex flex-row produitSelectionne hover:bg-red-500"
                data-index="${produit.id}">
                <div class="flex flex-col w-full">
                    <h6 class="font-Alumni font-bold text-xs md:text-3xl">${produit.nature || 'Nature non disponible'}</h6>
                    <h4 class="font-Alumni text-xs md:text-xl mt-2">${produit.code_categorie || ''}</h4>
                    <h1 class="font-Alumni text-xs italic md:text-lg">${produit.code_unspsc || ''} - ${produit.description || ''}</h1>
                </div>
                <div class="flex flex-col items-end justify-start w-full">
                    <div class="flex items-center justify-center bg-tertiary-400 md:p-2 rounded-full">
                        <span class="iconify size-4 md:size-8 lg:size-10 text-white" data-icon="material-symbols:delete"></span>
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

        searchButton.addEventListener('click', () => performSearch());
        searchInput.addEventListener('input', () => {
            if (searchInput.value.length >= 3 || searchInput.value === '') {
                performSearch();
            }
        });

        performSearch();
    });
</script>

@endsection
