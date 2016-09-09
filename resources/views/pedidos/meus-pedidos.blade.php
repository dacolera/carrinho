@extends('app')

@section('content')
<div class="container-fluid">
	<h2>Meus Pedidos</h2>
	@if($pedidos->count())
	<ul class="list-group">
	    <li class="list-group-item">
		  	<div class="row">
		  		<div class="col-md-3"><strong>Id Pedido</strong></div>
		  		<div class="col-md-3"><strong>Quantidade de Itens</strong></div>
		  		<div class="col-md-2"><strong>Valor Total</strong></div>
		  		<div class="col-md-2"><strong>Data da Compra</strong></div>
		  		<div class="col-md-2"><strong>Ver Detalhes</strong></div>
			</div>
		</li>
		@foreach($pedidos as $pedido)
	  	<li class="list-group-item">
		  	<div class="row">
		  		<div class="col-md-3">{{ $pedido->id }}</div>
		  		<div class="col-md-3">{{ $pedido->qtd_itens }}</div>
		  		<div class="col-md-2">{{ $pedido->valor_total }}</div>
		  		<div class="col-md-2">{{ $pedido->created_at }}</div>
		  		<div class="col-md-2">
		  			<a class="btn btn-success" href="/usuario/pedido-detalhes/{{ $pedido->id }}">Detalhes</a>
		  		</div>
			</div>
		</li>
		@endforeach
	</ul>
		@if($pedidos->hasPages())
	        {!! $pedidos->render() !!}
	    @endif
	@endif
</div>
@endsection