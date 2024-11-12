<?php

return[
    'custom'=>[
        'name'=>[
            'required' => 'O campo nome é obrigatório.',
        ],
        'email'=>[
            'required' => 'O campo email é obrigatório.',
            'email' => 'O e-mail informado não é válido.',
        ],
   
        'password'=>[
            'required' => 'O campo senha é obrigatório.',
            'min' => 'Asenha  deve ter pelo menos 6 caracteres.',
        ],
     
],
'min' => [
    'string' => 'O :attribute deve ter pelo menos :min caracteres.',
    'confirmed' => 'A confirmação da senha não corresponde.',
],
];