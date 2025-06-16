<?php

return [
    'required' => 'Le champ :attribute est requis.',
    'email' => 'Le champ :attribute doit être une adresse e-mail valide.',
    'max' => [
        'string' => 'Le champ :attribute ne peut pas dépasser :max caractères.',
    ],
    'password' => [
            'min' => 'Le mot de passe doit contenir au moins :min caractères.',
            'mixed' => 'Le mot de passe doit contenir à la fois des lettres majuscules et minuscules.',
            'letters' => 'Le mot de passe doit contenir au moins une lettre.',
            'numbers' => 'Le mot de passe doit contenir au moins un chiffre.',
            'symbols' => 'Le mot de passe doit contenir au moins un caractère spécial.',
            'uncompromised' => 'Le mot de passe saisi a été compromis dans une fuite de données. Veuillez en choisir un autre.',
    ],
    'confirmed' => 'La confirmation de :attribute ne correspond pas.',
    'unique' => 'L\'attribut :attribute est déjà utilisé.',

    'attributes' => [
        'email' => 'adresse e-mail',
        'password' => 'mot de passe',
    ],
    'phone' => 'Cet :attribute doit être un numéro valide.',
] ;


