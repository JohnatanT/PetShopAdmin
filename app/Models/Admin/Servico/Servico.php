<?php

namespace App\Models\Admin\Servico;

use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    protected $fillable = ['nome','descricao','preco','image','status']; 
}
