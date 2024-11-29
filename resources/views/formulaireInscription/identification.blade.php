@extends('layouts.app')

@section('title', 'Identification')

@section('contenu')

    <form action="{{ route('StoreIdentification') }}" method="post">
        @csrf
        <div class="p-4 md:p-16 flex flex-col  w-full">
            <div class="flex w-full flex-col 2xl:flex-row gap-4 ">
                <div class="flex flex-col w-full">
                    <h6 class="font-Alumni font-bold text-3xl md:text-5xl">Merci de vous identifier !</h6>
                    <h1 class="font-Alumni font-semibold text-md md:text-lg mt-2">Dites-nous en plus sur vous</h1>

                </div>
                @include('partials.progress_bar')
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 ">
                <!-- Première colonne -->
                <div>
                    <div class="bg-primary-100 py-8 px-4 mt-8">
                        <h4 class="font-Alumni font-bold text-lg md:text-2xl underline">Informations d’authentification</h4>

                        <div class="mt-6">
                            <label for="email" class="block font-Alumni text-md md:text-lg mb-2">
                                Adresse courriel
                            </label>
                            <input type="email" id="email" name="email" placeholder="Entrer votre email"
                                value="{{ old('email', session('identification.email')) }}"
                                class="font-Alumni w-full max-w-md p-2 focus:outline-none focus:border-blue-500 border border-black">

                            @error('email')
                                <span
                                    class="font-Alumni text-lg flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="password" class="block font-Alumni text-md md:text-lg mb-2">
                                Choisir un mot de passe
                            </label>
                            <input type="password" id="password" name="password" placeholder="Entrer votre mot de passe"
                                value="{{ old('password', session('identification.password')) }}"
                                class="font-Alumni w-full max-w-md p-2 focus:outline-none focus:border-blue-500 border border-black">

                            @error('password')
                                <span
                                    class="font-Alumni text-lg flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="password_confirmation" class="block font-Alumni text-md md:text-lg mb-2">
                                Ressaisir votre mot de passe
                            </label>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                value="{{ old('password_confirmation', session('identification.password_confirmation')) }}"
                                placeholder="Ressaisir votre mot de passe"
                                class="font-Alumni w-full max-w-md p-2 focus:outline-none focus:border-blue-500 border border-black">

                            @error('password_confirmation')
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
                    <div class="bg-secondary-100 py-8 px-4 mt-8">
                        <h4 class="font-Alumni font-bold text-lg md:text-2xl underline">Identification</h4>

                        <div class="mt-6">
                            <label for="numeroEntreprise" class="flex items-center font-Alumni text-md md:text-lg mb-2">
                                Numéro d’entreprise du Québec (NEQ)
                                <p class="italic text-sm ml-2">*Ce numéro n'est pas obligatoire</p>
                            </label>
                            <input type="text" id="numeroEntreprise" name="numeroEntreprise"
                                value="{{ old('numeroEntreprise', session('identification.numeroEntreprise')) }}"
                                placeholder="Entrer votre numéro d’entreprise du Québec"
                                class="font-Alumni w-full max-w-md p-2 focus:outline-none focus:border-blue-500 border border-black">

                            @error('numeroEntreprise')
                                <span
                                    class="font-Alumni text-lg flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="mt-6">
                            <label for="nomEntreprise" class="block font-Alumni text-md md:text-lg mb-2">
                                Nom de l’entreprise
                            </label>
                            <input type="text" id="nomEntreprise" name="nomEntreprise"
                                value="{{ old('nomEntreprise', session('identification.nomEntreprise')) }}"
                                placeholder="Entrer le nom de votre entreprise"
                                class="font-Alumni w-full max-w-md p-2 focus:outline-none focus:border-blue-500 border border-black">

                            @error('nomEntreprise')
                                <span
                                    class="font-Alumni text-lg flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div id="loader"
                            class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
                            <div class="relative w-24 h-24">
                                <div class="absolute inset-0 border-4 border-blue-500 rounded-full animate-ping"></div>
                                <div
                                    class="absolute inset-0 border-4 border-t-blue-500 border-b-blue-500 border-l-transparent border-r-transparent rounded-full animate-spin">
                                </div>
                                <div
                                    class="absolute inset-4 border-4 border-blue-500 rounded-full opacity-50 animate-pulse">
                                </div>
                            </div>
                        </div>



                        <button type="submit" id="fetchLicenceBtn"
                            class="mt-9 w-full text-white bg-tertiary-400 hover:bg-tertiary-300 py-2.5 daltonien:hover:bg-daltonienYellow daltonien:hover:text-black">
                            <h1 class="font-Alumni font-bold text-lg md:text-2xl">
                                {{ session()->has('identification') ? 'Enregistrer' : 'Suivant' }}
                            </h1>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        document.getElementById('fetchLicenceBtn').addEventListener('click', async function(event) {
            event.preventDefault();

            const loader = document.getElementById('loader');
            loader.classList.remove('hidden');

            const neq = document.getElementById('numeroEntreprise').value;

            const sqlQuery = `SELECT * FROM "32f6ec46-85fd-45e9-945b-965d9235840a" WHERE "NEQ" = '${neq}'`;
            const apiUrl =
                `https://donneesquebec.ca/recherche/api/action/datastore_search_sql?sql=${encodeURIComponent(sqlQuery)}`;

            try {
                const response = await fetch(apiUrl, {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json',
                    },
                });

                if (response.ok) {
                    const data = await response.json();

                    if (data.success && data.result.records.length > 0) {
                        const numeroLicence = data.result.records[0]['Numero de licence'] || null;
                        const statut = data.result.records[0]['Statut de la licence'] ?
                            String(data.result.records[0]['Statut de la licence']).toLowerCase() :
                            null;

                        const rawTypeLicence = data.result.records[0]['Type de licence'] ?
                            String(data.result.records[0]['Type de licence']).toLowerCase() :
                            null;

                        const typeLicence = rawTypeLicence === 'constructeur-proprietaire' ?
                            'Constructeur-propriétaire' :
                            rawTypeLicence;

                        const sousCategorie = data.result.records
                            .filter(record => record['Categorie'] !== null && record['Sous-categories'] !==
                                null)
                            .map(record => parseFloat(record['Sous-categories'].trim()))
                            .filter((value, index, self) => self.indexOf(value) === index)
                            .sort((a, b) => a - b);

                        console.log('Sous-catégories uniques :', sousCategorie);

                        const fetchSousCategorieIds = async (sousCategories) => {
                            const ids = [];

                            for (const code of sousCategories) {
                                try {
                                    const response = await fetch(`/sous-categorie/${code}`, {
                                        method: 'GET',
                                        headers: {
                                            'Accept': 'application/json',
                                            'X-Requested-With': 'XMLHttpRequest',
                                        },
                                    });

                                    if (response.ok) {
                                        const data = await response.json();
                                        if (data.id) {
                                            ids.push(data.id);
                                        }
                                    } else {
                                        console.warn(`Sous-categorie ${code} non trouvée ou erreur.`);
                                    }
                                } catch (error) {
                                    console.error(`Erreur lors de la récupération pour ${code}:`,
                                        error);
                                }
                            }

                            return ids;
                        };

                        const sousCategorieIds = await fetchSousCategorieIds(sousCategorie);

                        const licencesData = {
                            numeroLicence,
                            statut,
                            typeLicence,
                            sousCategorie: sousCategorieIds,
                        };

                        await fetch('/Identification/autoCompletageLicence', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                    .getAttribute('content'),
                                'X-Requested-With': 'XMLHttpRequest',
                            },
                            body: JSON.stringify(licencesData),
                        });

                        document.querySelector('form').submit();
                    } else {
                        Swal.fire({
                            position: "center",
                            icon: "info",
                            title: "Aucune licence trouvée pour ce NEQ.",
                            showConfirmButton: true,
                        });
                        document.querySelector('form').submit();
                    }

                } else {
                    Swal.fire({
                        position: "center",
                        icon: "info",
                        title: "Erreur lors de la récupération des données.",
                        showConfirmButton: true,
                    });

                }
            } catch (error) {
                console.error('Erreur:', error);
                Swal.fire({
                    position: "center",
                    icon: "info",
                    title: "Une erreur s'est produite lors de la requête.",
                    showConfirmButton: true,
                });
            } finally {
                // Masquer le loader après la requête
                loader.classList.add('hidden');
            }
        });
    </script>

@endsection
