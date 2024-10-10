
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
    