@extends('app')

@section('content')
<div class="row-fluid carrinho">
    <div class="container" style="margin-top: 64px;">
        <div class="col-md-3">
        	@include('produtos.menu-cliente')
        </div>
        <div class="col-md-9">
        	<img src="" class="img-responsive banner">
        </div>
        <div class="col-md-9 painel">
        	<h1>Meu Carrinho</h1>
            <div class="table-responsive">
			<form action="" name="formOrc" id="formOrc" method="post">
				<input type="hidden" id="enviaForm" name="enviaForm">
                 <table class="table">
                    <tr>
                        <th colspan="2">ITENS DO CARRINHO</th>
                        <th>PREÇO UNITÁRIO</th>
                        <th>QNT.</th>
                        <th>SUB-TOTAL</th>
                    </tr>
            @if(@isset($produtosCarrinho))						
				@foreach($produtosCarrinho as $produto)
                    <tr class="prod{{ $produto['dadosProduto']['idProduto'] }}">
                        <td class="btn-excluir" style="cursor:pointer"><img src="/images/carrinho-excluir.png" class="img-responsive banner" style="display: none; margin:3px;"></td>
                        <td class="produto" idProduto="{{ $produto['dadosProduto']['idProduto'] }}">
                            <img src="http://www.impakto.com.br/sistema/imagem/produtos/pr{{ $produto['dadosProduto']['codProduto'] }}.jpg" class="img-responsive" width="37" height="51">
                            <div class="info">
                                <p class="nome">{{ $produto['dadosProduto']['nomeProduto'] }}</p>
                                <p class="codigo">código: {{ $produto['dadosProduto']['codProduto'] }}</p>
                            </div>
                        </td>
                        <td><p class="preco">{{ $produto['dadosPrecificacao']['preco'] }}</p></td>
                        <td>
                            <div class="operacao">
                                <div class="subtrair" style="cursor:pointer">-</div>
                                <input type="text" value="{{ $produto['qtd'] }}" class="quantidade">
                                <div class="somar" style="cursor:pointer">+</div>
                            </div>
                        </td>
                        <td class="subtotal">{{ $produto['dadosPrecificacao']['subtotal'] }}</td>
                    </tr>
                @endforeach
            @endif
                </table>
				</form>
            </div>
            <div class="pull-right ajusta-responsivo" style="width:100%;">
            	<p class="total">Total: <strong>preco</strong></p>
                <div class="pull-right ajusta-responsivo" style="width:100%;">
                    <span class="btn btn-primary">Continuar Comprando</span>
                    
                    <div class="btn btn-danger right">Fechar Pedido</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection