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

define('TITLE','Editar Marca');

 /*echo "<pre>"; print_r($_POST); echo "</pre>"; exit;*/

use \App\Entity\Marca;

//VALIDAÇÃO DO ID
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
  header('location: index.php?status=error');
  exit;
}

$obMarca = Marca::getMarca($_GET['id']);
/*echo "<pre>"; print_r($obMarca); echo "</pre>"; exit;*/

if (!$obMarca instanceof Marca){
  header('location: marca.php?status=error');
  exit;
}

if (isset($_POST['codemp'],$_POST['codfilial'],$_POST['codmarca'],$_POST['descmarca']))
{
  $obMarca->codemp    = $_POST['codemp'];
  $obMarca->codfilial = $_POST['codfilial'];
  $obMarca->codmarca  = $_POST['codmarca'];
  $obMarca->descmarca = $_POST['descmarca'];
  $obMarca->idusuins  = $_POST['idusuins'];

  $obMarca->atualizarmarca();

  header('location: marca.php?status=sucess');
  exit;

}


include __DIR__.'/includes/header.php';

include __DIR__.'/includes/container.php';

include __DIR__.'/mnmb_home.php';

include __DIR__.'/mnds_home.php';

include __DIR__.'/includes/cadastros/cadastra_marca.php';

include __DIR__.'/includes/footer.php';?>
