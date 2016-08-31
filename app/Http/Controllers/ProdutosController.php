<?php

namespace Ecommerce\Http\Controllers;

use Illuminate\Http\Request;
use Ecommerce\Produtos as ProdutosModel;


class ProdutosController extends Controller
{
    public function index()
    {
        $produtos = ProdutosModel::paginate(12);
        return view('produtos.listagem', ['produtos' => $produtos]);
    }
}
