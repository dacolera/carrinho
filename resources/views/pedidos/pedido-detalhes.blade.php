@extends('app')

@section('content')
<div class="container-fluid">
	<h2>Detalhes do Pedido</h2>
	@if($pedidoDetalhes->count())
	<ul class="list-group">
	    <li class="list-group-item">
		  	<div class="row">
		  		<div class="col-md-1"><strong>Id Produto</strong></div>
		  		<div class="col-md-2"><strong>Nome Produto</strong></div>
		  		<div class="col-md-2"><strong>Foto</strong></div>
		  		<div class="col-md-1"><strong>Quantidade</strong></div>
		  		<div class="col-md-2"><strong>Preco Unitario</strong></div>
		  		<div class="col-md-2"><strong>Preco Subtotal</strong></div>
		  		<div class="col-md-2"><strong>Caracteristicas</strong></div>
			</div>
		</li>
		@foreach($pedidoDetalhes as $produto)
	  	<li class="list-group-item">
		  	<div class="row">
		  		<div class="col-md-1">{{ $produto->id }}</div>
		  		<div class="col-md-2">{{ $produto->produto->nome }}</div>
		  		<div class="col-md-2">
		  			<img src="http://ecommerce.app/acucar.png" class="img-responsive" width="37" height="51">
		  		</div>
		  		<div class="col-md-1">{{ $produto->quantidade }}</div>
		  		<div class="col-md-2">{{ $produto->valor_unitario }}</div>
		  		<div class="col-md-2">{{ $produto->valor_unitario * $produto->quantidade }}</div>
		  		<div class="col-md-2">
		  			<a class="btn btn-success" href="/usuario/produto-caracteristicas/{{ $produto->id }}">Detalhes</a>
		  		</div>
			</div>
		</li>
		@endforeach
	</ul>
		@if($pedidoDetalhes->hasPages())
			{!! $pedidoDetalhes->render() !!}
		@endif
	@endif
</div>
@endsection