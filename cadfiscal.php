<?php

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/app/Entity/fiscal.php';
require __DIR__.'/app/Session/login.php';


use \App\Session\Login;

Login::requireLogin();
$usuariologado = Login::getUsuarioLogado();

$usuario= $usuariologado ?
          $usuariologado['nomeusu'] :
          'Visitante ';



define('TITLE','Cadastrar Fiscal');

 /*echo "<pre>"; print_r($_POST); echo "</pre>"; exit;*/

use \App\Entity\Fiscal;

if (isset($_POST['codemp'],$_POST['codfilial'],$_POST['codfisc'],$_POST['descfisc']))
{
  $obFiscal = new Fiscal;
  $ob->codemp    = $_POST['codemp'];
  $obFiscal->codfilial = $_POST['codfilial'];
  $obFiscal->codFiscal  = $_POST['codFiscal'];
  $obFiscal->descFiscal = $_POST['descFiscal'];
  $obFiscal->idusuins  = $_POST['idusuins'];
  $obFiscal->cadastrarFiscal();

  header('location: Fiscal.php?status=sucess');
  exit;

}


include __DIR__.'/includes/header.php';

include __DIR__.'/includes/container.php';

include __DIR__.'/includes/cadastros/cadastra_Fiscal.php';

include __DIR__.'/includes/footer.php';?>
