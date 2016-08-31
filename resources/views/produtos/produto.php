<link rel="stylesheet" type="text/css" href="/dist/css/lightbox.css">
<script src="/dist/js/lightbox.min.js"></script>
<script src="/js/jquery.elevatezoom.js"></script>
<div class="row-fluid" style="overflow: auto;">
	<div class="container">
	<div class="col-md-12 detalhe-produto">
        <!--produtos-->
        <div class="col-md-12">
        	<div class="col-md-12">
                <div class="caminho">
                    <a href="/">home</a> > <a href="?p=produtos&n=<?= $linha ?>&f=<?= $ObjFamilia->idCat2Familia[1] ?>"><?= $ObjFamilia->nomeCategoria[1] ?></a> > <span><?= $ObjGrupo->nomeSubCategoria[1] ?></span>
                </div>
            </div>
        	<div class="produto">
                <div class="col-md-5" style="overflow: auto;">
                	<div class="col-md-12">
                        <div class="banner">
						<?
						$imgCod = str_pad($produtos->codProduto[1], 6, "0", STR_PAD_LEFT);
						?>
                          <div class="divImgDetalhe" id="zoom_01" style="background-image:url('http://www.impakto.com.br/sistema/imagem/produtos/pr<?= $imgCod;?>.jpg');"  data-zoom-image="http://www.impakto.com.br/sistema/imagem/produtos/pr<?= $imgCod;?>.jpg"></div>
						
                        </div>
                    </div>
                    <div class="outras-fotos">
                    	<?
						
						for($i=2 ; $i<=5 ;$i++)
						{
							//print 'http://www.impakto.com.br/sistema/imagem/produtos/pr'.$imgCod.'_'.$i.'.jpg';
							if(url_exists('http://www.impakto.com.br/sistema/imagem/produtos/pr'.$imgCod.'_'.$i.'.jpg'))
							{
						?>
						<div class="col-md-3">
                        	<div class="foto">
                        		<a href="<?= 'http://www.impakto.com.br/sistema/imagem/produtos/pr'.$imgCod.'_'.$i.'.jpg'; ?>" data-lightbox="image-1"><img src="<?= 'http://www.impakto.com.br/sistema/imagem/produtos/pr'.$imgCod.'_'.$i.'.jpg'; ?>" ></a>
                            </div>
                        </div>
                        <?
						}
						}
						?>
                    </div>
                </div>
                <?= $produtoDetalhe?>
            </div>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-12 recomendados" style="overflow: auto;">
        	<div class="col-md-12">
        		<h3>Recomendados para você</h3>
            </div>
            <div class="produtos">
                <?= ProdutoUtils::getProdutosRecomendados($_GET['id'])?>
            </div>
        </div>
    </div>
    </div>
    
</div>
<script>

$(document).ready(function() {

	$("#zoom_01").elevateZoom();
	setTimeout(function(){ 
	$(".zoomContainer").css('top','235px!important');
	$(".zoomContainer").css('left', '145px!important');
	; }, 500);
});

</script>