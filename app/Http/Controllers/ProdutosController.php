<?php

namespace Ecommerce\Http\Controllers;

use Ecommerce\Categorias;
use Illuminate\Http\Request;
use Ecommerce\Produtos as ProdutosModel;
use Illuminate\Support\Facades\Redis;


class ProdutosController extends Controller
{
    public function index()
    {
        $produtos = ProdutosModel::paginate(12);
        foreach ($produtos as $produto) {
            Redis::set('produto:'. $produto->id, $produto->nome);
        }

        $categorias = Categorias::all();
        return view('produtos.listagem', ['produtos' => $produtos, 'categorias' => $categorias]);
    }
}
