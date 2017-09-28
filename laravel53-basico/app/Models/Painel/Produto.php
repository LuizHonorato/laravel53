<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
      'nomeProduto', 'numeroProduto', 'ativo', 'category', 'descricaoProduto'
    ];
    //protected $guarded = [''];


    public $messages = [
      'nomeProduto.required' => 'O campo nome é obrigatório.'
    ];


    public $rules = [
      'nomeProduto'      => 'required|min:3|max:100',
      'numeroProduto'    => 'required|numeric',
      'category'         => 'required',
      'descricaoProduto' => 'min:3|max:1000'
    ];
}
