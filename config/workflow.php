<?php

return [
    'straight'   => [
        'type'          => 'workfow',
        'marking_store' => [
            'type' => 'multiple_state',
            'arguments' => ['currentPlace']
        ],
        'supports'      => ['App\Purchase'],
        'places'        => [
            'Edicao',
            'Confirmado_Estoque',
            'Pagamento_Aceito',
            'Empacotado',
            'Entregue'
        ],
        'transitions'   => [
            'confirmando_estoque' => [
                'from' => 'Edicao',
                'to'   => 'Confirmado_Estoque',
            ],
            'validando_pagamento' => [
                'from' => 'Confirmado_Estoque',
                'to'   => 'Pagamento_Aceito',
            ],
            'empacotando' => [
                'from' => 'Pagamento_Aceito',
                'to' => 'Empacotado'
            ],
            'em_entrega' => [
                'from' => 'Empacotado',
                'to' => 'Entregue'
            ]
        ],
    ]
];
