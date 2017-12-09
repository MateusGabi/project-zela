<?php
/**
 * Created by PhpStorm.
 * User: mateu
 * Date: 09/12/2017
 * Time: 12:58
 */

namespace App\Workflow;


use App\Compra;

class CompraWorkflow extends Workflow
{
    protected $artifact;

    protected $places = [
        'Edicao',
        'Confirmado_Estoque',
        'Pagamento_Aceito',
        'Empacotado',
        'Entregue'
    ];

    protected $transitions = [
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
    ];

    function __construct(Compra $compra)
    {
        $this->artifact = $compra;
    }
}