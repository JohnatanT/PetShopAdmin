<?php

namespace App\Models\Admin\Produto;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome','descricao','preco','image','status']; 
}
