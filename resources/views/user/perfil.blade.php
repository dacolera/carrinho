@extends('app')

@section('content')
	<div class="row">
		<h1>Meu Perfil</h1>
		<div class="col-md-6">
			<span>Nome: </span>
		</div>
		<div class="col-md-6">
			{{ $user->name }}
		</div>
		<div class="col-md-6">
			<span>Email: </span>
		</div>
		<div class="col-md-6">
			{{ $user->email }}
		</div>
	</div>

	@if ($user->enderecos)
	<div class="row">
		<h1>Enderecos</h1>
		@foreach($user->enderecos as $endereco)
		<div class="col-md-6">
			<span>Endereco: </span>
		</div>
		<div class="col-md-6">
			{{ $endereco->endereco }}
		</div>
		<div class="col-md-6">
			<span>Numero: </span>
		</div>
		<div class="col-md-6">
			{{ $endereco->numero }}
		</div>
		<div class="col-md-6">
			<span>Complemento: </span>
		</div>
		<div class="col-md-6">
			{{ $endereco->complemento }}
		</div>
		<div class="col-md-6">
			<span>CEP: </span>
		</div>
		<div class="col-md-6">
			{{ $endereco->cep }}
		</div>
		<div class="col-md-6">
			<span>Bairro: </span>
		</div>
		<div class="col-md-6">
			{{ $endereco->bairro }}
		</div>
		<div class="col-md-6">
			<span>Estado: </span>
		</div>
		<div class="col-md-6">
			{{ $endereco->estado }}
		</div>
		<div class="col-md-6">
			<span>Pais: </span>
		</div>
		<div class="col-md-6">
			{{ $endereco->pais }}
		</div>
		@endforeach
	</div>
	@endif

@endsection