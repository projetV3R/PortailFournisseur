@extends('layouts.app')

@section('title', 'BrochuresCartesAffaires')

@section('contenu')
<div class="container mx-auto mt-10">
    <div class="flex w-full flex-col 2xl:flex-row gap-4 p-4">
        <div class="flex flex-col w-full">
            <h6 class="font-Alumni font-bold text-3xl md:text-5xl">Brochures et Cartes d'affaires</h6>
            <h1 class="font-Alumni font-semibold text-md md:text-lg mt-2">Déposer vos brochures et cartes d'affaires.</h1>
        </div>
       
    </div>
    @include('partials.progress_bar')
    <form id="fileUploadForm" action="{{ route('storeBrochuresCartesAffaires') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="bg-primary-100 py-8 px-4">
            <h4 class="font-Alumni font-bold text-lg md:text-2xl underline">Brochures et cartes d'affaires</h4>
     
            <!-- Input de fichiers -->
            <input type="file" id="fileInput" name="fichiers[]" multiple
                   accept=".doc,.docx,.pdf,.jpg,.jpeg,.xls,.xlsx"
                   class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none mt-4">

            <!-- Liste des fichiers sélectionnés -->
            <h5 class="mt-4 font-bold">Fichiers sélectionnés :</h5>
            <ul id="fileList" class="list-disc mt-2 ml-6 text-sm text-gray-700"></ul>

            <!-- Affichage des fichiers déjà téléversés -->
            @if (session()->has('brochures_cartes_affaires'))
                <h5 class="mt-4 font-bold">Fichiers déjà téléversés :</h5>
                <ul id="uploadedFileList" class="list-disc mt-2 ml-6 text-sm text-gray-700"></ul>
            @endif

            <!-- Taille totale -->
            <p id="totalFileSize" class="text-sm text-gray-500 mt-2">Taille totale : 0 Mo / {{ $maxFileSize }} Mo</p>

            <!-- Champ caché pour les fichiers à supprimer -->
            <div id="fichiersASupprimerContainer"></div>

            <!-- Message de validation -->
            <div id="messageContainer" class="mt-4 text-sm text-red-500"></div>

            <!-- Bouton de soumission -->
            <button type="submit" id="uploadButton" class="mt-4 w-full text-white bg-blue-500 hover:bg-blue-400 py-2.5">
                <h1 class="font-Alumni font-bold text-lg md:text-2xl">Téléverser</h1>
            </button>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const fileInput = document.getElementById('fileInput');
    const fileList = document.getElementById('fileList');
    const uploadedFileList = document.getElementById('uploadedFileList');
    const totalFileSizeDisplay = document.getElementById('totalFileSize');
    const messageContainer = document.getElementById('messageContainer');
    const uploadButton = document.getElementById('uploadButton');

    const MAX_TOTAL_SIZE_MB = {{ $maxFileSize }}; // Taille totale max en Mo

    let totalSize = 0; // en Mo

    // Récupérer les brochures depuis la session
    const brochuresFromSession = {!! json_encode(session('brochures_cartes_affaires', [])) !!};

   
    let indicesFichiersASupprimer = [];

    // **Calculer la taille des fichiers déjà téléversés (non supprimés)**
    brochuresFromSession.forEach((brochure, index) => {
        if (!indicesFichiersASupprimer.includes(index)) {
            totalSize += brochure.taille / (1024 * 1024); 
        }
    });


    afficherFichiersDejaTeleverses();
    updateUI();

    function afficherFichiersDejaTeleverses() {
        uploadedFileList.innerHTML = ''; 
     
        const anciensChamps = document.querySelectorAll('input[name="fichiers_a_supprimer[]"]');
        anciensChamps.forEach(champ => champ.remove());

        brochuresFromSession.forEach((brochure, index) => {
            if (!indicesFichiersASupprimer.includes(index)) {
                const listItem = document.createElement('li');
                listItem.textContent = `${brochure.nom} - ${(brochure.taille / (1024 * 1024)).toFixed(2)} Mo`;

                // Bouton supprimer
                const deleteButton = document.createElement('button');
                deleteButton.type = 'button';
                deleteButton.textContent = 'Supprimer';
                deleteButton.className = 'text-red-500 ml-2';
                deleteButton.addEventListener('click', () => {
                    indicesFichiersASupprimer.push(index);
                    totalSize -= brochure.taille / (1024 * 1024); // Soustraire la taille du fichier
                    afficherFichiersDejaTeleverses();
                    updateUI();
                });

                listItem.appendChild(deleteButton);
                uploadedFileList.appendChild(listItem);
            } else {
                // Ajouter un champ caché pour cet index à supprimer
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'fichiers_a_supprimer[]';
                input.value = index;
                document.getElementById('fileUploadForm').appendChild(input);
            }
        });
    }

    function updateUI() {
        totalFileSizeDisplay.textContent = `Taille totale : ${totalSize.toFixed(2)} Mo / ${MAX_TOTAL_SIZE_MB} Mo`;

        if (totalSize > MAX_TOTAL_SIZE_MB) {
            messageContainer.innerHTML = `<p>La taille totale dépasse la limite de ${MAX_TOTAL_SIZE_MB} Mo. Veuillez retirer des fichiers pour vous conformer à la taille maximum.</p>`;
            uploadButton.disabled = true;
            uploadButton.classList.add('bg-gray-400', 'cursor-not-allowed');
            uploadButton.classList.remove('bg-blue-500', 'hover:bg-blue-400');
        } else {
            messageContainer.innerHTML = '';
            uploadButton.disabled = false;
            uploadButton.classList.add('bg-blue-500', 'hover:bg-blue-400');
            uploadButton.classList.remove('bg-gray-400', 'cursor-not-allowed');
        }
    }

    fileInput.addEventListener('change', function () {
        messageContainer.innerHTML = ''; // Réinitialiser les messages
        fileList.innerHTML = ''; // Réinitialiser la liste

        let newFilesTotalSize = 0;
        const files = Array.from(fileInput.files);

        files.forEach(file => {
            newFilesTotalSize += file.size;

            const listItem = document.createElement('li');
            listItem.textContent = `${file.name} - ${(file.size / (1024 * 1024)).toFixed(2)} Mo`;
            fileList.appendChild(listItem);
        });

        // Recalculer la taille totale
        totalSize = newFilesTotalSize / (1024 * 1024); // Convertir en Mo

        // Ajouter la taille des fichiers déjà téléversés (non supprimés)
        brochuresFromSession.forEach((brochure, index) => {
            if (!indicesFichiersASupprimer.includes(index)) {
                totalSize += brochure.taille / (1024 * 1024); // Convertir en Mo
            }
        });

        updateUI();
    });

});

</script>
@endsection
