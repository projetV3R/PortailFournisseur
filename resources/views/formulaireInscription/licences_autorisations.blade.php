@vite(['resources/css/app.css', 'resources/js/app.js'])

@extends('layouts.app')

@section('title', 'LicencesAutorisations')

@section('contenu')
    <form action="{{ route('storeLicences') }}" method="post">
        @csrf
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 p-8 lg:p-16">
            <!-- Première colonne -->
            <div>
                <h6 class="font-Alumni font-bold text-3xl md:text-5xl">LICENCES ET AUTORISATIONS</h6>
                <h1 class="font-Alumni font-semibold text-md md:text-lg mt-2">Parler nous des services que vous offrez</h1>

                <div class="bg-primary-100 py-8 px-4 mt-8">
                    <h4 class="font-Alumni font-bold text-lg md:text-2xl underline">Licence RBQ</h4>

                    <div class="mt-6 w-full max-w-md flex gap-4 columns-2">
                        <!-- Conteneur du numeroLicence -->
                        <div class="w-1/2">
                            <label for="numeroLicence" class="block font-Alumni text-md md:text-lg mb-2">Numero de licence</label>
                            <input type="text" id="numeroLicence" name="numeroLicence"
                                placeholder="Entrer votre numero de licence"
                                value="{{ session('licences.numeroLicence') }}"  
                                class="font-Alumni w-full p-2 h-12 focus:outline-none focus:border-blue-500 border border-black">
                            @error('numeroLicence')
                                <span class="font-Alumni text-lg flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <!-- Conteneur du statut -->
                        <div class="w-1/2">
                            <label for="statut" class="block font-Alumni text-md md:text-lg mb-2">Statut</label>
                            <select name="statut" id="statut" class="font-Alumni w-full p-2 h-12 focus:outline-none focus:border-blue-500 border border-blackl">
                                <option value="valide" {{ session('licences.statut') == 'valide' ? 'selected' : '' }}>Valide</option>
                                <option value="valide_restriction" {{ session('licences.statut') == 'valide_restriction' ? 'selected' : '' }}>Valide avec restriction</option>
                                <option value="non_valide" {{ session('licences.statut') == 'non_valide' ? 'selected' : '' }}>Non valide</option>
                            </select>
                            @error('statut')
                                <span class="font-Alumni text-lg flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!-- Type de licence -->
                    <div class="mt-6 w-full max-w-md flex gap-4 columns-2">
                        <div class="w-full">
                            <label for="typeLicence" class="block font-Alumni text-md md:text-lg mb-2">Type de licence</label>
                            <select name="typeLicence" id="typeLicence" class="font-Alumni w-full p-2 h-12 focus:outline-none focus:border-blue-500 border border-black">
                                <option value="entrepreneur général" {{ session('licences.typeLicence') == 'entrepreneur général' ? 'selected' : '' }}>Entrepreneur général</option>
                                <option value="constructeur-propriétaire général" {{ session('licences.typeLicence') == 'constructeur-propriétaire général' ? 'selected' : '' }}>Constructeur-propriétaire général</option>
                                <option value="entrepreneur spécialisé" {{ session('licences.typeLicence') == 'entrepreneur spécialisé' ? 'selected' : '' }}>Entrepreneur spécialisé</option>
                                <option value="constructeur-propriétaire spécialisé" {{ session('licences.typeLicence') == 'constructeur-propriétaire spécialisé' ? 'selected' : '' }}>Constructeur-propriétaire spécialisé</option>
                            </select>
                            @error('typeLicence')
                                <span class="font-Alumni text-lg flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Deuxième colonne -->
            <div>
           
                <h6 class="font-Alumni text-white font-bold text-3xl md:text-5xl">Catégories et sous-catégories</h6>
                @error('sousCategorie')
                <span class="font-Alumni text-lg flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                    {{ $message }}
                </span>
            @enderror
                <div class="bg-secondary-100 py-8 px-4 mt-8" id="cadreCategorie">
                    <div id="checklistContainer" class="mt-6">
                        <p>Sélectionnez un type de licence pour voir les sous-catégories disponibles.</p>
                    </div>
                </div>

                <button type="submit" class="mt-2 w-full text-white bg-tertiary-400 hover:bg-tertiary-300 py-2.5">
                    <h1 class="font-Alumni font-bold text-lg md:text-2xl">Suivant</h1>
                </button>
            </div>
        </div>
    </form>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const numeroLicenceInput = document.getElementById('numeroLicence');
        const typeLicenceSelect = document.getElementById('typeLicence');
        const checklistContainer = document.getElementById('checklistContainer');
        const selectedSousCategories = @json(session('licences.sousCategorie', [])); // Récupérer les valeurs de session

        // Application automatique du format 1234-1234-12
        numeroLicenceInput.addEventListener('input', function () {
            let value = numeroLicenceInput.value;
          
            value = value.replace(/\D/g, '');

            //Ajout du tiret en fonction du nombre caractères numérique 
            if (value.length > 4 && value.length <= 8) {
                value = value.slice(0, 4) + '-' + value.slice(4);
            } else if (value.length > 8) {
                value = value.slice(0, 4) + '-' + value.slice(4, 8) + '-' + value.slice(8, 10);
            }

    
            numeroLicenceInput.value = value;
        });

     
        if (typeLicenceSelect.value) {
            fetchSousCategories(typeLicenceSelect.value);
        }

 
        typeLicenceSelect.addEventListener('change', function () {
            const selectedType = this.value;

            if (selectedType) {
                fetchSousCategories(selectedType); 
            } else {
                checklistContainer.innerHTML = '<p>Sélectionnez un type de licence pour voir les sous-catégories disponibles.</p>';
            }
        });

        function fetchSousCategories(selectedType) {
           
            axios.get(`/sous-categories/${selectedType}`)
                .then(response => {
                    renderChecklist(response.data);
                })
                .catch(error => {
                    console.error('Erreur lors de la récupération des sous-catégories:', error);
                });
        }

        function renderChecklist(data) {
            checklistContainer.innerHTML = ''; // Réinitialiser

            data.forEach(cat => {
                const checkboxWrapper = document.createElement('div');
                checkboxWrapper.classList.add('flex', 'items-center', 'mt-2', 'relative', 'group', 'bg-gray-300', 'rounded-md', 'p-2', 'px-2');

                const checkbox = document.createElement('input');
                checkbox.type = 'checkbox';
                checkbox.name = 'sousCategorie[]';
                checkbox.value = cat.id;
                checkbox.classList.add('mr-2');

                if (selectedSousCategories.includes(String(cat.id))) {
                    checkbox.checked = true; // Auto cocher si présent dans la session
                }

                const label = document.createElement('label');
                label.textContent = cat.code_sous_categorie;

                // Infobulle (tooltip) pour afficher description sous categorie et ses travaux permis 
                const tooltip = document.createElement('div');
                tooltip.classList.add(
                    'absolute', 'right-0', 'w-64', 'bg-gray-700', 'text-white', 
                    'text-sm', 'p-2', 'rounded', 'hidden', 'group-hover:block', 
                    'z-10', 'shadow-lg', 'mt-8'
                );
                tooltip.textContent = cat.travaux_permis || 'Aucun descriptif disponible';

                checkboxWrapper.appendChild(checkbox);
                checkboxWrapper.appendChild(label);
                checkboxWrapper.appendChild(tooltip);

                checklistContainer.appendChild(checkboxWrapper);
            });
        }
    });

    </script>
@endsection
