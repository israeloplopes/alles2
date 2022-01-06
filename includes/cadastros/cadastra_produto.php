<?php


require __DIR__.'../../../app/Entity/marca.php';
require __DIR__.'../../../app/Entity/almoxarifado.php';
require __DIR__.'../../../app/Entity/unidade.php';
require __DIR__.'../../../app/Db/pagination.php';

use \App\Entity\Marca;
use \App\Entity\Almoxarifado;
use \App\Entity\Unidade;

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
									<p>Controle de <span class="bread-ntd">Produtos</span></p>
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
						<h2><?=TITLE?>
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
							<label>Descrição</label>
							<input type="text" class="form-control" name="descprod" placeholder="Descrição" value="<?=$obProduto->descprod;?>" onchange="javascript:this.value=this.value.toUpperCase()"; required>
						</div>		
						
						<div class="form-group">				
							<label class="control-label col-md-2">Marca</label>  
							<select class="form-control" name="codmarca" required>
									 <?=$resultmarca;?>
							</select>
						</div>		
						<div class="form-group">				
							<label class="control-label col-md-2">Almoxarifado</label>  
							<select class="form-control" name="codalmox" required>
									 <?=$resultalmox;?>
							</select>
						</div>	
						<div class="form-group">				
							<label class="control-label col-md-2">Unidade</label>  
							<select class="form-control" name="codunid" required>
									 <?=$resultunid;?>
							</select>
						</div>							
						
						<input type="hidden" name="codemp" value="99">
						<input type="hidden" name="codfilial" value="1">
						<input type="hidden" name="idusuins" value="root">
						<div class="form-group">
							<button type="submit" class="btn btn-sucess">Enviar</button>
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
