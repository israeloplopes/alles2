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
				<?php include 'kpi_totalsemana.php' ?>
				<?php include 'kpi_totalmes.php' ?>
                <?php include 'kpi_totaldia.php' ?>
                <?php include 'kpi_ticketmedio.php'?>
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
