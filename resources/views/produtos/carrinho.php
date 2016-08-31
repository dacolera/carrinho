<div class="row-fluid carrinho">
    <div class="container" style="margin-top: 64px;">
        <div class="col-md-3">
        	<?php include_once 'menu-cliente.php'; ?>
        	<!--div class="menu">
            	<a href="/index.php?p=perfil-cliente"><div class="item">Meu Perfil</div></a>
                <div class="sub-menu ativo"><p>Meu Carrinho</p></div>
                <a href="/index.php?p=pedidos"><div class="item">Meus Pedidos</div></a>
                <a href="/index.php?p=orcamentos"><div class="item">Orçamentos</div></a>
                <a href="/index.php?p=boletos-abertos"><div class="item">Boletos em Aberto</div></a>
            </div-->
        </div>
        <div class="col-md-9">
        	<img src="/images/passo1.png" class="img-responsive banner">
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
                    <?php
						
					 if (!empty($produtosCarrinho)) {
                        foreach($produtosCarrinho as $produto) {
                            echo <<<PRODUTO
                        <tr class="prod{$produto['dadosProduto']['idProduto']}">
                        <td class="btn-excluir" style="cursor:pointer"><img src="/images/carrinho-excluir.png" class="img-responsive banner" style="display: none; margin:3px;"></td>
                        <td class="produto" idProduto="{$produto['dadosProduto']['idProduto']}">
                            <img src="http://www.impakto.com.br/sistema/imagem/produtos/pr{$produto['dadosProduto']['codProduto']}.jpg" class="img-responsive" width="37" height="51">
                            <div class="info">
                                <p class="nome">{$produto['dadosProduto']['nomeProduto']}</p>
                                <p class="codigo">código: {$produto['dadosProduto']['codProduto']}</p>
                            </div>
                        </td>
                        <td><p class="preco">{$produto['dadosPrecificacao']['preco']}</p></td>
                        <td>
                            <div class="operacao">
                                <div class="subtrair" style="cursor:pointer">-</div>
                                <input type="text" value="{$produto['qtd']}" class="quantidade">
                                <div class="somar" style="cursor:pointer">+</div>
                            </div>
                        </td>
                        <td class="subtotal">{$produto['dadosPrecificacao']['subtotal']}</td>
                    </tr>
PRODUTO;
                        }
                    }
                    ?>
                </table>
				</form>
            </div>
            <div class="pull-right ajusta-responsivo" style="width:100%;">
            	<p class="total">Total: <strong><?= Money::toCurrency($total)  ?></strong></p>
                <div class="pull-right ajusta-responsivo" style="width:100%;">
                    <p class="continuar" align="right"><a href="/index.php">Continuar Comprando</a></p>
                    <div class="btn-azul" style="cursor:pointer; background-color:#2e6f1d;" onclick="javascript:document.getElementById('formOrc').submit();">Continuar</div>
                </div>
            </div>
        </div>
    </div>
</div>