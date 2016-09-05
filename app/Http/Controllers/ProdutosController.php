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
        $search = $request->get('search', "");

        if ("" !== $search) {
            $produtos = ProdutosModel::search($search)->paginate(12);
        } else if (null !== $catId) {
            $produtos = 
            ProdutosModel::where(
                'id_categoria', $catId
            )
            ->paginate(12);
        } else {
            $produtos = ProdutosModel::paginate(12);
        }

        $categorias = (new Categorias)->getCategorias();
        return view('produtos.listagem', ['produtos' => $produtos, 'categorias' => $categorias, 'search' => $search]);
    }

    public function carrinho(Request $request)
    {
        return view('produtos.carrinho', ['produtosCarrinho' => Session('carrinho')]);   
    }

    public function addCarrinho(Request $request, $id)
    {
        if (Session('carrinho.'.$id)) {
            Session([
                'carrinho.'.$id.'.quantidade' =>
                (Session('carrinho.'.$id.'.quantidade') + 1)
            ]);
        } else {
            $produto = ProdutosModel::where('id', $id)->first();
            $prod_atributes = [
                'id' => $produto->id,
                'nome' => $produto->nome,
                'preco' => $produto->preco
            ];
            Session(['carrinho.'.$id => $prod_atributes]);
            Session(['carrinho.'.$id.'.quantidade' => 1]);
        }
        $request->session()->flash('success', 'Produto adicionado ao carrinho !');
        return redirect('produtos/listagem');
    }
}
