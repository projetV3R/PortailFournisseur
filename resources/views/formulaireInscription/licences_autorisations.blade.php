@if (session('autoCompletageLicences'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Nous avons trouvé des informations sur votre licence. Elles ont été auto-complétées. Vous pouvez les modifier si nécessaire.",
                showConfirmButton: true,
            });
        });
    </script>
@endif

@vite(['resources/css/app.css', 'resources/js/app.js'])

@extends('layouts.app')

@section('title', 'LicencesAutorisations')

@section('contenu')
<form action="{{ route('storeLicences') }}" method="post">
    @csrf
    <div class="p-4 md:p-16 flex flex-col w-full">
        <div class="flex w-full flex-col 2xl:flex-row gap-4">
            <div class="flex flex-col w-full">
                <h6 class="font-Alumni font-bold text-3xl md:text-5xl text-black dark:text-white">LICENCES ET AUTORISATIONS</h6>
                <h1 class="font-Alumni font-semibold text-md md:text-lg mt-2 text-black dark:text-white">
                    Parler nous des services que vous offrez
                </h1>
            </div>
            @include('partials.progress_bar')
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
            <!-- Première colonne -->
            <div>
                <div class="bg-primary-100 dark:bg-primary-dark-100 py-8 px-4 mt-8">
                    <h4 class="font-Alumni font-bold text-lg md:text-2xl underline text-black dark:text-white">Licence RBQ</h4>

                    <div class="mt-6 w-full max-w-md flex gap-4 columns-2">
                        <!-- Conteneur du numeroLicence -->
                        <div class="w-1/2">
                            <label for="numeroLicence" class="block font-Alumni text-md md:text-lg mb-2 text-black dark:text-white">
                                Numero de licence
                            </label>
                            <input type="text" id="numeroLicence" name="numeroLicence"
                                placeholder="Entrer votre numero de licence"
                                value="{{ session('licences.numeroLicence') }}"
                                class="font-Alumni w-full p-2 h-12 focus:outline-none focus:border-blue-500 border border-black dark:border-gray-600 dark:bg-gray-800 dark:text-white">
                            @error('numeroLicence')
                                <span class="font-Alumni text-lg flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <!-- Conteneur du statut -->
                        <div class="w-1/2">
                            <label for="statut" class="block font-Alumni text-md md:text-lg mb-2 text-black dark:text-white">
                                Statut
                            </label>
                            <select name="statut" id="statut"
                                class="font-Alumni w-full p-2 h-12 focus:outline-none focus:border-blue-500 border border-black dark:border-gray-600 dark:bg-gray-800 dark:text-white">
                                <option value="" disabled selected>Choisir un statut</option>
                                <option value="active" {{ session('licences.statut') == 'active' ? 'selected' : '' }}>
                                    Active
                                </option>
                                <option value="inactive" {{ session('licences.statut') == 'Inactive' ? 'selected' : '' }}>
                                    Inactive
                                </option>
                                <option value="valide" {{ session('licences.statut') == 'Valide' ? 'selected' : '' }}>
                                    Valide
                                </option>
                                <option value="valide avec restriction"
                                    {{ session('licences.statut') == 'Valide avec restriction' ? 'selected' : '' }}>
                                    Valide avec restriction
                                </option>
                                <option value="non valide" {{ session('licences.statut') == 'Non valide' ? 'selected' : '' }}>
                                    Non valide
                                </option>
                                <option value="expirée" {{ session('licences.statut') == 'Expirée' ? 'selected' : '' }}>
                                    Expirée
                                </option>
                                <option value="suspendue" {{ session('licences.statut') == 'Suspendue' ? 'selected' : '' }}>
                                    Suspendue
                                </option>
                                <option value="révoquée" {{ session('licences.statut') == 'Révoquée' ? 'selected' : '' }}>
                                    Révoquée
                                </option>
                                <option value="non renouvelée"
                                    {{ session('licences.statut') == 'Non renouvelée' ? 'selected' : '' }}>
                                    Non renouvelée
                                </option>
                                <option value="annulée" {{ session('licences.statut') == 'Annulée' ? 'selected' : '' }}>
                                    Annulée
                                </option>
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
                            <label for="typeLicence" class="block font-Alumni text-md md:text-lg mb-2 text-black dark:text-white">
                                Type de licence
                            </label>
                            <select name="typeLicence" id="typeLicence"
                                class="font-Alumni w-full p-2 h-12 focus:outline-none focus:border-blue-500 border border-black dark:border-gray-600 dark:bg-gray-800 dark:text-white">
                                <option value="" disabled selected>Choisir un type de licence</option>
                                <option value="entrepreneur" {{ session('licences.typeLicence') == 'entrepreneur' ? 'selected' : '' }}>
                                    Entrepreneur
                                </option>
                                <option value="constructeur-propriétaire"
                                    {{ session('licences.typeLicence') == 'Constructeur-propriétaire' ? 'selected' : '' }}>
                                    Constructeur-propriétaire
                                </option>
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
                <div class="bg-secondary-100 dark:bg-secondary-dark-100 py-8 px-4 mt-8" id="cadreCategorie">
                    <h6 class="font-Alumni font-bold text-3xl md:text-5xl text-black dark:text-white">Sous-catégories</h6>
                    @error('sousCategorie')
                        <span class="font-Alumni text-lg flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            {{ $message }}
                        </span>
                    @enderror
                    <div id="checklistContainer" class="mt-6 text-black dark:text-gray-300">
                        <p>Sélectionnez un type de licence pour voir les sous-catégories disponibles.</p>
                    </div>
                </div>

                <button type="submit" class="mt-2 w-full text-white bg-tertiary-400 hover:bg-tertiary-300 dark:bg-tertiary-dark-400 dark:hover:bg-tertiary-dark-300 py-2.5 daltonien:hover:bg-daltonienYellow daltonien:hover:text-black">
                    <h1 class="font-Alumni font-bold text-lg md:text-2xl">
                        {{ session()->has('licences') ? 'Enregistrer' : 'Suivant' }}
                    </h1>
                </button>
            </div>
        </div>
    </div>
</form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const numeroLicenceInput = document.getElementById('numeroLicence');
            const typeLicenceSelect = document.getElementById('typeLicence');
            const checklistContainer = document.getElementById('checklistContainer');
            const selectedSousCategories = @json(session('licences.sousCategorie', []));
            console.log();
            console.log(selectedSousCategories);
            // Récupérer les valeurs de session
            //Formattage pour la valeur en session et la valeur de l'input A reformat peut etre pour plus efficace
            function formatLicence(value) {
                value = value.replace(/\D/g, ''); // Retirer les caractères non numériques

                if (value.length > 4 && value.length <= 8) {
                    value = value.slice(0, 4) + '-' + value.slice(4);
                } else if (value.length > 8) {
                    value = value.slice(0, 4) + '-' + value.slice(4, 8) + '-' + value.slice(8, 10);
                }

                return value;
            }


            if (numeroLicenceInput.value) {
                numeroLicenceInput.value = formatLicence(numeroLicenceInput.value);
            }

            numeroLicenceInput.addEventListener('input', function() {
                numeroLicenceInput.value = formatLicence(numeroLicenceInput.value);
            });


            if (typeLicenceSelect.value) {
                fetchSousCategories(typeLicenceSelect.value);
            }


            typeLicenceSelect.addEventListener('change', function() {
                const selectedType = this.value;

                if (selectedType) {
                    fetchSousCategories(selectedType);
                } else {
                    checklistContainer.innerHTML =
                        '<p>Sélectionnez un type de licence pour voir les sous-catégories disponibles.</p>';
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
                checklistContainer.innerHTML = ''; // Réinitialiser le conteneur

                if (!data || Object.keys(data).length === 0) {
                    checklistContainer.innerHTML =
                        '<p class="text-black dark:text-gray-300">Aucune sous-catégorie disponible pour ce type de licence.</p>';
                    return;
                }

                Object.keys(data).forEach(type => {

                    const groupTitle = document.createElement('h5');
                    groupTitle.textContent = ` ${typeLicenceSelect.value } ${type} :`;
                    groupTitle.classList.add('font-bold', 'text-xl', 'mt-4', 'mb-2', 'capitalize', 'text-black', 'dark:text-white');
                    checklistContainer.appendChild(groupTitle);


                    data[type].forEach(cat => {
                        const checkboxWrapper = document.createElement('div');
                        checkboxWrapper.classList.add(
    'flex', 'items-center', 'mt-2', 'relative', 'group',
    'bg-gray-300', 'dark:bg-gray-800', 'rounded-md', 'p-2', 'px-2', 'dark:text-gray-300'
, 'daltonien:bg-daltonienBleu');


                        const checkbox = document.createElement('input');
                        checkbox.type = 'checkbox';
                        checkbox.name = 'sousCategorie[]';
                        checkbox.value = cat.id;
                        checkbox.classList.add('mr-2');
                        console.log(cat.id);

                        // Auto-cocher si présent dans la session
                        if (selectedSousCategories.includes(String(cat.id))) {
                            checkbox.checked = true;


                        }
                        if (selectedSousCategories.includes(cat.id)) {
                            checkbox.checked = true;


                        }


                        const label = document.createElement('label');
                        label.textContent = cat.code_sous_categorie;

                        // Infobulle pour afficher les travaux permis
                        const tooltip = document.createElement('div');
                        tooltip.classList.add(
    'absolute', 'right-0', 'w-64', 'bg-gray-700', 'dark:bg-gray-900', 'text-white', 'dark:text-gray-100',
    'text-sm', 'p-2', 'rounded', 'hidden', 'group-hover:block',
    'z-10', 'shadow-lg', 'mt-8'
);

                        tooltip.textContent = cat.travaux_permis || 'Aucun descriptif disponible';

                        checkboxWrapper.appendChild(checkbox);
                        checkboxWrapper.appendChild(label);
                        checkboxWrapper.appendChild(tooltip);

                        checklistContainer.appendChild(checkboxWrapper);
                    });
                });
            }


        });

        @php
            session()->forget('autoCompletageLicences');
        @endphp
    </script>
@endsection
