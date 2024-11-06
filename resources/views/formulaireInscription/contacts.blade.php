@vite(['resources/css/app.css', 'resources/js/app.js'])

@extends('layouts.app')

@section('title', 'Contacts')

@section('contenu')

<form action="{{ route('storeContacts') }}" method="post" id="contactForm">
    @csrf
    <div class="flex w-full lg:flex-col flex-col gap-2 p-4 lg:p-8" id="contactFieldsContainer">
        <div class="flex w-full flex-col">
            <h6 class="font-Alumni font-bold text-3xl md:text-5xl">CONTACTS</h6>
            <h1 class="font-Alumni font-semibold text-md md:text-lg mt-2">Pour rester plus proches de vous !</h1>
        </div>

        <div class="flex w-full gap-x-4">
            <div class="flex flex-col w-1/2">
                <div class="bg-primary-100 py-8 px-4 mt-8">
                    <h4 class="font-Alumni font-bold text-lg md:text-2xl underline">Information generale</h4>

                    <div class="mt-6 w-full max-w-md flex gap-4 columns-2">
                        <div class="w-full">
                            <label for="prenom" class="block font-Alumni text-md md:text-lg mb-2">
                                Prenom
                            </label>
                            <input type="text" id="prenom" name="contacts[0][prenom]" placeholder="Doe"
                                class="font-Alumni w-full p-2 h-12 focus:outline-none focus:border-blue-500 border border-black">
                            @error('contacts.0.prenom')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-4 w-full max-w-md">
                        <label for="nom" class="block font-Alumni text-md md:text-lg mb-2">
                            Nom
                        </label>
                        <input type="text" id="nom" name="contacts[0][nom]" placeholder="John"
                            class="font-Alumni w-full p-2 h-12 focus:outline-none focus:border-blue-500 border border-black">
                        @error('contacts.0.nom')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mt-4 w-full max-w-md flex gap-4 columns-2">
                        <div class="w-full">
                            <label for="fonction" class="block font-Alumni text-md md:text-lg mb-2">
                                Fonction
                            </label>
                            <input type="text" id="fonction" name="contacts[0][fonction]" placeholder="Comptable"
                                class="font-Alumni w-full p-2 h-12 focus:outline-none focus:border-blue-500 border border-black">
                            @error('contacts.0.fonction')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-4 w-full max-w-md flex gap-4 columns-2">
                        <div class="w-full">
                            <label for="email" class="block font-Alumni text-md md:text-lg mb-2">
                                Email
                            </label>
                            <input type="text" id="email" name="contacts[0][email]" placeholder="johndoe@gmail.com"
                                class="font-Alumni w-full p-2 h-12 focus:outline-none focus:border-blue-500 border border-black">
                            @error('contacts.0.email')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Deuxième colonne -->
            <div class="bg-secondary-100 lg:py-10 mt-8 w-full lg:max-w-4xl flex flex-col h-fit">
                <div class="bg-secondary-100 lg:py-8 lg:px-4 px-2 flex flex-col">
                    <div class="w-full flex">
                        <h4 class="font-Alumni font-bold text-lg md:text-2xl underline">Numero de telephone</h4>
                    </div>
                    <div class="mt-6 w-full max-w-md flex gap-4 lg:flex-row flex-col">
                        <div class="w-full">
                            <label for="ligne" class="block font-Alumni text-md md:text-lg mb-2">
                                Ligne
                            </label>
                            <select id="type" name="contacts[0][type]"
                                class="font-Alumni w-full p-2 h-12 focus:outline-none focus:border-blue-500 border border-black">
                                <option value="Bureau">Bureau</option>
                                <option value="Télécopieur">Télécopieur</option>
                                <option value="Cellulaire">Cellulaire</option>
                            </select>
                            @error('contacts.0.type')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="w-full">
                            <label for="numeroTelephone" class="block font-Alumni text-md md:text-lg mb-2 truncate">
                                Numero Telephone
                            </label>
                            <input type="text" id="numeroTelephone" name="contacts[0][numeroTelephone]"
                                placeholder="514-453-9867"
                                class="font-Alumni w-full p-2 h-12 focus:outline-none focus:border-blue-500 border border-black">
                            @error('contacts.0.numeroTelephone')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="w-full">
                            <label for="poste" class="block font-Alumni text-md md:text-lg mb-2">
                                Poste
                            </label>
                            <input type="text" id="poste" name="contacts[0][poste]" placeholder="9845"
                                class="font-Alumni w-full p-2 h-12 focus:outline-none focus:border-blue-500 border border-black">
                            @error('contacts.0.poste')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="flex flex-col px-2 lg:px-4">
                    <button type="submit"
                        class="w-full text-white bg-tertiary-400 hover:bg-tertiary-300 py-2.5 mt-2" id="submitBtn">
                        <h1 class="font-Alumni font-bold text-lg md:text-2xl">Suivant</h1>
                    </button>
                    <button id="addContactBtn" type="button"
                        class="w-full text-white bg-blue-500 hover:bg-blue-400 py-2.5 mt-2">
                        <h1 class="font-Alumni font-bold text-lg md:text-2xl">Ajouter un autre contact</h1>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="swiper-container flex relative w-full lg:flex-col flex-col gap-2 p-4 lg:p-8 overflow-hidden">
        <div class="swiper-wrapper">
            <!-- Pagination si nécessaire -->
        </div>
        <div class="swiper-pagination absolute bottom-2 inset-x-0 flex justify-center"></div>
        <div class="swiper-button-prev absolute left-2 top-1/2 transform -translate-y-1/2 text-blue-500"></div>
        <div class="swiper-button-next absolute right-2 top-1/2 transform -translate-y-1/2 text-blue-500"></div>

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

        initializeSwiper();
    });

    const swiper = new Swiper('.swiper-container', {
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        centeredSlides: true,
        slidesPerView: 1,
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

    let currentContactIndex = 0;

    document.getElementById('addContactBtn').addEventListener('click', function() {
        const contactFieldsContainer = document.getElementById('contactFieldsContainer');
        const clone = contactFieldsContainer.cloneNode(true);
        const currentIndex = document.querySelectorAll('[name^="contacts"]').length / 7; // Adjust index calculation if necessary

        currentContactIndex++;

        // Remove buttons from the cloned element
        clone.querySelector('#addContactBtn')?.remove();
        clone.querySelector('#submitBtn')?.remove();

        // Create a new Swiper slide
        const newSlide = document.createElement('div');
        newSlide.classList.add('swiper-slide', 'w-full', 'justify-center', 'p-10', 'pl-8');
        newSlide.appendChild(clone);

        // Reset input values in cloned fields
        clone.querySelectorAll('input, select').forEach(function(input) {
            const name = input.getAttribute('name');
            if (name) {
                input.setAttribute('name', name.replace(/\[0\]/, `[${currentIndex}]`));
                input.value = ''; // Clear input value
                if (name.includes('numeroTelephone')) {
                    formatTel(input); // Reapply formatting
                }
            }
        });

        // Create a delete button for the slide
        const deleteButton = document.createElement('button');
        deleteButton.type = 'button';
        deleteButton.classList.add('w-1/2', 'text-xl', 'flex', 'items-center', 'text-white', 'justify-center', 'bg-red-500', 'hover:bg-red-400', 'p-5', 'mt-2');
        deleteButton.innerHTML = '<span class="iconify size-10" data-icon="mdi:bin"></span> Supprimer';
        deleteButton.addEventListener('click', function() {
            Swal.fire({
                position: 'top-center',
                title: "Êtes-vous sûr de vouloir supprimer?",
                text: "La suppression n'est pas réversible !",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#0076D5",
                cancelButtonColor: "#d33",
                confirmButtonText: "Supprimer",
                cancelButtonText: "Annuler"
            }).then((result) => {
                if (result.isConfirmed) {
                    newSlide.remove(); // Remove the slide from the DOM
                    swiper.update(); // Update Swiper instance
                    reindexContacts(); // Reindex remaining contacts
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Suppression du contact réussie',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            });
        });

        newSlide.appendChild(deleteButton);
        document.querySelector('.swiper-wrapper').appendChild(newSlide);
        swiper.appendSlide(newSlide); // Add the new slide to Swiper
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

        const newSlide = document.createElement('div');
        newSlide.classList.add('swiper-slide')

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
        deleteButton.classList.add('w-1/2', 'text-xl', 'flex', 'items-center', 'text-white', 'justify-center', 'bg-red-500', 'hover:bg-red-400', 'py-2.5', 'mt-2');
        deleteButton.innerHTML = '<span class="iconify size-10" data-icon="mdi:bin"></span> Supprimer';
        deleteButton.addEventListener('click', function() {
            Swal.fire({
                position: 'top-center',
                title: "Êtes-vous sur de vouloir supprimer?",
                text: "La suppression n'est pas réversible !",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#0076D5",
                cancelButtonColor: "#d33",
                confirmButtonText: "Supprimer",
                cancelButtonText: "Annuler"
            }).then((result) => {
                if (result.isConfirmed) {
                    clone.remove();
                    reindexContacts();
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Suppression du contact réussie',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            });
        });
        clone.appendChild(deleteButton);
        newSlide.appendChild(clone); // Ajouter le clone à la nouvelle slide
        document.querySelector('.swiper-wrapper').appendChild(newSlide); // Ajouter la slide au wrapper Swiper
        swiper.appendSlide(newSlide); // Ajouter la nouvelle slide au Swiper

        swiper.update(); // Mettre à jour Swiper
    }
</script>

@endsection