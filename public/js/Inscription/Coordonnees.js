document.getElementById('ajoutNumeroTelephone').addEventListener('click', function() {
    let cadre = document.getElementById('cadreNumero');

    // Ajoute une nouvelle ligne avec les inputs et le bouton de suppression
    cadre.insertAdjacentHTML('beforeend', `
        <div class="mt-6 w-full max-w-md flex gap-4 columns-2 ligne-numeros">

            <div class="w-full">
                <label for="ligne" class="block font-Alumni text-md md:text-lg mb-2">Ligne</label>
                
                        <select name="ligne" id="ligne" name="ligne[]" class="font-Alumni w-full p-2 h-12 focus:outline-none focus:border-blue-500 border border-black">
                            <option value="Bureau">Bureau</option>
                            <option value="Télécopieur">Télécopieur</option>
                            <option value="Cellulaire">Cellulaire</option>
                        </select>
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
            button.closest('.ligne-numeros').remove();
        });
    });
});

//Supprime les espaces créer par l'utilisateur dans l'input de code postale
document.getElementById('codePostale').addEventListener('input', function() {
this.value = this.value.replace(/\s+/g, ''); 
});
       

//Ajoute les municipalités en fonction de la region admnistrative choisit dans le select
document.getElementById('regionAdministrative').addEventListener('change', function() {
    const regionCode = this.value;
    const municipaliteSelect = document.getElementById('municipaliteSelect');
   

    if (regionCode) {
        axios.get('/municipalites-par-region', { params: { region: regionCode } })
            .then(response => {
                response.data.forEach(muni => {
                    let option = new Option(muni.munnom, muni.munnom);
                    municipaliteSelect.add(option);
                });
            })
            .catch(error => console.error('Erreur lors de la récupération des municipalités:', error));
    }
});

//Cache le select de région admnistrative quand !Québec et affiche un input text a la place d'un select pour les municipalités
document.getElementById('province').addEventListener('change', function() {
const province = this.value;
const regionAdministrativeSelect = document.getElementById('regionAdministrative');
const municipaliteSelect = document.getElementById('municipaliteSelect');
const municipaliteInput = document.getElementById('municipaliteInput');

if (province === 'Québec') {

regionAdministrativeSelect.parentElement.classList.remove('hidden');
municipaliteSelect.classList.remove('hidden');
municipaliteInput.classList.add('hidden');
municipaliteInput.value='';
} else {

regionAdministrativeSelect.parentElement.classList.add('hidden');
municipaliteSelect.classList.add('hidden');
municipaliteInput.classList.remove('hidden');


regionAdministrativeSelect.value = '';
municipaliteSelect.value = '';
}
});

document.querySelector('form').addEventListener('submit', function(event) {
const province = document.getElementById('province').value;
const regionAdministrativeSelect = document.getElementById('regionAdministrative');
const municipaliteSelect = document.getElementById('municipaliteSelect');
const municipaliteInput = document.getElementById('municipaliteInput');

// Double validation de sup des champs 
if (province !== 'Québec') {
regionAdministrativeSelect.value = '';
municipaliteSelect.value = '';
}

// Double validation de sup des champs 
if (province === 'Québec') {
municipaliteInput.value = '';
}
});

