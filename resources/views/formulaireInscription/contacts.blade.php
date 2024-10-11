@vite(['resources/css/app.css', 'resources/js/app.js'])

@extends('layouts.app')

@section('title', 'Contacts')

@section('contenu')

    <form action="{{ route('storeContacts') }}" method="post" id="contactForm">
        
        @csrf
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 p-8 lg:p-16" id="contactFieldsContainer">
            <!-- Première colonne -->

            <div >
                <h6 class="font-Alumni font-bold text-3xl md:text-5xl">CONTACTS</h6>
                <h1 class="font-Alumni font-semibold text-md md:text-lg mt-2">Pour rester plus proches de vous !</h1>

                <div class="bg-primary-100 py-8 px-4 mt-8 ">
                    <h4 class="font-Alumni font-bold text-lg md:text-2xl underline">Information generale</h4>

                    <div class="mt-6 w-full max-w-md flex gap-4 columns-2 ">
                        <div class="w-full">
                            <label for="prenom" class="block font-Alumni text-md md:text-lg mb-2">
                                Prenom
                            </label>
                            <input type="text" id="prenom" name="contacts[0][prenom]" placeholder="Doe"
                                class="font-Alumni w-full p-2 h-12 h-12focus:outline-none focus:border-blue-500 border border-black">

                            @error('prenom')
                                <span
                                    class="font-Alumni text-lg flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-4 w-full max-w-md">
                        <label for="nom" class="block font-Alumni text-md md:text-lg mb-2">
                            Nom
                        </label>

                        <input type="text" id="nom" name="contacts[0][nom]" placeholder="John"
                            class="font-Alumni w-full p-2 h-12 h-12focus:outline-none focus:border-blue-500 border border-black">

                        @error('nom')
                            <span
                                class="font-Alumni text-lg flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="mt-4 w-full max-w-md flex gap-4 columns-2 ">

                        <div class="w-full">
                            <label for="fonction" class="block font-Alumni text-md md:text-lg mb-2">
                                Fonction
                            </label>
                            <input type="text" id="fonction" name="contacts[0][fonction]" placeholder="Comptable"
                                class="font-Alumni w-full p-2 h-12 h-12focus:outline-none focus:border-blue-500 border border-black">

                            @error('fonction')
                                <span
                                    class="font-Alumni text-lg flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-4 w-full max-w-md flex gap-4 columns-2 ">

                        <div class="w-full">
                            <label for="email" class="block font-Alumni text-md md:text-lg mb-2">
                                Email
                            </label>
                            <input type="text" id="email" name="contacts[0][email]" placeholder="johndoe@gmail.com"
                                class="font-Alumni w-full p-2 h-12 h-12focus:outline-none focus:border-blue-500 border border-black">

                            @error('email')
                                <span
                                    class="font-Alumni text-lg flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Deuxième colonne -->
            <div>
                <h6 class="font-Alumni text-white font-bold text-3xl md:text-5xl hide">Merci de vous identifier !</h6>
                <h1 class="font-Alumni text-white font-semibold text-md md:text-lg mt-2">Dites-nous en plus sur vous
                </h1>

                <div class="bg-secondary-100 py-8 px-4 mt-8">
                    <h4 class="font-Alumni font-bold text-lg md:text-2xl underline">Numero de telephone</h4>

                    <div class="mt-6 w-full max-w-md flex gap-4 columns-2 ">

                        <div class="w-full">
                            <label for="ligne" class="block font-Alumni text-md md:text-lg mb-2">
                                Ligne
                            </label>
                            <select  id="ligne" name="contacts[0][ligne]" class="font-Alumni w-full p-2 h-12 focus:outline-none focus:border-blue-500 border border-black">
                                <option value="Bureau">Bureau</option>
                                <option value="Télécopieur">Télécopieur</option>
                                <option value="Cellulaire">Cellulaire</option>
                            </select>

                            @error('ligne')
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

                            <input type="phonenumber" id="numeroTelephone" name="contacts[0][numeroTelephone]" placeholder="514-453-9867"
                                class="font-Alumni w-full p-2 h-12 focus:outline-none focus:border-blue-500 border border-black">

                            @error('numeroTelephone')
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

                            <input type="text" id="poste" name="contacts[0][poste]" placeholder="9845"
                                class="font-Alumni w-full p-2 h-12 focus:outline-none focus:border-blue-500 border border-black">

                            @error('poste')
                                <span
                                    class="font-Alumni text-lg flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                    {{ $message }}
                                </span>
                            @enderror

                        </div>
                    </div>
                </div>

                <button type="submit" class=" w-full text-white bg-tertiary-400 hover:bg-tertiary-300 py-2.5 mt-2">
                    <h1 class="font-Alumni font-bold text-lg md:text-2xl">Suivant</h1>
                </button>
                <button  id="addContactBtn" type="button" class=" w-full text-white bg-blue-500 hover:bg-blue-400 py-2.5 mt-2">
                    <h1 class="font-Alumni font-bold text-lg md:text-2xl">Ajouter un autre contact</h1>
                </button>
             
                

            </div>
        </div>
    </form>
    <script>
document.getElementById('addContactBtn').addEventListener('click', function() {
    var contactFieldsContainer = document.getElementById('contactFieldsContainer');
    
    // Cloner le conteneur
    var clone = contactFieldsContainer.cloneNode(true);
    
    var currentIndex = document.querySelectorAll('[name^="contacts"]').length / 7; // Calculer l'index en fonction des champs existants

    // Modifier les noms des inputs dans le clone
    clone.querySelectorAll('input, select').forEach(function(input) {
        var name = input.getAttribute('name');
        if (name) {
            var newName = name.replace(/\[0\]/, '[' + currentIndex + ']');
            input.setAttribute('name', newName);
        }
        input.value = ''; // Réinitialiser les valeurs
    });

    // Ajout du bouton supprimer dans le clone
    var deleteButton = document.createElement('button');
    deleteButton.type = 'button';
    deleteButton.classList.add('w-full', 'text-xl', 'flex', 'items-center', 'text-white', 'justify-center', 'bg-red-500', 'hover:bg-red-400', 'py-2.5', 'mt-2');
    deleteButton.innerHTML = '<span class="iconify size-10" data-icon="mdi:bin"></span> Supprimer';
    deleteButton.addEventListener('click', function() {
        clone.remove();
    });
    clone.appendChild(deleteButton);

    contactFieldsContainer.parentNode.appendChild(clone);
});

document.addEventListener('DOMContentLoaded', function() {
    @if(session('contacts'))
    let sessionData = @json(session('contacts'));

    // Extraire le tableau contacts de l'objet sessionData
    let contacts = sessionData.contacts;

    // Vérifier que contacts est bien un tableau
    if (Array.isArray(contacts)) {
        // Remplir le premier contact si présent
        if (contacts.length > 0 && contacts[0]) {
            const contact = contacts[0];
            document.querySelector('input[name="contacts[0][prenom]"]').value = contact.prenom || '';
            document.querySelector('input[name="contacts[0][nom]"]').value = contact.nom || '';
            document.querySelector('input[name="contacts[0][fonction]"]').value = contact.fonction || '';
            document.querySelector('input[name="contacts[0][email]"]').value = contact.email || '';
            document.querySelector('select[name="contacts[0][ligne]"]').value = contact.ligne || 'Bureau';
            document.querySelector('input[name="contacts[0][numeroTelephone]"]').value = contact.numeroTelephone || '';
            document.querySelector('input[name="contacts[0][poste]"]').value = contact.poste || '';
        }

        // Ajouter dynamiquement des formulaires de contact supplémentaires s'il y a plus d'un contact
        contacts.forEach((contact, index) => {
            if (index > 0) {
                ajouterContactFields(index, contact);
            }
        });
    } else {
        console.error("Les contacts ne sont pas un tableau :", contacts);
    }
    @endif
});


function ajouterContactFields(index, contact = {}) {
    const contactFieldsContainer = document.getElementById('contactFieldsContainer');
    var clone = contactFieldsContainer.cloneNode(true);
    
    clone.querySelector('button[type="submit"]').remove();
    clone.querySelector('#addContactBtn').remove();

    clone.querySelectorAll('input, select').forEach(function(input) {
        var name = input.getAttribute('name');
        if (name) {
            var newName = name.replace(/\[0\]/, '[' + index + ']');
            input.setAttribute('name', newName);
        }
  
        input.value = contact[input.getAttribute('name').match(/\[([^\]]+)\]$/)[1]] || '';
    });

    var deleteButton = document.createElement('button');
    deleteButton.type = 'button';
    deleteButton.classList.add('w-full', 'text-xl', 'flex', 'items-center', 'text-white', 'justify-center', 'bg-red-500', 'hover:bg-red-400', 'py-2.5', 'mt-2');
    deleteButton.innerHTML = '<span class="iconify size-10" data-icon="mdi:bin"></span> Supprimer';
    deleteButton.addEventListener('click', function() {
        clone.remove();
    });
    clone.appendChild(deleteButton);


    contactFieldsContainer.parentNode.appendChild(clone);
}



    </script>
    
    
@endsection

