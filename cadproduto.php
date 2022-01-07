<?php

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/app/Entity/produto.php';
require __DIR__.'/app/Session/login.php';


use \App\Session\Login;

Login::requireLogin();
$usuariologado = Login::getUsuarioLogado();

$usuario= $usuariologado ?
          $usuariologado['nomeusu'] :
          'Visitante ';



define('TITLE','Cadastrar Produto');

 /*echo "<pre>"; print_r($_POST); echo "</pre>"; exit;*/

use \App\Entity\Produto;

if (isset($_POST['codemp'],$_POST['codfilial'],$_POST['codprod'],$_POST['descprod']))
{
  $obProduto = new Produto;
  $obProduto->codemp    = $_POST['codemp'];
  $obProduto->codfilial = $_POST['codfilial'];
  $obProduto->codprod   = $_POST['codprod'];
  $obProduto->descprod  = $_POST['descprod'];
  $obProduto->refprod   = $_POST['refprod'];
  $obProduto->codalmox  = $_POST['codalmox'];
  $obProduto->codmoeda  = $_POST['codmoeda'];
  $obProduto->codfisc   = $_POST['codfisc'];
  $obProduto->codmarca  = $_POST['codmarca'];
  $obProduto->tipoprod  = $_POST['tipoprod'];
  $obProduto->codgrup   = $_POST['codgrup'];
  $obProduto->codunid	= $_POST['codunid'];
  $obProduto->codbarprod= $_POST['codbarprod'];
  $obProduto->cloteprod = $_POST['cloteprod'];
  $obProduto->serieprod = $_POST['serieprod'];
  $obProduto->codfabprod= $_POST['codfabprod'];
  $obProduto->custoinfoprod= $_POST['custoinfoprod'];
  $obProduto->precobaseprod= $_POST['precobaseprod'];
  $obProduto->sldprod= $_POST['sldprod'];
  $obProduto->ativoprod= $_POST['ativoprod'];    
  $obProduto->idusuins  = $_POST['idusuins'];
  $obProduto->cadastrarProduto();

  header('location: Produto.php?status=sucess');
  exit;

}


include __DIR__.'/includes/header.php';

include __DIR__.'/includes/container.php';

/*include __DIR__.'/mnmb_home.php';

include __DIR__.'/mnds_home.php';*/

include __DIR__.'/includes/cadastros/cadastra_produto.php';

include __DIR__.'/includes/footer.php';?>
