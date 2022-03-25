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
    <!-- Smartsupp Live Chat script 
    <script type="text/javascript">
        var _smartsupp = _smartsupp || {};
        _smartsupp.key = 'd726a58f4b87c585fa050cad7a9f07436329eba3';
        window.smartsupp||(function(d) {
        var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
        s=d.getElementsByTagName('script')[0];c=d.createElement('script');
        c.type='text/javascript';c.charset='utf-8';c.async=true;
        c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
        })(document);
    </script>-->

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <?php include __DIR__.'/mnmb_home.php';?>
    <?php include __DIR__.'/mnds_user.php';?>	
    
    <a href="https://api.whatsapp.com/send?phone=5527997996139&text=Oi%2C%20estou%20com%20d%C3%BAvidas%2Fproblemas%20no%20sistema%2C%20pode%20me%20ajudar%3F"
     target="_blank"
     style="position:fixed;bottom:20px;right:30px;">
    <svg enable-background="new 0 0 512 512" width="50" height="50" version="1.1" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path d="M256.064,0h-0.128l0,0C114.784,0,0,114.816,0,256c0,56,18.048,107.904,48.736,150.048l-31.904,95.104  l98.4-31.456C155.712,496.512,204,512,256.064,512C397.216,512,512,397.152,512,256S397.216,0,256.064,0z" fill="#4CAF50"/><path d="m405.02 361.5c-6.176 17.44-30.688 31.904-50.24 36.128-13.376 2.848-30.848 5.12-89.664-19.264-75.232-31.168-123.68-107.62-127.46-112.58-3.616-4.96-30.4-40.48-30.4-77.216s18.656-54.624 26.176-62.304c6.176-6.304 16.384-9.184 26.176-9.184 3.168 0 6.016 0.16 8.576 0.288 7.52 0.32 11.296 0.768 16.256 12.64 6.176 14.88 21.216 51.616 23.008 55.392 1.824 3.776 3.648 8.896 1.088 13.856-2.4 5.12-4.512 7.392-8.288 11.744s-7.36 7.68-11.136 12.352c-3.456 4.064-7.36 8.416-3.008 15.936 4.352 7.36 19.392 31.904 41.536 51.616 28.576 25.44 51.744 33.568 60.032 37.024 6.176 2.56 13.536 1.952 18.048-2.848 5.728-6.176 12.8-16.416 20-26.496 5.12-7.232 11.584-8.128 18.368-5.568 6.912 2.4 43.488 20.48 51.008 24.224 7.52 3.776 12.48 5.568 14.304 8.736 1.792 3.168 1.792 18.048-4.384 35.52z" fill="#FAFAFA"/></svg>
    </a>
	
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