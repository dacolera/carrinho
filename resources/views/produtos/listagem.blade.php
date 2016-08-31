
@extends('app')

@section('menu-categorias')
    <ul class="nav navbar-nav navbar-left">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Categorias <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
                @foreach($categorias as $categoria)
                    <li><a href="{{ url('/auth/logout') }}">{{ $categoria->nome }}</a></li>
                @endforeach
            </ul>
        </li>
    </ul>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-8">
                <div class="panel panel-default">
                    <div class="panel-body" style="padding: 10px 0 21px 100px;">
                        <div class="search">
                            <form action="" method="post">
                                {{ csrf_field() }}
                                <input type="text" name="busca" class="form-control input-sm" maxlength="64" placeholder="Busca" />
                                <button type="submit" class="btn2 btn-primary btn-sm">Busca</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row-fluid">
        <div class="container">
            <div id="listagem" class="col-md-10" style="display:block;">
                <div class="lista-produtos">
                    @foreach($produtos as $produto)
                    <div class="col-md-3">
                        <div class="produto" idProduto="{{ $produto->id }}">
                            <a href="#">
                                <img src="{{ asset('/acucar.png') }}" class="img" width="130"/>
                                <p class="nome">{{ $produto->nome }}</p>
                                <p class="preco">R$ {{ $produto->preco }}</p>
                            </a>
                            <div class="opcoes-de-compra">
                                <div class="button-container" style="opacity: 0;"><button type="button" class="buy-button btn btn-success" data-sku="35283" data-product="2033628" data-seller="1" data-available="true" data-skipservice="true" data-departmentid="4699" data-categoryid="4703" data-subcategoryid="4738"><span class="icon" style="opacity: 0;"></span></button></div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {!! $produtos->render() !!}
                </div>
            </div>
        </div>
    </div>
@endsection