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
									<h2>UNIDADES</h2>
									<p>Controle de <span>Unidades</span></p>
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
							<a href="unidade.php">
								<button data-toggle="tooltip" data-placement="right" title="Voltar" class="btn"><i class="notika-icon notika-sent"></i></button>
							</a>
						</h2>
					</div>
					<form method="post">
						<div class="form-group">
							<label>Cód. Unidade</label>
							<input type="text" class="form-control" name="codunid" placeholder="Código da Unidade" value="<?=$obUnidade->codunid;?>" maxlenght="3" onchange="javascript:this.value=this.value.toUpperCase()"; required; autofocus;>
						</div>
						<div class="form-group">
							<label>Descrição</label>
							<input type="text" class="form-control" name="descunid" placeholder="Descrição da Unidade" value="<?=$obUnidade->descunid;?>" onchange="javascript:this.value=this.value.toUpperCase()"; required>
						</div>
						<div class="form-group">
							<label>Casas Decimais</label>
							<input type="text" class="form-control" name="casasdec" placeholder="Casas Decimais" value="<?=$obUnidade->casasdec;?>" onchange="javascript:this.value=this.value.toUpperCase()"; required>
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
