
@extends('app')

@section('menu-categorias')
    @if(@isset($categorias))
    <ul class="nav navbar-nav navbar-left">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Categorias <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
                @foreach($categorias as $categoria)
                    <li><a href="{{ url("/produtos/listagem/$categoria->id") }}">{{ $categoria->nome }}</a></li>
                @endforeach
            </ul>
        </li>
    </ul>
    @endif
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-8">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="search">
                            <input type="text" name="search" class="form-control input-sm" id="search-input" maxlength="64" placeholder="Busca" value="{{ $search }}" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row-fluid">
        <div class="container">
        @if(Session::has('success'))
        <div class="alert alert-success temp">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ Session('success') }} 
        </div>
        @endif
            <div id="listagem" class="col-md-10" style="display:block;">
                <div class="lista-produtos">
                @if($produtos->count())
                    @foreach($produtos as $produto)
                    <div class="col-md-3">
                        <div class="produto" idProduto="{{ $produto->id }}">
                            <a href="/addcarrinho/{{ $produto->id }}">
                                <img src="{{ asset('/acucar.png') }}" class="img" width="130"/>
                                <p class="nome">{{ $produto->nome }}</p>
                                <p class="preco">R$ {{ $produto->preco }}</p>
                            </a>
                        </div>
                    </div>
                    @endforeach
                    @if($produtos->hasPages())
                        {!! $produtos->render() !!}
                    @endif
                @else
                    @if($search)
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        Desculpe, não conseguimos encontrar o produto que voce procurou. Tente novamente com termos mais genericos.
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    Desculpe, esta categoria não possui produtos.
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif 
                @endif
                </div>
            </div>
        </div>
    </div>
@endsection