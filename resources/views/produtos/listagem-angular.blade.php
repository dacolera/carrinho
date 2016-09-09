
@extends('app')

@section('content')
    <div class="container" ng-controller="ProductsController">
        <div class="row">
            <div class="col-md-4 col-md-offset-8">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="search">
                            <input type="text" name="search" class="form-control input-sm"  maxlength="64" placeholder="Busca" value="" ng-keyup="search()" ng-model="query"  />
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
                @if(Session::has('warning'))
                <div class="alert alert-warning temp">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ Session('warning') }} 
                </div>
                @endif
                <div id="listagem" class="col-md-10" style="display:block;">
                    <div class="lista-produtos">
                        <div class="hits" ng-repeat="hit in hits">
                            <div class="col-md-3">
                                <div class="produto" idProduto="">
                                    <a href="/addcarrinho/">
                                        <img src="{{ asset('/acucar.png') }}" class="img" width="130"/>
                                        <p class="nome" ng-bind-html="hit._highlightResult.nome.value"></p>
                                        <p class="preco" ng-bind-html="hit._highlightResult.preco.value">R$ </p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection