<?php

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/app/Entity/unidade.php';
require __DIR__.'/app/Session/login.php';


use \App\Session\Login;

Login::requireLogin();
$usuariologado = Login::getUsuarioLogado();

$usuario= $usuariologado ?
          $usuariologado['nomeusu'] :
          'Visitante ';



define('TITLE','Cadastrar Unidade');

 /*echo "<pre>"; print_r($_POST); echo "</pre>"; exit;*/

use \App\Entity\Unidade;

if (isset($_POST['codemp'],$_POST['codfilial'],$_POST['codunid'],$_POST['descunid']))
{
  $obUnidade = new Unidade;
  $obUnidade->codemp    = $_POST['codemp'];
  $obUnidade->codfilial = $_POST['codfilial'];
  $obUnidade->codunid   = $_POST['codunid'];
  $obUnidade->descunid  = $_POST['descunid'];
  $obUnidade->casasdec  = $_POST['casasdec'];
  $obUnidade->idusuins  = $_POST['idusuins'];
  $obUnidade->cadastrarunidade();

  header('location: unidade.php?status=sucess');
  exit;

}


include __DIR__.'/includes/header.php';

include __DIR__.'/includes/container.php';

include __DIR__.'/includes/cadastros/cadastra_unidade.php';

include __DIR__.'/includes/footer.php';?>
