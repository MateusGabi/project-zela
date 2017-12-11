<?php
/**
 * Created by PhpStorm.
 * User: mateu
 * Date: 09/12/2017
 * Time: 14:36
 */

namespace App\Strategies;

use App\Purchase;
use App\User;

class CreditCardPaymentStrategy extends PaymentStrategy
{

    function pay(User $user, Purchase $compra)
    {
        // TODO: Implement pay() method.
    }
}