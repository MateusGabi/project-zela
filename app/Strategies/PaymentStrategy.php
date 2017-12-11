<?php
/**
 * Created by PhpStorm.
 * User: mateu
 * Date: 09/12/2017
 * Time: 14:34
 */

namespace App\Strategies;


use App\Purchase;
use App\User;

abstract class PaymentStrategy implements Strategy
{
    abstract function pay(User $user, Purchase $compra);
}