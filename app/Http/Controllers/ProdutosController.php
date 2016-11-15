<?php

namespace Ecommerce\Http\Controllers;

use Ecommerce\Categorias;
use Illuminate\Http\Request;
use Ecommerce\Produtos as ProdutosModel;
use Ecommerce\Pedidos as PedidosModel;
use Ecommerce\PedidoDetalhes as PedidoDetalhesModel;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Auth;

class ProdutosController extends Controller
{
    public function index(Request $request, $catId = null)
    {
        $search = $request->get('search', "");
        if ("" !== $search) {
            $produtos = ProdutosModel::search($search)->paginate(12);
        } elseif (null !== $catId) {
            $produtos =
            ProdutosModel::where(
                'id_categoria',
                $catId
            )
            ->paginate(12);
        } else {
            $produtos = ProdutosModel::paginate(12);
        }

        $categorias = (new Categorias)->getCategorias();
        return view('produtos.listagem', ['produtos' => $produtos, 'categorias' => $categorias, 'search' => $search]);
    }

    public function angular()
    {
        $produtos = ProdutosModel::paginate(12);

        return view('produtos.listagem-angular', ['produtos' => $produtos]);
    }

    public function carrinho(Request $request)
    {
        return view('produtos.carrinho', ['produtosCarrinho' => Session('carrinho')]);
    }

    public function addCarrinho(Request $request, $id)
    {
        if (Session('carrinho.'.$id)) {
            Session(
                [
                'carrinho.'.$id.'.quantidade' =>
                (Session('carrinho.'.$id.'.quantidade') + 1)
                ]
            );
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

    public function checkout(Request $request, $idEndereco)
    {
        if (!Session('carrinho')) {
            $request->session()->flash('warning', 'Carrinho Vazio !');
            return redirect('produtos/listagem');
        }



        $carrinho = Session('carrinho');
        //grava pedido
        $pedido = new PedidosModel;
        $pedido->usuario_id = Auth::id();
        $pedido->endereco_id = $idEndereco;
        $pedido->qtd_itens = count($carrinho);
        array_walk(
            $carrinho,
            function (&$item) {
                $item['preco'] *= $item['quantidade'];
            }
        );
        $pedido->valor_total = array_sum(
            array_column(
                $carrinho,
                'preco'
            )
        );
        $ped = $pedido->save();

        //grava detalhes do pedido
        $carrinho = Session('carrinho');
        foreach ($carrinho as $produto) {
            $pedidodetalhe = new PedidoDetalhesModel;
            $pedidodetalhe->pedido_id = $pedido->id;
            $pedidodetalhe->produto_id = $produto['id'];
            $pedidodetalhe->quantidade = $produto['quantidade'];
            $pedidodetalhe->valor_unitario = $produto['preco'];
            $pedidodetalhe->save();
        }
        $request->session()->forget('carrinho');
        $request->session()->flash('success', 'Compra Efetuada com sucesso !');
        return redirect('produtos/listagem');
    }
}
