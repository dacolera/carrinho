
@extends('app')

@section('content')
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