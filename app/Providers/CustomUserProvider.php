<?php

namespace App\Providers;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable;

class CustomUserProvider extends EloquentUserProvider
{
    /**
     * Retrieve a user by the given credentials.
     *
     * @param  array  $credentials
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveByCredentials(array $credentials)
    {
        if (empty($credentials) || (count($credentials) === 1 && array_key_exists('password', $credentials))) {
            return;
        }

        // Remplacer 'email' par 'adresse_courriel' pour chercher l'utilisateur
        $query = $this->createModel()->newQuery();

        foreach ($credentials as $key => $value) {
            if (!str_contains($key, 'password')) {
                if ($key === 'email') {
                    $key = 'adresse_courriel'; // Remplace la clé 'email' par 'adresse_courriel'
                }
                $query->where($key, $value);
            }
        }

        return $query->first();
    }
}
