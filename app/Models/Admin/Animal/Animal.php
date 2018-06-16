<?php

namespace App\Models\Admin\Animal;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $fillable = ['raca','descricao','preco','image','status']; 
}
