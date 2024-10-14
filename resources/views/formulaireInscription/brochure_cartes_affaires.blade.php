@extends('layouts.app')

@section('title', 'BrochuresCartesAffaires')

@section('contenu')
<div class="container mx-auto mt-10">
    <form id="fileUploadForm" enctype="multipart/form-data">
        @csrf
        <div class="bg-primary-100 py-8 px-4">
            <h4 class="font-Alumni font-bold text-lg md:text-2xl underline">Brochures et cartes d'affaires</h4>

         
            <input type="file" id="fileInput" name="fichiers[]" multiple
                   accept=".doc,.docx,.pdf,.jpg,.jpeg,.xls,.xlsx"
                   class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none mt-4">

        
            <p id="totalFileSize" class="text-sm text-gray-500 mt-2">Taille totale : 0 Mo / {{ $maxFileSize }} Mo</p>

          
            <ul id="fileList" class="list-disc mt-4 ml-6"></ul>

         
            <div id="messageContainer" class="mt-4 text-sm"></div>

      
            <button type="button" id="uploadBtn" class="mt-4 w-full text-white bg-blue-500 hover:bg-blue-400 py-2.5">
                <h1 class="font-Alumni font-bold text-lg md:text-2xl">Téléverser</h1>
            </button>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const fileInput = document.getElementById('fileInput');
    const fileList = document.getElementById('fileList');
    const totalFileSizeDisplay = document.getElementById('totalFileSize');
    const uploadBtn = document.getElementById('uploadBtn');
    const messageContainer = document.getElementById('messageContainer');

    let totalFileSize = 0;
    let filesArray = [];

    function updateFileList() {
        fileList.innerHTML = ''; 
        totalFileSize = 0;

        filesArray.forEach((file, index) => {
            totalFileSize += file.size;

            const listItem = document.createElement('li');
            listItem.classList.add('flex', 'justify-between', 'items-center', 'mt-2');

            const fileInfo = document.createElement('span');
            fileInfo.textContent = `${file.name} - ${(file.size / 1024 / 1024).toFixed(2)} Mo`;

            const deleteButton = document.createElement('button');
            deleteButton.textContent = 'Supprimer';
            deleteButton.classList.add('ml-4', 'bg-red-500', 'text-white', 'px-2', 'py-1', 'rounded');
            deleteButton.addEventListener('click', function() {
               
                if (file.path) { 
                    axios.post('/delete-brochure', { path: file.path })
                        .then(response => {
                            console.log('Fichier supprimé');
                        })
                        .catch(error => {
                            console.log('Erreur lors de la suppression du fichier');
                        });
                }
                
               
                filesArray.splice(index, 1);
                updateFileList();
            });

            listItem.appendChild(fileInfo);
            listItem.appendChild(deleteButton);
            fileList.appendChild(listItem);
        });

        totalFileSizeDisplay.textContent = `Taille totale : ${(totalFileSize / (1024 * 1024)).toFixed(2)} Mo / {{ $maxFileSize }} Mo`;
    }

    // Vérifier s'il y a des fichiers en session
    @if(session()->has('brochures_cartes_affaires'))
        const brochures = @json(session('brochures_cartes_affaires'));
        brochures.forEach(brochure => {
            const file = {
                name: brochure.nom,
                size: brochure.taille,
                type: brochure.type_de_fichier,
                path: brochure.chemin 
            };
            filesArray.push(file);
        });
        updateFileList(); 
    @endif

    fileInput.addEventListener('change', function() {
        const newFiles = Array.from(fileInput.files);
        filesArray = filesArray.concat(newFiles);

        updateFileList();
        fileInput.value = ''; 
    });

    uploadBtn.addEventListener('click', function() {
        const formData = new FormData();
        filesArray.forEach((file) => {
            formData.append('fichiers[]', file);
        });

        axios.post('{{ route('storeBrochuresCartesAffaires') }}', formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        })
        .then(response => {
            if (response.data.success) {
                window.location.href = '{{ route("createContacts") }}';
            }
        })
        .catch(error => {
            if (error.response && error.response.status === 422) {
                messageContainer.innerHTML = `<p class="text-red-500">Erreur lors du téléversement : ${error.response.data.message}</p>`;
            } else {
                messageContainer.innerHTML = '<p class="text-red-500">Erreur lors du téléversement des fichiers.</p>';
            }
        });
    });
});


</script>
@endsection
