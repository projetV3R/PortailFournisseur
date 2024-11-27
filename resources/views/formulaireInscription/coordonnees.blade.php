@extends('layouts.app')

@section('title', 'Coordonnees')

@section('contenu')

    <form action="{{ route('StoreCoordonnees') }}" method="post">
        @csrf
        <div class="p-4 md:p-16 flex flex-col  w-full">
            <div class="flex w-full flex-col 2xl:flex-row gap-4 ">
                <div class="flex flex-col w-full">
                    <h6 class="font-Alumni font-bold text-3xl md:text-5xl">COORDONNEES</h6>
                    <h1 class="font-Alumni font-semibold text-md md:text-lg mt-2">Ou vous situez vous ?</h1>

                </div>
                @include('partials.progress_bar')
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 ">
                <!-- Première colonne -->
                <div>


                    <div class="bg-primary-100 py-8 px-4 mt-8 ">
                        <div class="flex items-center gap-0.5">
                            <span class="iconify  size-4 md:size-6" data-icon="material-symbols:home-outline"></span>
                            <h4 class="font-Alumni font-bold text-lg md:text-2xl underline">Adresse physique</h4>

                        </div>

                        <div class="mt-6 w-full max-w-md flex gap-4 columns-2 ">

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

                            <select name="province" id="province"
                                class="font-Alumni w-full p-2 h-12 focus:outline-none focus:border-blue-500 border border-black">
                                <option value="" disabled selected>Choisissez une province</option>
                                <option value="Alberta">Alberta</option>
                                <option value="Saskatchewan">Saskatchewan</option>
                                <option value="Manitoba">Manitoba</option>
                                <option value="Ontario">Ontario</option>
                                <option value="Québec" selected>Québec</option>
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

                        </div>
                        <div class="mt-4 w-full max-w-md">
                            <label for="regionAdministrative" class="block font-Alumni text-md md:text-lg mb-2">
                                Régions Administratives
                            </label>

                            <select name="regionAdministrative" id="regionAdministrative"
                                class="font-Alumni w-full p-2 h-12 focus:outline-none focus:border-blue-500 border border-black">
                                <option value="" disabled selected>Choisissez une région administrative</option>
                                <option value="Bas-Saint-Laurent (01)">Bas-Saint-Laurent (01)</option>
                                <option value="Saguenay-Lac-Saint-Jean (02)">Saguenay-Lac-Saint-Jean (02)</option>
                                <option value="Capitale-Nationale (03)">Capitale-Nationale (03)</option>
                                <option value="Mauricie (04)">Mauricie (04)</option>
                                <option value="Estrie (05)">Estrie (05)</option>
                                <option value="Montréal (06)">Montréal (06)</option>
                                <option value="Outaouais (07)">Outaouais (07)</option>
                                <option value="Abitibi-Témiscamingue (08)">Abitibi-Témiscamingue (08)</option>
                                <option value="Côte-Nord (09)">Côte-Nord (09)</option>
                                <option value="Nord-du-Québec (10)">Nord-du-Québec (10)</option>
                                <option value="Gaspésie-Îles-de-la-Madeleine (11)">Gaspésie-Îles-de-la-Madeleine (11)
                                </option>
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

                        </div>

                        <div class="mt-4 w-full max-w-md">
                            <label for="municipaliteSelect" class="block font-Alumni text-md md:text-lg mb-2">
                                Municipalités
                            </label>
                            <select name="municipalite" id="municipaliteSelect"
                                class="font-Alumni w-full p-2 h-12 focus:outline-none focus:border-blue-500 border border-black">
                                <option value="" disabled selected>Choisissez une municipalité</option>
                                <option>Rouyn-Noranda</option>
                                <option>Val-d'Or</option>
                                <!-- Ajoutez les autres options -->
                            </select>
                            <input type="text" name="municipaliteInput" id="municipaliteInput"
                                placeholder="Entrez votre municipalité"
                                class="w-full p-2 h-12 focus:outline-none focus:border-blue-500 border border-black hidden">

                            @error('municipalite')
                                <span
                                    class="font-Alumni text-lg flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                    {{ $message }}
                                </span>
                            @enderror
                            @error('municipaliteInput')
                                <span
                                    class="font-Alumni text-lg flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                    {{ $message }}
                                </span>
                            @enderror

                        </div>
                    </div>
                </div>

                <!-- Deuxième colonne -->
                <div>

                    </h1>

                    <div class="bg-secondary-100 py-8 px-4 mt-8" id="cadreNumero">
                        <div class="flex items-center gap-1">
                            <span class="iconify  size-4 md:size-6"
                                data-icon="material-symbols:contact-phone-outline"></span>
                            <h4 class="font-Alumni font-bold text-lg md:text-2xl underline">Adresse en ligne</h4>
                        </div>
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

                                <select id="ligne_0" name="ligne[0][type]"
                                    class="font-Alumni w-full p-2 h-12 focus:outline-none focus:border-blue-500 border border-black">
                                    <option value="Bureau">Bureau</option>
                                    <option value="Télécopieur">Télécopieur</option>
                                    <option value="Cellulaire">Cellulaire</option>
                                </select>

                                @error('ligne.0.type')
                                    <span
                                        class="font-Alumni text-lg flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                        {{ $message }}
                                    </span>
                                @enderror

                            </div>
                            <div class="w-full">
                                <label for="numeroTelephone" class="block font-Alumni text-md md:text-lg mb-2 truncate">
                                    Numero Telephone
                                </label>

                                <input type="phonenumber" id="numeroTelephone_0" name="ligne[0][numeroTelephone]"
                                    placeholder="514-453-9867"
                                    class="font-Alumni w-full p-2 h-12 focus:outline-none focus:border-blue-500 border border-black numerotelephone">

                                @error('ligne.0.numeroTelephone')
                                    <span
                                        class="font-Alumni text-lg flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                        {{ $message }}
                                    </span>
                                @enderror

                            </div>

                            <div class="w-full" id="poste_div_0">
                                <label for="poste" class="block font-Alumni text-md md:text-lg mb-2">
                                    Poste
                                </label>

                                <input type="text" id="poste_0" name="ligne[0][poste]" placeholder="9845"
                                    class="font-Alumni w-full p-2 h-12 focus:outline-none focus:border-blue-500 border border-black">

                                @error('ligne.0.poste')
                                    <span
                                        class="font-Alumni text-lg flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                        {{ $message }}
                                    </span>
                                @enderror

                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="currentIndexInput" name="currentIndex">
                    <button type="button" id="ajoutNumeroTelephone"
                        class="mt-4 w-full text-white bg-secondary-400 hover:bg-tertiary-300 py-2.5">
                        <h1 class="font-Alumni font-bold text-lg md:text-2xl">Ajouter un numero</h1>
                    </button>

                    <button type="submit" class="mt-4 w-full text-white bg-tertiary-400 hover:bg-tertiary-300 py-2.5">
                        <h1 class="font-Alumni font-bold text-lg md:text-2xl">
                            {{ session()->has('coordonnees') ? 'Enregistrer' : 'Suivant' }}
                        </h1>
                    </button>

                </div>
            </div>
        </div>
    </form>
    <script>
        // Supprime les espaces créés par l'utilisateur dans l'input de code postal
        document.getElementById('codePostale').addEventListener('input', function() {
            this.value = this.value.replace(/\s+/g, '');
        });
        let currentIndex = @json(session('currentIndex', 0));
        document.getElementById('currentIndexInput').value = currentIndex;

        // Fonction pour charger les municipalités
        function chargerMunicipalites(region = '') {
            const municipaliteSelect = document.getElementById('municipaliteSelect');
            municipaliteSelect.innerHTML = '<option value="" disabled selected>Choisissez une municipalité</option>';

            axios.get('/municipalites-par-region', {
                    params: {
                        region: region
                    }
                })
                .then(response => {
                    response.data.forEach(muni => {
                        let option = new Option(muni.nom, muni.nom);
                        municipaliteSelect.add(option);
                    });
                })
                .catch(error => console.error('Erreur lors de la récupération des municipalités:', error));
        }

        document.getElementById('municipaliteSelect').addEventListener('change', function() {
            const municipalite = this.value;
            const regionAdministrativeSelect = document.getElementById('regionAdministrative');

            if (municipalite) {
                axios.get('/region-par-municipalite', {
                        params: {
                            municipalite: municipalite
                        }
                    })
                    .then(response => {
                        const region = response.data.regionAdministrative;
                        if (region) {
                            regionAdministrativeSelect.value = region;
                        } else {
                            console.warn("La région n'a pas été trouvée pour cette municipalité.");
                        }
                    })
                    .catch(error => console.error('Erreur lors de la récupération de la région:', error));
            }
        });

        function tooglePosteInput(index) {
            const ligneSelect = document.getElementById(`ligne_${index}`);
            const posteDiv = document.getElementById(`poste_div_${index}`);
            const posteInput = document.getElementById(`poste_${index}`);

            function togglePoste() {
                if (ligneSelect.value !== "Bureau") {
                    posteDiv.classList.add('hidden'); // Masque le champ "Poste"
                    posteInput.value = ''; // Efface la valeur de l'input "Poste"
                } else {
                    posteDiv.classList.remove('hidden'); // Affiche le champ "Poste"
                }
            }

            ligneSelect.addEventListener('change', togglePoste);

            // Appel initial pour définir l'état correct au chargement
            togglePoste();
        }



        // Charger toutes les municipalités au démarrage
        document.addEventListener('DOMContentLoaded', function() {
            chargerMunicipalites();
            tooglePosteInput(0);
            const regionAdministrativeSelect = document.getElementById('regionAdministrative');
            regionAdministrativeSelect.addEventListener('change', function() {
                const regionCode = this.value || '';
                chargerMunicipalites(regionCode);
            });

            document.querySelectorAll('.numerotelephone').forEach(function(input) {
                formatTel(input);
            });

            @if (session('coordonnees'))
                let coordonnees = @json(session('coordonnees'));
                console.log(currentIndex);
                const champs = ['numeroCivique', 'bureau', 'rue', 'codePostale', 'province', 'regionAdministrative',
                    'siteWeb'
                ];

                champs.forEach(champ => {
                    if (coordonnees[champ]) {
                        document.getElementById(champ).value = coordonnees[champ];
                    }
                });

                if (coordonnees['ligne']) {
                    Object.keys(coordonnees['ligne']).forEach(index => {
                        const ligne = coordonnees['ligne'][index];
                        if (index == 0) {
                            if (ligne.type) document.getElementById('ligne_0').value = ligne.type;
                            if (ligne.numeroTelephone) document.getElementById('numeroTelephone_0').value =
                                formatTelValue(ligne.numeroTelephone);
                            if (ligne.poste) document.getElementById('poste_0').value = ligne.poste;

                        } else {
                            ajouterNumeroTelephone(index, ligne);
                        }
                    });
                }

                if (coordonnees['province'] === 'Québec') {
                    document.getElementById('regionAdministrative').dispatchEvent(new Event('change'));

                    setTimeout(() => {
                        document.getElementById('municipaliteSelect').value = coordonnees['municipalite'];
                    }, 600);
                } else {
                    document.getElementById('province').dispatchEvent(new Event('change'));
                    document.getElementById('municipaliteInput').value = coordonnees['municipaliteInput'];
                }
            @endif
        });

        // Cache le select de région administrative quand !Québec et affiche un input texte pour les municipalités
        document.getElementById('province').addEventListener('change', function() {
            const province = this.value;
            const regionAdministrativeSelect = document.getElementById('regionAdministrative');
            const municipaliteSelect = document.getElementById('municipaliteSelect');
            const municipaliteInput = document.getElementById('municipaliteInput');

            if (province === 'Québec') {
                regionAdministrativeSelect.parentElement.classList.remove('hidden');
                municipaliteSelect.classList.remove('hidden');
                municipaliteInput.classList.add('hidden');
                municipaliteInput.value = '';
            } else {
                regionAdministrativeSelect.parentElement.classList.add('hidden');
                municipaliteSelect.classList.add('hidden');
                municipaliteInput.classList.remove('hidden');
                regionAdministrativeSelect.value = '';
                municipaliteSelect.value = '';
            }
        });

        // Supprime les espaces dans le champ Code postal et validation du formulaire
        document.querySelector('form').addEventListener('submit', function(event) {
            const province = document.getElementById('province').value;
            const regionAdministrativeSelect = document.getElementById('regionAdministrative');
            const municipaliteSelect = document.getElementById('municipaliteSelect');
            const municipaliteInput = document.getElementById('municipaliteInput');

            if (province !== 'Québec') {
                regionAdministrativeSelect.value = '';
                municipaliteSelect.value = '';
            }
            if (province === 'Québec') {
                municipaliteInput.value = '';
            }
        });

        // Ajout d'un numéro de téléphone
        function ajouterNumeroTelephone(index, ligne = {}) {
            const cadre = document.getElementById('cadreNumero');
            const type = ligne.type || '';
            const numeroTelephone = ligne.numeroTelephone || '';
            const poste = ligne.poste || '';

            cadre.insertAdjacentHTML('beforeend', `
                <div class="mt-6 w-full flex justify-center md:gap-2 columns-2 ligne-numeros" data-index="${index}">
                    <div class="w-full">
                        <label for="ligne_${index}" class="flex justify-center font-Alumni text-md md:text-lg mb-2">Ligne</label>
                        <select id="ligne_${index}" name="ligne[${index}][type]" class="font-Alumni w-full p-2 h-12 focus:outline-none focus:border-blue-500 border border-black">
                            <option value="Bureau" ${type === 'Bureau' ? 'selected' : ''}>Bureau</option>
                            <option value="Télécopieur" ${type === 'Télécopieur' ? 'selected' : ''}>Télécopieur</option>
                            <option value="Cellulaire" ${type === 'Cellulaire' ? 'selected' : ''}>Cellulaire</option>
                        </select>
                    </div>
                    <div class="w-full">
                        <label for="numeroTelephone_${index}" class="block font-Alumni text-md md:text-lg mb-2 truncate">Numéro Téléphone</label>
                        <input type="phonenumber" id="numeroTelephone_${index}" name="ligne[${index}][numeroTelephone]" placeholder="514-453-9867"
                            value="${numeroTelephone}" class="font-Alumni w-full p-2 h-12 focus:outline-none focus:border-blue-500 border border-black numerotelephone">
                    </div>
                    <div class="w-full" id="poste_div_${index}">
                        <label for="poste_${index}" class="flex justify-center font-Alumni text-md md:text-lg mb-2">Poste</label>
                        <input type="text" id="poste_${index}" name="ligne[${index}][poste]" placeholder="9845"
                            value="${poste}" class="font-Alumni w-full p-2 h-12 focus:outline-none focus:border-blue-500 border border-black">
                    </div>
                    <div class="w-full flex flex-row justify-start items-end pl-2">
                        <button type="button" class="remove-ligne cursor-pointer hover:bg-red-500  items-center flex justify-center bg-tertiary-400 text-white h-12 w-12" data-index="${index}">
                            <span class="iconify size-6  remove-ligne" data-icon="mdi:trash-can-outline"></span>
                        </button>
                    </div>
                </div>
            `);
            const nouvelInput = document.getElementById(`numeroTelephone_${index}`);
            tooglePosteInput(index);
            if (nouvelInput) {
                formatTel(nouvelInput);
                nouvelInput.value = formatTelValue(ligne.numeroTelephone);
            }
        }

        document.getElementById('ajoutNumeroTelephone').addEventListener('click', function() {
            currentIndex++;
            ajouterNumeroTelephone(currentIndex);
            document.getElementById('currentIndexInput').value = currentIndex;
        });

        // Suppression d'un numéro de téléphone
        document.getElementById('cadreNumero').addEventListener('click', function(event) {
            const supbtn = event.target.closest('.remove-ligne')
            if (supbtn) {
                Swal.fire({
                    title: "Êtes-vous sûr de vouloir supprimer ce numéro",
                    text: "La suppression n'est pas réversible !",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Supprimer",
                    cancelButtonText: "Annuler",
                }).then((result) => {
                    if (result.isConfirmed) {
                        event.target.closest('.ligne-numeros').remove();
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Suppression du numéro réussie',
                            showConfirmButton: false,
                            timer: 1000
                        });
                    }
                });
            }
        });

        function formatTel(input) {
            input.addEventListener('input', function() {
                let value = input.value.replace(/\D/g, '');
                if (value.length > 3 && value.length <= 6) {
                    value = value.slice(0, 3) + '-' + value.slice(3);
                } else if (value.length > 6) {
                    value = value.slice(0, 3) + '-' + value.slice(3, 6) + '-' + value.slice(6, 10);
                }
                input.value = value;
            });
        }

        function formatTelValue(value) {
            if (!value) return '';
            value = value.replace(/\D/g, '');
            if (value.length > 3 && value.length <= 6) {
                value = value.slice(0, 3) + '-' + value.slice(3);
            } else if (value.length > 6) {
                value = value.slice(0, 3) + '-' + value.slice(3, 6) + '-' + value.slice(6, 10);
            }
            return value;
        }
    </script>

@endsection
