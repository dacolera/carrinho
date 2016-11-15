<?php

namespace Ecommerce;

use Illuminate\Database\Eloquent\Model;

class PedidoDetalhes extends Model
{
    public function produto()
    {
        return $this->belongsTo('Ecommerce\Produtos');
    }
}
