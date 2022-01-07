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
                    <h2>MARCAS</h2>
                    <p>Controle de <span>Marcas</span></p>
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
															<a href="marca.php">
																<button data-toggle="tooltip" data-placement="right" title="Voltar" class="btn"><i class="notika-icon notika-sent"></i></button>
						                  </a>
														</h2>
                        </div>
                        <form method="post">
                          <div class="form-group">
                            <label>Cód. Marca</label>
                            <input type="text" class="form-control" name="codmarca" placeholder="Código da Marca" value="<?=$obMarca->codmarca;?>" maxlenght="4" onchange="javascript:this.value=this.value.toUpperCase()"; required; autofocus;>
                          </div>

													<div class="form-group">
														<label>Descrição</label>
														<input type="text" class="form-control" name="descmarca" placeholder="Descrição sobre a marca" value="<?=$obMarca->descmarca;?>" onchange="javascript:this.value=this.value.toUpperCase()"; required>
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
  <?php

  include __DIR__.'../../footer.php';?>
