<div class="row-fluid">
	<div class="container">
        <!-- Modal -->
        <div class="modal fade " id="confirm" role="dialog">
            <div class="modal-dialog"   style="top:200px;">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-body" style="padding:50px 20px;">
                        Voce tem certeza que deseja excluir essa empresa?
                    </div>
                    <!--                    <div class="modal-footer">-->
                    <!--                        <button class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>-->
                    <!--                        <button class="btn btn-success btn-default pull-right confirm-ok" data-dismiss="modal"><span class="glyphicon glyphicon-on"></span> Ok</button>-->
                    <!--                    </div>-->
                </div>
            </div>
        </div>
        <input id="actualPage" type="hidden" value="<?= $_GET['page'] ?>" />
        <input id="familiaAtual" type="hidden" value="<?php print isset($_GET['f']) ? $_GET['f'] : ''  ?>" />
        <div class="col-md-12 categoria">
            <div class="col-md-12"><h3><?= $nomeCategoriaPai?></h3></div>
            <!--menu-->
            <div class="col-md-2" >
                <div class="menu">
            <?php
            if(is_array($familia->idCat2Familia) && $nomeCategoriaPai != 'Todas') {
                foreach ($familia->idCat2Familia as $i => $subcategoria) {

                    $objGrupo = new Cat3Grupo;
                    $objGrupo->regra = sprintf("status = 'Online' && idCategoria = %s", $subcategoria);
                    $objGrupo->carregaMetodo('pegarDados');
                    ?>
                    <div class="categoria" idFamilia="<?= $subcategoria?>">
                        <?= $familia->nomeCategoria[$i] ?>
                    </div>
                    <?php
                    if(is_array($objGrupo->idCat3Grupo)) {
                    ?>
                    <div class="subcat-container">
                    <?php
                        foreach ($objGrupo->idCat3Grupo as $i2 => $grupo) {
                        ?>
                            <div class="sub-categoria" subcat_id="<?= $objGrupo->idCat3Grupo[$i2] ?>" familia_id="<?= $subcategoria ?>"><?=  $objGrupo->nomeSubCategoria[$i2] ?></div>
                    <?php
                        }
                        ?>
                        </div>
                        <?php
                    }
                }
            }
             ?>
                </div>
            </div>

            <!--produtos-->
            <div id="listagem" class="col-md-10" style="display:block;">
			 <div class="lista-produtos">
			    <?= ProdutoUtils::paginacaoProduto($ObjProdutos)?>
			 </div>
            </div>
        </div>
    </div>
</div>
<script>

$('.produtoListaOver').mouseenter(function() {
	$('#produtoL'+$(this).attr('idcampo')).css('display','');
	$('#produtoL'+$(this).attr('idcampo')).css('opacity','0');
	$('#produtoL'+$(this).attr('idcampo')).animate({opacity: 1}, 200);
});
$('.produtoListaOver').mouseleave(function() {
	$('#produtoL'+$(this).attr('idcampo')).animate({opacity: 0}, 200);
});
</script>