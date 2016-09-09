<?php

namespace Ecommerce;

use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{
    public function detalhes()
    {
    	return $this->hasMany('Ecommerce\ProdutoDetalhes');
    }
}
