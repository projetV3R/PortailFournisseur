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

                <div class="bg-primary-100 py-8 px-4 mt-8 ">
                    <h4 class="font-Alumni font-bold text-lg md:text-2xl underline">Licence RBQ</h4>

                    <div class="mt-6 w-full max-w-md flex gap-4 columns-2 ">

                        <!-- Conteneur du nom d'entreprise -->
                        <div class="w-1/2">
                            <label for="numeroLicence" class="block font-Alumni text-md md:text-lg mb-2">
                                Numero de licence
                            </label>
                            <input type="text" id="numeroLicence" name="numeroLicence"
                                placeholder="Entrer votre numero de licence"
                                class="font-Alumni w-full p-2 h-12 h-12focus:outline-none focus:border-blue-500 border border-black">
                            @error('numeroLicence')
                                <span
                                    class="font-Alumni text-lg flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <!-- Conteneur du segment -->
                        <div class="w-1/2">
                            <label for="statut" class="block font-Alumni text-md md:text-lg mb-2">
                                Statut
                            </label>
                            <!-- Select -->
                            <select name="statut" id="statut"
                              
                                class="font-Alumni w-full p-2 h-12 focus:outline-none focus:border-blue-500 border border-blackl ">
                                <option value="active">Active</option>
                                <option value="suspendue">Suspendue</option>
                                <option value="annulee">Annulée ou révoquée</option>
                                <option value="renouvellement">En attente de renouvellement</option>
                            </select>
                            @error('statut')
                                <span
                                    class="font-Alumni text-lg flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                    {{ $message }}
                                </span>
                            @enderror
                            <!-- End Select -->
                        </div>
                    </div>

                    <div class="mt-6 w-full max-w-md flex gap-4 columns-2 ">

                        <!-- Conteneur du segment -->
                        <div class="w-full">
                            <label for="typeLicence" class="block font-Alumni text-md md:text-lg mb-2">
                                Type de licence
                            </label>
                            <!-- Select -->
                            <select name="typeLicence" id="typeLicence"
                  
                                class="font-Alumni w-full p-2 h-12 focus:outline-none focus:border-blue-500 border border-black">
                                <option value="">Choose</option>
                                <option value="entrepreneur général">Entrepreneur général</option>
                                <option value="constructeur-propriétaire général">Constructeur-propriétaire général</option>
                                <option value="entrepreneur spécialisé">Entrepreneur spécialisé</option>
                                <option value="constructeur-propriétaire spécialisé">Constructeur-propriétaire spécialisé</option>
                            </select>
                            <!-- End Select -->

                            @error('typeLicence')
                                <span
                                    class="font-Alumni text-lg flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <!-- Conteneur du segment -->
                      
                    </div>
                </div>
            </div>

            <!-- Deuxième colonne -->
            <div>
                <h6 class="font-Alumni text-white font-bold text-3xl md:text-5xl hide">Merci de vous identifier !</h6>
                <h1 class="font-Alumni text-white font-semibold text-md md:text-lg mt-2">Dites-nous en plus sur vous</h1>

                <div class="bg-secondary-100 py-8 px-4 mt-8" id="cadreCategorie">

                    <div class="mt-4 flex justify-between items-center">

                        <h4 class="font-Alumni font-bold text-lg md:text-2xl underline">Catégories et sous-catégories</h4>

                        <div class="cursor-pointer w-26 h-26 bg-tertiary-400 p-1 flex justify-center items-center"
                            id="ajouterCategorie">
                            <span class="iconify size-8 lg:size-10 text-white text-center" data-icon="material-symbols:add"
                                data-inline="false"></span>
                        </div>
                    </div>


                    <div class="mt-6 w-full  flex gap-4 columns-3 ">

                        

                        <!-- Conteneur du segment -->
                        <div class="w-full flex flex-col">
                            <div class="flex w-full flex-col">
                            <label for="sousCategorie" class="block font-Alumni text-md md:text-lg mb-2">
                                Sous-catégorie
                            </label>
                            <div id="checklistContainer" class="mt-6">
                                <p>Sélectionnez un type de licence pour voir les sous-catégories disponibles.</p>
                            </div>
                        </select>
                        
                            @error('sousCategorie')
                                <span class="text-red-500 text-xs mt-1 ml-1">{{ $message }}</span>
                            @enderror
                            </div>
                         </div>
                        
                    </div>
                </div>

                <button type="submit" class="mt-2 w-full text-white bg-tertiary-400 hover:bg-tertiary-300 py-2.5">
                    <h1 class="font-Alumni font-bold text-lg md:text-2xl">Suivant</h1>
                </button>
            </div>
        </div>
    </form>

    <script>document.addEventListener('DOMContentLoaded', function () {
        const typeLicenceSelect = document.getElementById('typeLicence');
        const checklistContainer = document.getElementById('checklistContainer');
    
        typeLicenceSelect.addEventListener('change', function () {
            const selectedType = this.value;
    
            if (selectedType) {
                axios.get(`/sous-categories/${selectedType}`)
                    .then(response => {
                        renderChecklist(response.data);
                    })
                    .catch(error => {
                        console.error('Erreur lors de la récupération des sous-catégories:', error);
                    });
            } else {
                checklistContainer.innerHTML = '<p>Sélectionnez un type de licence pour voir les sous-catégories disponibles.</p>';
            }
        });
    
        function renderChecklist(data) {
    checklistContainer.innerHTML = ''; // Réinitialiser

    data.forEach(cat => {
        const checkboxWrapper = document.createElement('div');
        checkboxWrapper.classList.add('flex', 'items-center', 'mt-2', 'relative', 'group','bg-gray-300','rounded-md');

        const checkbox = document.createElement('input');
        checkbox.type = 'checkbox';
        checkbox.name = 'sousCategorie[]';
        checkbox.value = cat.id;
        checkbox.classList.add('mr-2');

        const label = document.createElement('label');
        label.textContent = cat.code_sous_categorie;

        // Infobulle (tooltip) pour afficher les travaux permis
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

}})
    
    
    

    </script>
@endsection
