<!doctype html>
<?php
	
require __DIR__.'/vendor/autoload.php';
require __DIR__.'/app/Session/login.php';


/*if(session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}

if (!isset($_SESSION['codigo'])) {
  header('location: login.php');
  exit;
}*/
use \App\Session\Login;

Login::requireLogin();

$usuariologado = Login::getUsuarioLogado();
/*$usuario = $usuariologado ?
           $usuariologado['nomeusu'] .'<a href="logout.php">Finalizar</a>' :
           'Visitante <a href="login.php">Enterar</a>';*/

$usuario= $usuariologado ?
          $usuariologado['nomeusu'] :
          'Visitante ';

if ($usuariologado['ativousu'] == ''){
    session_destroy();
    header('location:login.php?reterro=101');
    exit;
  }
/*echo '<pre>';
print_r($nivelminimo);
echo '</pre>';
exit;*/




include __DIR__.'/includes/header.php';

include __DIR__.'/includes/container.php';
?>
    <!-- Smartsupp Live Chat script -->
    <script type="text/javascript">
        var _smartsupp = _smartsupp || {};
        _smartsupp.key = 'd726a58f4b87c585fa050cad7a9f07436329eba3';
        window.smartsupp||(function(d) {
        var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
        s=d.getElementsByTagName('script')[0];c=d.createElement('script');
        c.type='text/javascript';c.charset='utf-8';c.async=true;
        c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
        })(document);
    </script>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <?php include __DIR__.'/mnmb_home.php';?>
    <?php include __DIR__.'/mnds_user.php';?>	
	
	<div class="breadcomb-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="breadcomb-list">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="breadcomb-wp">
									<div class="breadcomb-icon">
										<i class="notika-icon notika-support"></i>
									</div>
									<div class="breadcomb-ctn">
										<h2>Suporte Técnico</h2>
										<p>Bem-vindo ao suporte técnico <span class="bread-ntd">Alles</span></p>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
								<div class="breadcomb-report">
									<!--<button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i class="notika-icon notika-sent"></i></button>-->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Breadcomb area End-->
    <!-- Contact area Start-->
    <div class="contact-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="contact-list">
                        <div class="contact-win">
                            <div class="contact-img">
                                <img src="img/layout/btn_suporte.png" width="60px" height="60px" alt="Departamento Técnico" />
                            </div>
                            <div class="conct-sc-ic">
                                <a class="btn" href="mailto:suporte.nonoelemento@gmail.com" title="E-mail"><i class="notika-icon notika-mail"></i></a>
                                <a class="btn" href="https://api.whatsapp.com/send?phone=5527997996139&text=Preciso%20de%20ajuda%20com%20o%20sistema.%20Pode%20me%20ajudar%3F" title="Whatsapp"><i class="notika-icon notika-phone"></i></a>
                            </div>
                        </div>
                        <div class="contact-ctn">
                            <div class="contact-ad-hd">
								<h2>Suporte Técnico</h2>
								<p class="ctn-ads">Incidentes, Erros e Dúvidas</p>
							</div>
                            <p>Falhas do <u>sistema</u> tem prioridade sobre outros atendimentos.</p>
                        </div>
                        <div class="social-st-list">
                            <div class="social-sn">
                                <h2>Falhas:</h2>
                                <p>1</p>
                            </div>
                            <div class="social-sn">
                                <h2>Dúvidas:</h2>
                                <p>434</p>
                            </div>
                            <div class="social-sn">
                                <h2>Outros:</h2>
                                <p>676</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="contact-list sm-res-mg-t-30">
                        <div class="contact-win">
                            <div class="contact-img">
                                <img src="img/layout/btn_financeiro.png" width="60px" height="60px" alt="Departamento Financeiro" />
                            </div>
                            <div class="conct-sc-ic">
                                <a class="btn" href="mailto:financeiro.nonoelemento@gmail.com" title="E-mail"><i class="notika-icon notika-mail"></i></a>
                                <a class="btn" href="https://api.whatsapp.com/send?phone=5527997996139&text=Preciso%20falar%20com%20o%20financeiro." title="Whatsapp"><i class="notika-icon notika-phone"></i></a>
                            </div>
                        </div>
                        <div class="contact-ctn">
							<div class="contact-ad-hd">
								<h2>Financeiro</h2>
								<p class="ctn-ads">Segunda Via, Pagamentos, Notas Fiscais</p>
							</div>
                            <p>Pagamentos em aberto, renegociação, formas de pagamento, vencimentos.</p>
                        </div>
                        <div class="social-st-list">
                            <div class="social-sn">
                                <h2>&nbsp;</h2>
                                <p>&nbsp;</p>
                            </div>
                            <div class="social-sn">
                                <h2>&nbsp;</h2>
                                <p>&nbsp;</p>
                            </div>
                            <div class="social-sn">
                                <h2>&nbsp;</h2>
                                <p>&nbsp;</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<p>&nbsp;</p>
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
										<h2>Chamado Técnico</h2>
										<p>Sempre que precisar de melhorias ou fazer uma reclamação sobre o atendimento ou nossos produtos</span></p>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
								<div class="breadcomb-report">
									<!--<button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i class="notika-icon notika-sent"></i></button>-->
								</div>
							</div>
						</div>
					</div>
				</div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-element-list mg-t-30">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group ic-cmp-int float-lb floating-lb">
                                    <div class="form-ic-cmp">
										<label>Título&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                        <i class="notika-icon notika-star"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="text" class="form-control" onChange="javascript:this.value=this.value.toUpperCase();" placeholder="Um título para este tópico" maxlength="50" minlength="10" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group ic-cmp-int float-lb floating-lb">
                                    <div class="form-ic-cmp">
										<label>Situação&nbsp;&nbsp;</label>
                                       <i class="notika-icon notika-travel"></i>
                                    </div>
                                    <div class="nk-int-st">
										<select style="width:100%;">
											<option>Sugestão</option>
											<option>Reclamação</option>
											<option>Melhoria</option>
										</select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group ic-cmp-int float-lb floating-lb">
                                    <div class="form-ic-cmp">
										<label>Descritivo</label>
                                        <i class="notika-icon notika-edit"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <textarea rows="3" style="width:100%;"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group ic-cmp-int float-lb floating-lb">
                                    <div class="form-ic-cmp">
										<label>Anexo</label>
                                        <i class="notika-icon notika-mail"></i>
                                    </div>
                                    <div class="nk-int-st">
                                       <input type="file" class="form-control">
                                    </div>
                                </div>
                            </div>							
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int float-lb form-elet-mg">
                              		<button title="Enviar Chamado"      type="submit" class="btn btn-success notika-btn-success">Enviar</button>&nbsp;
									<button title="Cancelar Solicitacao" type="reset" class="btn btn-warning notika-btn-warning">Cancelar</button>									
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>	
		</div>
	</div>
    <!-- Contact area End-->
    <!-- Start Footer area-->
      <?php
    include __DIR__.'/includes/footer.php';
    include __DIR__.'/includes/whatsapp.php';
    ?>