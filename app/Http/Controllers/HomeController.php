<?php

namespace Ecommerce\Http\Controllers;

use Illuminate\Http\Request;
use Ecommerce\User;
use Ecommerce\Pedidos;
use Ecommerce\PedidoDetalhes;
use Illuminate\Support\Facades\Auth;
use Ecommerce\Enderecos;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('produtos/listagem');
    }

    public function userPerfil($id)
    {
        $user = User::where('id', $id)->first();

        return view('user.perfil', ['user' => $user]);
    }

    public function meusPedidos()
    {
        $pedidos = Pedidos::where('usuario_id', Auth::id())->paginate(3);
        
        return view('pedidos.meus-pedidos', ['pedidos' => $pedidos]);
    }

    public function pedidoDetalhes(Request $request, $idPedido)
    {
        $pedidoDetalhes = PedidoDetalhes::where('pedido_id', $idPedido)->paginate(3);

        return view('pedidos.pedido-detalhes', ['pedidoDetalhes' => $pedidoDetalhes]);
    }

    public function enderecoEntrega()
    {
        $enderecos = Enderecos::where('usuario_id', Auth::id())->paginate(3);

        return view('pedidos.endereco-entrega', ['enderecos' => $enderecos]);
    }
}
