
@extends('layouts.app')

@section('title', 'Coordonnees')

@section('contenu')
    <form action="{{ route('StoreCoordonnees') }}" method="post">
        @csrf

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 p-8 lg:p-16">
            <!-- Première colonne -->
            <div>
                <h6 class="font-Alumni font-bold text-3xl md:text-5xl">COORDONNEES</h6>
                <h1 class="font-Alumni font-semibold text-md md:text-lg mt-2">Ou vous situez vous ?</h1>

                <div class="bg-primary-100 py-8 px-4 mt-8 ">
                    <h4 class="font-Alumni font-bold text-lg md:text-2xl underline">Adresse physique</h4>

                    <div class="mt-6 w-full max-w-md flex gap-4 columns-2 ">

                        <!-- Conteneur du nom d'entreprise -->
                        <div class="w-1/4">
                            <label for="numeroCivique" class="block font-Alumni text-md md:text-lg mb-2">
                                N Civique
                            </label>
                            <input type="text" id="numeroCivique" name="numeroCivique" placeholder="1077"
                                class="font-Alumni w-full p-2 h-12 h-12focus:outline-none focus:border-blue-500 border border-black">

                            @error('numeroCivique')
                                <span
                                    class="font-Alumni text-lg flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="w-1/2">
                            <label for="rue" class="block font-Alumni text-md md:text-lg mb-2">
                                Rue
                            </label>
                            <input type="text" id="rue" name="rue" placeholder="Rue marguerite bourgoeys"
                                class="font-Alumni w-full p-2 h-12 h-12focus:outline-none focus:border-blue-500 border border-black">
                            @error('rue')
                                <span
                                    class="font-Alumni text-lg flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="w-1/4">
                            <label for="bureau" class="block font-Alumni text-md md:text-lg mb-2">
                                Bureau
                            </label>
                            <input type="text" id="bureau" name="bureau" placeholder="2867"
                                class="font-Alumni w-full p-2 h-12 h-12focus:outline-none focus:border-blue-500 border border-black">

                            @error('bureau')
                                <span
                                    class="font-Alumni text-lg flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-4 w-full max-w-md flex gap-4 columns-2 ">

                        <div class="w-full">
                            <label for="rue" class="block font-Alumni text-md md:text-lg mb-2">
                                Code postale
                            </label>
                            <input type="text" id="codePostale" name="codePostale" placeholder="G8Z 3T2"
                                class="font-Alumni w-full p-2 h-12 h-12focus:outline-none focus:border-blue-500 border border-black">

                            @error('codePostale')
                                <span
                                    class="font-Alumni text-lg flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-4 w-full max-w-md">
                        <label for="province" class="block font-Alumni text-md md:text-lg mb-2">
                            Provinces
                        </label>
                        <!-- Select -->
                        <select name="province" id="province"
                            data-hs-select='{
    "placeholder": "Selectionner la province",
    "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
    "toggleClasses": "font-Alumni hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-black text-start text-sm focus:outline-none focus:border-transparent focus:ring-2 focus:ring-blue-500",
    "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-black overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300",
    "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 focus:outline-none focus:bg-gray-100 font-Alumni",
    "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-blue-600 \" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",
    "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
    }'
                            class="hidden">
                            <option value="">Choose</option>
                            <option value="Alberta">Alberta</option>
                            <option value="Saskatchewan">Saskatchewan</option>
                            <option value="Manitoba">Manitoba</option>
                            <option value="Ontario">Ontario</option>
                            <option value="Québec">Québec</option>
                            <option value="Nouveau_Brunswick">Nouveau-Brunswick</option>
                            <option value="Île_du_Prince_Édouard">Île-du-Prince-Édouard</option>
                            <option value="Nouvelle_Écosse">Nouvelle-Écosse</option>
                            <option value="Terre_Neuve_et_Labrador">Terre-Neuve-et-Labrador</option>
                            <option value="Labrador">Labrador</option>
                            <option value="Yukon">Yukon</option>
                            <option value="Territoires_du_Nord_Ouest">Territoires du Nord-Ouest</option>
                            <option value="Nunavut">Nunavut</option>
                        </select>

                        @error('province')
                            <span
                                class="font-Alumni text-lg flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                {{ $message }}
                            </span>
                        @enderror
                        <!-- End Select -->
                    </div>

                    <div class="mt-4 w-full max-w-md">
                        <label for="regionAdministrative" class="block font-Alumni text-md md:text-lg mb-2">
                            Régions Administratives
                        </label>
                        <!-- Select -->
                        <select name="regionAdministrative" id="regionAdministrative"
                            data-hs-select='{
    "placeholder": "Selectionner la régions Administratives",
    "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
    "toggleClasses": "font-Alumni hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-black text-start text-sm focus:outline-none focus:border-transparent focus:ring-2 focus:ring-blue-500",
    "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-black overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300",
    "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 focus:outline-none focus:bg-gray-100 font-Alumni",
    "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-blue-600 \" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",
    "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
    }'
                            class="hidden">
                            <option value="">Choose</option>
                            <option value="Bas-Saint-Laurent (01)">Bas-Saint-Laurent (01)</option>
                            <option value="Saguenay--Lac-Saint-Jean (02)">Saguenay-Lac-Saint-Jean (02)</option>
                            <option value="Capitale-Nationale (03)">Capitale-Nationale (03)</option>
                            <option value="Mauricie (04)">Mauricie (04)</option>
                            <option value="Estrie (05)">Estrie (05)</option>
                            <option value="Montréal (06)">Montréal (06)</option>
                            <option value="Outaouais (07)">Outaouais (07)</option>
                            <option value="Abitibi-Témiscamingue (08)">Abitibi-Témiscamingue (08)</option>
                            <option value="Côte-Nord (09)">Côte-Nord (09)</option>
                            <option value="Nord-du-Québec (10)">Nord-du-Québec (10)</option>
                            <option value="Gaspésie--Îles-de-la-Madeleine (11)">Gaspésie-Îles-de-la-Madeleine (11)</option>
                            <option value="Chaudière-Appalaches (12)">Chaudière-Appalaches (12)</option>
                            <option value="Laval (13)">Laval (13)</option>
                            <option value="Lanaudière (14)">Lanaudière (14)</option>
                            <option value="Laurentides (15)">Laurentides (15)</option>
                            <option value="Montérégie (16)">Montérégie (16)</option>
                            <option value="Centre-du-Québec (17)">Centre-du-Québec (17)</option>

                        </select>

                        @error('regionAdministrative')
                            <span
                                class="font-Alumni text-lg flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                {{ $message }}
                            </span>
                        @enderror
                        <!-- End Select -->
                    </div>

                    <div class="mt-4 w-full max-w-md">
                        <label for="municipalite" class="block font-Alumni text-md md:text-lg mb-2">
                            Municipalités
                        </label>
                        <!-- Select -->
                        <select name="municipalite" id="municipaliteSelect"
                            data-hs-select='{
    "placeholder": "Selectionner la municipalité",
    "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
    "toggleClasses": "font-Alumni hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-black text-start text-sm focus:outline-none focus:border-transparent focus:ring-2 focus:ring-blue-500",
    "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-black overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300",
    "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 focus:outline-none focus:bg-gray-100 font-Alumni",
    "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-blue-600 \" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",
    "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
    }'
                            class="hidden">
                            <option value="">Choose</option>
                            <option>Rouyn-Noranda</option>
                            <option>Val-d'Or</option>
                            <option>Amos</option>
                            <option>La Sarre</option>
                        </select>

                        @error('municipalite')
                            <span
                                class="font-Alumni text-lg flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                {{ $message }}
                            </span>
                        @enderror
                        <!-- End Select -->
                    </div>

         

               

                </div>
            </div>

            <!-- Deuxième colonne -->
            <div>
                <h6 class="font-Alumni text-white font-bold text-3xl md:text-5xl hide">Merci de vous identifier !</h6>
                <h1 class="font-Alumni text-white font-semibold text-md md:text-lg mt-2">Dites-nous en plus sur vous
                </h1>

                <div class="bg-secondary-100 py-8 px-4 mt-8" id="cadreNumero">
                    <h4 class="font-Alumni font-bold text-lg md:text-2xl underline">Adresse en ligne</h4>

                    <div class="mt-6 w-full max-w-md flex gap-4 columns-2 ">

                        <div class="w-full">
                            <label for="siteWeb" class="block font-Alumni text-md md:text-lg mb-2">
                                Site web
                            </label>

                            <input type="text" id="siteWeb" name="siteWeb" placeholder="https://www.abc.com"
                                class="font-Alumni w-full p-2 h-12 focus:outline-none focus:border-blue-500 border border-black">

                            @error('siteWeb')
                                <span
                                    class="font-Alumni text-lg flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                    {{ $message }}
                                </span>
                            @enderror

                        </div>
                    </div>

                    <div class="mt-6 w-full max-w-md flex gap-4 columns-2 ">

                        <div class="w-full">
                            <label for="ligne" class="block font-Alumni text-md md:text-lg mb-2">
                                Ligne
                            </label>

                            <input type="text" id="ligne" name="ligne[]" placeholder="Fixe"
                                class="font-Alumni w-full p-2 h-12 focus:outline-none focus:border-blue-500 border border-black">

                            @error('ligne[]')
                                <span
                                    class="font-Alumni text-lg flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                    {{ $message }}
                                </span>
                            @enderror

                        </div>

                        <div class="w-full">
                            <label for="numeroTelephone" class="block font-Alumni text-md md:text-lg mb-2">
                                Numero Telephone
                            </label>

                            <input type="phonenumber" id="numeroTelephone" name="numeroTelephone[]"
                                placeholder="514-453-9867"
                                class="font-Alumni w-full p-2 h-12 focus:outline-none focus:border-blue-500 border border-black">

                            @error('numeroTelephone[]')
                                <span
                                    class="font-Alumni text-lg flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                    {{ $message }}
                                </span>
                            @enderror

                        </div>

                        <div class="w-full">
                            <label for="poste" class="block font-Alumni text-md md:text-lg mb-2">
                                Poste
                            </label>

                            <input type="text" id="poste" name="poste[]" placeholder="9845"
                                class="font-Alumni w-full p-2 h-12 focus:outline-none focus:border-blue-500 border border-black">

                            @error('poste[]')
                                <span
                                    class="font-Alumni text-lg flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                    {{ $message }}
                                </span>
                            @enderror

                        </div>
                    </div>
                </div>

                <button type="button" id="ajoutNumeroTelephone"
                    class="mt-4 w-full text-white bg-secondary-400 hover:bg-tertiary-300 py-2.5">
                    <h1 class="font-Alumni font-bold text-lg md:text-2xl">Ajouter un numero</h1>
                </button>

                <button type="submit" class="mt-4 w-full text-white bg-tertiary-400 hover:bg-tertiary-300 py-2.5">
                    <h1 class="font-Alumni font-bold text-lg md:text-2xl">Suivant</h1>
                </button>

            </div>
        </div>
    </form>

    <script>
        document.getElementById('ajoutNumeroTelephone').addEventListener('click', function() {
            let cadre = document.getElementById('cadreNumero');

            // Ajoute une nouvelle ligne avec les inputs et le bouton de suppression
            cadre.insertAdjacentHTML('beforeend', `
                <div class="mt-6 w-full max-w-md flex gap-4 columns-2 ligne-numeros">
    
                    <div class="w-full">
                        <label for="ligne" class="block font-Alumni text-md md:text-lg mb-2">Ligne</label>
                        <input type="text" id="ligne" name="ligne[]" placeholder="Fixe"
                            class="font-Alumni w-full p-2 h-12 focus:outline-none focus:border-blue-500 border border-black">
                        @error('ligne')
                            <span class="font-Alumni text-lg flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">{{ $message }}</span>
                        @enderror
                    </div>
    
                    <div class="w-full">
                        <label for="numeroTelephone" class="block font-Alumni text-md md:text-lg mb-2">Numero Telephone</label>
                        <input type="phonenumber" id="numeroTelephone" name="numeroTelephone[]" placeholder="514-453-9867"
                            class="font-Alumni w-full p-2 h-12 focus:outline-none focus:border-blue-500 border border-black">
                        @error('numeroTelephone')
                            <span class="font-Alumni text-lg flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">{{ $message }}</span>
                        @enderror
                    </div>
    
                    <div class="w-full">
                        <label for="poste" class="block font-Alumni text-md md:text-lg mb-2">Poste</label>
                        <input type="text" id="poste" name="poste[]" placeholder="9845"
                            class="font-Alumni w-full p-2 h-12 focus:outline-none focus:border-blue-500 border border-black">
                        @error('poste')
                            <span class="font-Alumni text-lg flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">{{ $message }}</span>
                        @enderror
                    </div>
    
                    <!-- Bouton de suppression -->
                    <div class="w-auto cursor-pointer flex justify-center items-center remove-ligne bg-tertiary-400 text-white h-12 px-4 py-4 mt-9">
                        <span class="iconify hover:text-red-500" data-icon="material-symbols:delete"></span>
                    </div>
                </div>
            `);

            // Ajoute un gestionnaire d'événements au bouton de suppression
            cadre.querySelectorAll('.remove-ligne').forEach(function(button) {
                button.addEventListener('click', function() {
                    // Supprime la div parente de la ligne
                    button.closest('.ligne-numeros').remove();
                });
            });
        });


        document.getElementById('regionAdministrative').addEventListener('change', function() {
         let regionCode = this.value; 

    console.log('Region sélectionnée : ', regionCode); // Pour vérification
    let municipaliteSelect =  document.getElementById('municipaliteSelect');
    municipaliteSelect.innerHTML = '<option value"">Selectionner une municipalité</option>';

    if (regionCode) {
        axios.get('/municipalites-par-region', {
            params: { region: regionCode }
        })
        .then(function (response) {
            console.log(response.data); // Vérifiez les données reçues

        response.data.forEach(function(muni)){
            municipaliteSelect.addOption({
            title:muni.munnom,
            val:muni.munnom,
            selected:false,
          })}
        })
        .catch(function (error) {
            console.error('Erreur lors de la récupération des municipalités:', error);
        });
    }
});


        
        </script>

@endsection
