<?php
	
ini_set('memory_limit','128M');
	
	
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

    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Start Header Top Area -->

    <!-- End Header Top Area -->
    <!-- Mobile Menu start -->
        <?php include __DIR__.'/mnmb_home.php';?>
    <!-- Mobile Menu end -->
    <!-- Main Menu area start-->
        <?php include __DIR__.'/mnds_home.php';?>
    <!-- Main Menu area End-->
    <!-- Start Status area -->
    <div class="notika-status-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter">50,000</span></h2>
                            <p>Total de Vendas na Semana</p>
                        </div>
                        <div class="sparkline-bar-stats1">9,4,8,6,5,6,4,8,3,5,9,5</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter">90,000</span>k</h2>
                            <p>Total de Vendas no Mês</p>
                        </div>
                        <div class="sparkline-bar-stats2">1,4,8,3,5,6,4,8,3,3,9,5</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2>$<span class="counter">40,000</span></h2>
                            <p>Total de Vendas no Dia</p>
                        </div>
                        <div class="sparkline-bar-stats3">4,2,8,2,5,6,3,8,3,5,9,5</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter">1,000</span></h2>
                            <p>Tiket Médio</p>
                        </div>
                        <div class="sparkline-bar-stats4">2,4,8,4,5,7,4,7,3,5,7,5</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Status area-->
    <!-- Start Sale Statistic area-->
    <div class="sale-statistic-area">
        <div class="container">
            <div class="row">
                <?php include "kpi_analiseglobal.php";?>
                <?php include "kpi_itensrecentes.php";?>
            </div>
        </div>
    </div>
              </div>
        </div>
    </div>
    <!-- Start Footer area-->
    <?php
    include __DIR__.'/includes/footer.php';
    include __DIR__.'/includes/whatsapp.php';
    ?>
