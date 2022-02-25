<?php

require __DIR__.'../../../app/Entity/marca.php';
require __DIR__.'../../../app/Entity/almoxarifado.php';
require __DIR__.'../../../app/Entity/unidade.php';
require __DIR__.'../../../app/Entity/fiscal.php';
require __DIR__.'../../../app/Db/pagination.php';

use \App\Entity\Marca;
use \App\Entity\Almoxarifado;
use \App\Entity\Unidade;
use \App\Entity\fiscal;

$busca      = filter_input(INPUT_GET,'busca',FILTER_SANITIZE_STRING);
$condicoes1  = [
  strlen($busca) ? 'descmarca LIKE "%'.str_replace(' ','%',$busca).'%"' : null
];
$where1 = implode(' and ',$condicoes1);

$condicoes2  = [
  strlen($busca) ? 'descalmox LIKE "%'.str_replace(' ','%',$busca).'%"' : null
];
$where2 = implode(' and ',$condicoes2);

$condicoes3  = [
  strlen($busca) ? 'descunid LIKE "%'.str_replace(' ','%',$busca).'%"' : null
];
$where3 = implode(' and ',$condicoes3);

$condicoes4  = [
  strlen($busca) ? 'descfisc LIKE "%'.str_replace(' ','%',$busca).'%"' : null
];
$where4 = implode(' and ',$condicoes4);


 $resultmarca = '';
 $marcas     = Marca::getMarcas($where1, null, null);
 foreach($marcas as $marca){
    $resultmarca .= '<option value="'.$marca->codmarca.'">'.$marca->descmarca.'</option>';

  }

 $resultalmox= '';
 $almoxarifados     = Almoxarifado::getAlmoxarifados($where2, null, null);
 foreach($almoxarifados as $almoxarifado){
    $resultalmox .= '<option value="'.$almoxarifado->codalmox.'">'.$almoxarifado->descalmox.'</option>';

  }

 $resultunid= '';
 $unidades     = Unidade::getUnidades($where3, null, null);
 foreach($unidades as $unidade){
    $resultunid .= '<option value="'.$unidade->codunid.'">'.$unidade->descunid.'</option>';

  }

/*  $resultfisc = '';
  $ncm     = Fiscal::getNCM($where1, null, null);
  foreach($ncm as $fiscal){
    $resultfisc .= '<option value="'.$fiscal->codfisc.'">'.$fiscal->codfisc.'</option>';
 }
 <?=TITLE?> - 
 */
?>

<!-- Main Menu area End-->
<!-- Breadcomb area Start-->
<div class="breadcomb-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="breadcomb-list">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="breadcomb-wp">
								<div class="breadcomb-icon">
									<i class="notika-icon notika-form"></i>
								</div>
								<div class="breadcomb-ctn">
									<h2>PRODUTOS</h2>
									<p>Controle de <span>Produtos</span></p>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
							<div class="breadcomb-report">
								<!--<a href="marca.php">
								<button data-toggle="tooltip" data-placement="left" title="Voltar" class="btn"><i class="notika-icon notika-sent"></i></button>
								</a>-->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Breadcomb area End-->
<!-- Form Examples area start-->
<div class="form-example-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="form-example-wrap">
					<div class="cmp-tb-hd">
						<h2>Voltar <i class="fas fa-arrow-alt-circle-right"></i>
							<a href="produto.php">
								<button data-toggle="tooltip" data-placement="right" title="Voltar" class="btn"><i class="notika-icon notika-sent"></i></button>
							</a>
						</h2>
					</div>
					<form method="post">
						<div class="form-group">
							<label>Cód. Produto</label>
							<input type="text" class="form-control" name="codprod" placeholder="Código do Produto" value="<?=$obProduto->codprod;?>" maxlenght="5" onchange="javascript:this.value=this.value.toUpperCase()"; required; autofocus;>
						</div>
						<div class="form-group">
							<label>Referência</label>
							<input type="text" class="form-control" name="refprod" placeholder="Referência" value="<?=$obProduto->refprod;?>" onchange="javascript:this.value=this.value.toUpperCase()"; required>
						</div>
						<div class="form-group">
							<label>Descrição</label>
							<input type="text" class="form-control" name="descprod" placeholder="Descrição" value="<?=$obProduto->descprod;?>" onchange="javascript:this.value=this.value.toUpperCase()"; required>
						</div>
						<div class="form-group">
							<label>Marca</label>
							<select class="form-control" name="codmarca" required>
									 <?=$resultmarca;?>
							</select>
						</div>
						<div class="form-group">
							<label>Almoxarifado</label>
							<select class="form-control" name="codalmox" required>
									 <?=$resultalmox;?>
							</select>
						</div>
						<div class="form-group">
							<label>Unidade</label>
							<select class="form-control" name="codunid" required>
									 <?=$resultunid;?>
							</select>
						</div>
						<div class="form-group">
							<label>Tipo de Produto</label>
							<select class="form-control" name="tipoprod" required>
								<option value="P">PRODUTO</option>
								<option value="S">SERVIÇO</option>
							</select>
						</div>
						<div class="form-group">
							<label>Produto Ativo?</label>
							<select class="form-control" name="ativoprod" required>
								<option value="N">NÃO</option>
								<option value="S">SIM</option>
							</select>
						</div>
						<div class="form-group">
							<label>NCM</label>
							<!--<select class="form-control" name="codfisc" required>
									 <?=$resultfisc;?>
							</select>-->
							<input type="text" class="form-control" name="codfisc" placeholder="Código NCM" value="<?=$obProduto->codfisc;?>" maxlenght="8" onchange="javascript:this.value=this.value.toUpperCase()"; required; autofocus;>
							

						</div>
						<input type="hidden" name="codemp" value="99">
						<input type="hidden" name="codfilial" value="1">
						<input type="hidden" name="idusuins" value="root">
						<div class="form-group">
							<button type="submit" class="btn btn-success notika-btn-success">Enviar</button>
							<button type="reset"  class="btn btn-warning notika-btn-warning">Cancelar</button> 														
							
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Form Examples area End-->
<!-- Start Footer area-->
<?php include __DIR__.'../../footer.php';?>
