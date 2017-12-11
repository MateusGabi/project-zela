<?php

namespace App\Workflow;

use App\Purchase;
use App\User;

class PurchaseWorkflow extends Workflow
{
    protected $artifact;

    protected $places = [
        'Cliente',
        'Estoque',
        'Financeiro',
        'Entrega',
        'Admin'
    ];

    protected $transitions = [
        'confirmando_estoque' => [
            'from' => 'Cliente',
            'to'   => 'Estoque',
        ],
        'validando_pagamento' => [
            'from' => 'Estoque',
            'to'   => 'Financeiro',
        ],
        'empacotando' => [
            'from' => 'Financeiro',
            'to' => 'Estoque'
        ],
        'em_entrega' => [
            'from' => 'Estoque',
            'to' => 'Entrega'
        ]
    ];

    function __construct(Purchase $compra)
    {
        $this->artifact = $compra;
    }

    function notify($oldStatus, $newStatus, $isNext = true)
    {
        $text = "Mudança de estado: " . $oldStatus . " => " . $newStatus . ($isNext ? ". Avança " : ". Volta ") . "no processo. <br>";
        print $text;
    }

    function authorize($action)
    {

        $user_role = "Estoque";

        // verifica se $action esta no array
        if (!in_array($action, $this->actions)) return false;


        // demais regras

        if($user_role == "Admin") return true;

        if($user_role == "Cliente" && $action == "update") return true;

        if($action == "read") return true;

        return !false;

    }
}