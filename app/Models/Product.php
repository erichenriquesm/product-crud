<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Product extends Model 
{ 

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'nome', 
        'valor',
        'descricao'
    ];

}
