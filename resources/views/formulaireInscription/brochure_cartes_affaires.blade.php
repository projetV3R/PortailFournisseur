@extends('layouts.app')

@section('title', 'BrochuresCartesAffaires')

@section('contenu')
<div class="container mx-auto mt-10">
    <form id="fileUploadForm" action="{{ route('storeBrochuresCartesAffaires') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="bg-primary-100 py-8 px-4">
            <h4 class="font-Alumni font-bold text-lg md:text-2xl underline">Brochures et cartes d'affaires</h4>

            <!-- Input de fichiers -->
            <input type="file" id="fileInput" name="fichiers[]" multiple
                   accept=".doc,.docx,.pdf,.jpg,.jpeg,.xls,.xlsx"
                   class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none mt-4">

            <!-- Liste des fichiers sélectionnés -->
            <ul id="fileList" class="list-disc mt-4 ml-6 text-sm text-gray-700"></ul>

            <!-- Taille totale -->
            <p id="totalFileSize" class="text-sm text-gray-500 mt-2">Taille totale : 0 Mo / {{ $maxFileSize }} Mo</p>

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
    const totalFileSizeDisplay = document.getElementById('totalFileSize');
    const messageContainer = document.getElementById('messageContainer');
    const uploadButton = document.getElementById('uploadButton');

    const MAX_TOTAL_SIZE_MB = {{ $maxFileSize }}; // Taille totale max en Mo

    function updateUI(totalSizeMB) {
        totalFileSizeDisplay.textContent = `Taille totale : ${totalSizeMB.toFixed(2)} Mo / ${MAX_TOTAL_SIZE_MB} Mo`;

        if (totalSizeMB > MAX_TOTAL_SIZE_MB) {
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
        let totalSize = 0;

        const files = Array.from(fileInput.files);

        files.forEach(file => {
            totalSize += file.size;

            const listItem = document.createElement('li');
            listItem.textContent = `${file.name} - ${(file.size / (1024 * 1024)).toFixed(2)} Mo`;
            fileList.appendChild(listItem);
        });

        const totalSizeMB = totalSize / (1024 * 1024); // Convertir en Mo
        updateUI(totalSizeMB);
    });
});
</script>
@endsection
