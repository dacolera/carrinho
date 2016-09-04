<?php

namespace Ecommerce\Http\Controllers;

use Ecommerce\Categorias;
use Illuminate\Http\Request;
use Ecommerce\Produtos as ProdutosModel;
use Illuminate\Support\Facades\Redis;


class ProdutosController extends Controller
{
    public function index(Request $request, $catId = null)
    {
        $search = $request->get('search', null);

        if (null !== $search) {
            $produtos = 
            ProdutosModel::where(
                'nome', 'like', "%{$search}%"
            )
            ->orWhere('descricao', 'like', "%{$search}%")
            ->paginate(12);
        } else if (null !== $catId) {
            $produtos = 
            ProdutosModel::where(
                'id_categoria', $catId
            )
            ->paginate(12);
        } else {
            $produtos = ProdutosModel::paginate(12);
        }
        
        foreach ($produtos as $produto) {
            Redis::set('produto:'. $produto->id, $produto->nome);
        }

        $categorias = (new Categorias)->getCategorias();
        return view('produtos.listagem', ['produtos' => $produtos, 'categorias' => $categorias, 'search' => $search]);
    }

    public function carrinho(Request $request)
    {
        return view('produtos.carrinho');   
    }
}
