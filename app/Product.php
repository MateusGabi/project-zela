<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * Attributes
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'price', 'stock_amount'
    ];

    /**
     * Atributos escondidos
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
