<?php

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/app/Entity/marca.php';
require __DIR__.'/app/Session/login.php';


use \App\Session\Login;

Login::requireLogin();
$usuariologado = Login::getUsuarioLogado();

$usuario= $usuariologado ?
          $usuariologado['nomeusu'] :
          'Visitante ';



define('TITLE','Cadastrar Marca');

 /*echo "<pre>"; print_r($_POST); echo "</pre>"; exit;*/

use \App\Entity\Marca;

if (isset($_POST['codemp'],$_POST['codfilial'],$_POST['codmarca'],$_POST['descmarca']))
{
  $obMarca = new Marca;
  $obMarca->codemp    = $_POST['codemp'];
  $obMarca->codfilial = $_POST['codfilial'];
  $obMarca->codmarca  = $_POST['codmarca'];
  $obMarca->descmarca = $_POST['descmarca'];
  $obMarca->idusuins  = $_POST['idusuins'];
  $obMarca->cadastrarmarca();

  header('location: marca.php?status=sucess');
  exit;

}


include __DIR__.'/includes/header.php';

include __DIR__.'/includes/container.php';

include __DIR__.'/includes/cadastros/cadastra_marca.php';

include __DIR__.'/includes/footer.php';?>
