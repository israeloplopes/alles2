<?php

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/app/Entity/marca.php';

define('TITLE','Excluir Marca');

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

if (isset($_POST['excluir']))
{
  $obMarca->excluirmarca();

  header('location: marca.php?status=sucess');
  exit;

}


include __DIR__.'/includes/header.php';

include __DIR__.'/includes/container.php';

include __DIR__.'/mnmb_home.php';

include __DIR__.'/mnds_home.php';

include __DIR__.'/includes/cadastros/exclui_marca.php';

include __DIR__.'/includes/footer.php';?>
