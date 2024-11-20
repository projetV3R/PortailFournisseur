@extends('layouts.app')

@section('title', 'Lien déjà utilisé')

@section('contenu')
<div>
    <div class="container mx-auto p-8">
        <div class="text-center">
            <h1 class="font-bold text-3xl">Lien de réinitialisation déjà utilisé</h1>
            <p class="mt-4">Ce lien de réinitialisation de mot de passe a déjà été utilisé ou a expiré. Veuillez demander un nouveau lien.</p>
            <button type="button" id="forgot-password-btn" class="btn btn-primary mt-6">Demander un nouveau lien</button>

        </div>
    </div>
</div>
    
    <script>
    document.getElementById('forgot-password-btn').addEventListener('click', function() {
        Swal.fire({
            title: 'Réinitialiser votre mot de passe',
            input: 'email',
            inputLabel: 'Entrez votre adresse email',
            inputPlaceholder: 'exemple@domaine.com',
            showCancelButton: true,
            confirmButtonText: 'Envoyer',
            showLoaderOnConfirm: true,
            preConfirm: (email) => {
                const csrfTokenElement = document.querySelector('meta[name="csrf-token"]');
                if (!csrfTokenElement) {
                    Swal.showValidationMessage(
                        'Erreur : le token CSRF est introuvable dans la page.'
                    );
                    return;
                }

                const csrfToken = csrfTokenElement.getAttribute('content');

                return axios.post('/password/email', {
                    adresse_courriel: email
                }, {
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    }
                })
                .then(response => {
                    return response.data;
                })
                .catch(error => {
                    let errorMessage = 'Impossible d\'envoyer l\'email de réinitialisation.';
                    if (error.response && error.response.data && error.response.data.message) {
                        errorMessage = error.response.data.message;
                    }
                    Swal.showValidationMessage(`Erreur: ${errorMessage}`);
                });
            },
            allowOutsideClick: () => !Swal.isLoading()
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Email envoyé!',
                    text: 'Si cet email existe, un lien de réinitialisation vous a été envoyé.',
                    icon: 'success'
                });
            }
        });
    });
</script>
@endsection
