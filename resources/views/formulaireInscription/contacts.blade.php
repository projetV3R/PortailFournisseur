@vite(['resources/css/app.css', 'resources/js/app.js'])

@extends('layouts.app')

@section('title', 'Contacts')

@section('contenu')

<form action="{{ route('storeContacts') }}" method="post" id="contactForm">
    @csrf
    
    <div class="flex w-full lg:flex-col flex-col gap-4 p-8 lg:p-16" id="contactFieldsContainer">
        <div class="flex w-full flex-col 2xl:flex-row gap-4">
           
            <div class="flex w-full flex-col">
                <h6 class="font-Alumni font-bold text-3xl md:text-5xl text-black dark:text-white">CONTACTS</h6>
                <h1 class="font-Alumni font-semibold text-md md:text-lg mt-2 text-black dark:text-gray-300">
                    Pour rester plus proches de vous !
                </h1>
            </div>
            <div id="stepbardiv">
            @include('partials.progress_bar')
             </div>
        </div>
        <div class="flex w-full gap-x-4">
            <div class="flex flex-col w-1/2">
                <div class="bg-primary-100 dark:bg-primary-dark-100 py-8 px-4 mt-8">
                    <h4 class="font-Alumni font-bold text-lg md:text-2xl underline text-black dark:text-white">
                        Information générale
                    </h4>

                    <div class="mt-6 w-full max-w-md flex gap-4 columns-2">
                        <div class="w-full">
                            <label for="prenom" class="block font-Alumni text-md md:text-lg mb-2 text-black dark:text-white">
                                Prenom
                            </label>
                            <input type="text" id="prenom" name="contacts[0][prenom]" placeholder="Doe"
                                class="font-Alumni w-full p-2 h-12 focus:outline-none focus:border-blue-500 border border-black dark:border-gray-600 dark:bg-gray-800 dark:text-white">
                            @error('contacts.0.prenom')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-4 w-full max-w-md">
                        <label for="nom" class="block font-Alumni text-md md:text-lg mb-2 text-black dark:text-white">
                            Nom
                        </label>
                        <input type="text" id="nom" name="contacts[0][nom]" placeholder="John"
                            class="font-Alumni w-full p-2 h-12 focus:outline-none focus:border-blue-500 border border-black dark:border-gray-600 dark:bg-gray-800 dark:text-white">
                        @error('contacts.0.nom')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mt-4 w-full max-w-md flex gap-4 columns-2">
                        <div class="w-full">
                            <label for="fonction" class="block font-Alumni text-md md:text-lg mb-2 text-black dark:text-white">
                                Fonction
                            </label>
                            <input type="text" id="fonction" name="contacts[0][fonction]" placeholder="Comptable"
                                class="font-Alumni w-full p-2 h-12 focus:outline-none focus:border-blue-500 border border-black dark:border-gray-600 dark:bg-gray-800 dark:text-white">
                            @error('contacts.0.fonction')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-4 w-full max-w-md flex gap-4 columns-2">
                        <div class="w-full">
                            <label for="email" class="block font-Alumni text-md md:text-lg mb-2 text-black dark:text-white">
                                Email
                            </label>
                            <input type="text" id="email" name="contacts[0][email]" placeholder="johndoe@gmail.com"
                                class="font-Alumni w-full p-2 h-12 focus:outline-none focus:border-blue-500 border border-black dark:border-gray-600 dark:bg-gray-800 dark:text-white">
                            @error('contacts.0.email')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Deuxième colonne -->
            <div class="bg-secondary-100 dark:bg-secondary-dark-100 lg:py-10 mt-8 w-full lg:max-w-4xl flex flex-col h-fit">
                <div class="bg-secondary-100 dark:bg-secondary-dark-100 lg:py-8 lg:px-4 px-2 flex flex-col">
                    <div class="w-full flex">
                        <h4 class="font-Alumni font-bold text-lg md:text-2xl underline text-black dark:text-white">
                            Numero de téléphone
                        </h4>
                    </div>
                    <div class="mt-6 w-full max-w-md flex gap-4 lg:flex-row flex-col">
                        <div class="w-full">
                            <label for="ligne" class="block font-Alumni text-md md:text-lg mb-2 text-black dark:text-white">
                                Ligne
                            </label>
                            <select id="type" name="contacts[0][type]"
                                class="font-Alumni w-full p-2 h-12 focus:outline-none focus:border-blue-500 border border-black dark:border-gray-600 dark:bg-gray-800 dark:text-white">
                                <option value="Bureau">Bureau</option>
                                <option value="Télécopieur">Télécopieur</option>
                                <option value="Cellulaire">Cellulaire</option>
                            </select>
                            @error('contacts.0.type')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="w-full">
                            <label for="numeroTelephone" class="block font-Alumni text-md md:text-lg mb-2 truncate text-black dark:text-white">
                                Numero Téléphone
                            </label>
                            <input type="text" id="numeroTelephone" name="contacts[0][numeroTelephone]"
                                placeholder="514-453-9867"
                                class="font-Alumni w-full p-2 h-12 focus:outline-none focus:border-blue-500 border border-black dark:border-gray-600 dark:bg-gray-800 dark:text-white">
                            @error('contacts.0.numeroTelephone')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="w-full">
                            <label for="poste" class="block font-Alumni text-md md:text-lg mb-2 text-black dark:text-white">
                                Poste
                            </label>
                            <input type="text" id="poste" name="contacts[0][poste]" placeholder="9845"
                                class="font-Alumni w-full p-2 h-12 focus:outline-none focus:border-blue-500 border border-black dark:border-gray-600 dark:bg-gray-800 dark:text-white">
                            @error('contacts.0.poste')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="flex flex-col px-2 lg:px-4">
                    <button type="submit" id="submitBtn"
                        class="w-full text-white bg-tertiary-400 dark:bg-tertiary-dark-400 hover:bg-tertiary-300 dark:hover:bg-tertiary-dark-300 py-2.5 mt-2">
                        <h1 class="font-Alumni font-bold text-lg md:text-2xl ">
                            {{ session()->has('contacts') ? 'Enregistrer' : 'Suivant' }}
                        </h1>
                    </button>
                    <button id="addContactBtn" type="button"
                        class="w-full text-white bg-blue-500 dark:bg-blue-700 hover:bg-blue-400 dark:hover:bg-blue-600 py-2.5 mt-2">
                        <h1 class="font-Alumni font-bold text-lg md:text-2xl">Ajouter un autre contact</h1>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

    <script>
 document.addEventListener('DOMContentLoaded', function() {

    document.querySelectorAll('[name^="contacts"][name$="[numeroTelephone]"]').forEach(function(input) {
        formatTel(input);
    
    });


    @if(session('contacts'))
        let contacts = @json(session('contacts'));
        if (Array.isArray(contacts)) {
            contacts.forEach((contact, index) => {
                if (index > 0) {
                    ajouterContactFields(index, contact);
                } else {
                    remplirPremierContact(contact);
                }
            });
            reindexContacts(); 
        }
    @endif
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


document.getElementById('addContactBtn').addEventListener('click', function() {
    var contactFieldsContainer = document.getElementById('contactFieldsContainer');
    var clone = contactFieldsContainer.cloneNode(true);
    var currentIndex = document.querySelectorAll('[name^="contacts"]').length / 7;


    clone.querySelector('#addContactBtn')?.remove();
    clone.querySelector('#submitBtn')?.remove();
    clone.querySelector('#stepbardiv')?.remove();


    clone.querySelectorAll('input, select').forEach(function(input) {
        var name = input.getAttribute('name');
        if (name) {
            var newName = name.replace(/\[0\]/, '[' + currentIndex + ']');
            input.setAttribute('name', newName);
        }
        input.value = '';
        if (input.name.includes('numeroTelephone')) {
            formatTel(input); 
        }
    });


    var deleteButton = document.createElement('button');
    deleteButton.type = 'button';
    deleteButton.classList.add('w-1/2', 'text-xl', 'flex', 'items-center', 'text-white', 'justify-center', 'bg-red-500', 'hover:bg-red-400', 'py-2.5', 'mt-2');
    deleteButton.innerHTML = '<span class="iconify size-10" data-icon="mdi:bin"></span> Supprimer';
    deleteButton.addEventListener('click', function() {
        clone.remove();
        reindexContacts();
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Suppression du contact réussie',
            showConfirmButton: false,
            timer: 1500
        });
    });
    clone.appendChild(deleteButton);

 
    contactFieldsContainer.parentNode.appendChild(clone);
});


function reindexContacts() {
    document.querySelectorAll('[name^="contacts"]').forEach((input, index) => {
        let name = input.getAttribute('name');
        name = name.replace(/\[.*?\]/, '[' + Math.floor(index / 7) + ']');
        input.setAttribute('name', name);
        if (input.name.includes('numeroTelephone')) {
            formatTel(input);
        }
    });
}


function remplirPremierContact(contact) {
    document.querySelector('input[name="contacts[0][prenom]"]').value = contact.prenom || '';
    document.querySelector('input[name="contacts[0][nom]"]').value = contact.nom || '';
    document.querySelector('input[name="contacts[0][fonction]"]').value = contact.fonction || '';
    document.querySelector('input[name="contacts[0][email]"]').value = contact.email || '';
    document.querySelector('select[name="contacts[0][type]"]').value = contact.type || 'Bureau';
    document.querySelector('input[name="contacts[0][numeroTelephone]"]').value = formatTelValue(contact.numeroTelephone || '');
    document.querySelector('input[name="contacts[0][poste]"]').value = contact.poste || '';
}


function formatTelValue(value) {
    value = value.replace(/\D/g, '');
    if (value.length > 3 && value.length <= 6) {
        value = value.slice(0, 3) + '-' + value.slice(3);
    } else if (value.length > 6) {
        value = value.slice(0, 3) + '-' + value.slice(3, 6) + '-' + value.slice(6, 10);
    }
    return value;
}


function ajouterContactFields(index, contact = {}) {
    var contactFieldsContainer = document.getElementById('contactFieldsContainer');
    var clone = contactFieldsContainer.cloneNode(true);
    clone.querySelector('#addContactBtn')?.remove();
    clone.querySelector('#submitBtn')?.remove();
    clone.querySelector('#stepbardiv')?.remove();

    clone.querySelectorAll('input, select').forEach(function(input) {
        var name = input.getAttribute('name');
        if (name) {
            var newName = name.replace(/\[0\]/, '[' + index + ']');
            input.setAttribute('name', newName);
        }

        if (name.includes('prenom') && contact.prenom) input.value = contact.prenom;
        if (name.includes('nom') && contact.nom) input.value = contact.nom;
        if (name.includes('fonction') && contact.fonction) input.value = contact.fonction;
        if (name.includes('email') && contact.email) input.value = contact.email;
        if (name.includes('type') && contact.type) input.value = contact.type;
        if (name.includes('numeroTelephone') && contact.numeroTelephone) {
            input.value = formatTelValue(contact.numeroTelephone);
        }
        if (name.includes('poste')) input.value = contact.poste || '';
    });


    var deleteButton = document.createElement('button');
    deleteButton.type = 'button';
    deleteButton.classList.add('w-full', 'text-xl', 'flex', 'items-center', 'text-white', 'justify-center', 'bg-red-500', 'hover:bg-red-400', 'py-2.5', 'mt-2');
    deleteButton.innerHTML = '<span class="iconify size-10" data-icon="mdi:bin"></span> Supprimer';
    deleteButton.addEventListener('click', function() {
        clone.remove();
        reindexContacts();
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Suppression du contact réussie',
            showConfirmButton: false,
            timer: 1500
        });
    });
    clone.appendChild(deleteButton);

    contactFieldsContainer.parentNode.appendChild(clone);
}

    </script>

@endsection
