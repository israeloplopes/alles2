<?php

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/app/Entity/grupo.php';
require __DIR__.'/app/Session/login.php';
require __DIR__.'/app/Db/pagination.php';

use \App\Session\Login;
use \App\Db\Pagination;

Login::requireLogin();
$usuariologado = Login::getUsuarioLogado();

$usuario= $usuariologado ?
          $usuariologado['nomeusu'] :
          'Visitante ';

use \App\Entity\Grupo;

$busca      = filter_input(INPUT_GET,'busca',FILTER_SANITIZE_STRING);
$condicoes  = [
  strlen($busca) ? 'descgrup LIKE "%'.str_replace(' ','%',$busca).'%"' : null
];
$where = implode(' and ',$condicoes);
/*echo "<pre>"; print_r($where); echo "</pre>"; exit;*/

$quantidadeGrupos = Grupo::getQuantidadeGrupos($where);
$obPagination     = new Pagination($quantidadeGrupos,$_GET['pagina'] ?? 1,10);
/*echo "<pre>"; print_r($obPagination); echo "</pre>"; exit;*/

$grupos     = Grupo::getGrupos($where, null, $obPagination->getLimit());
/*echo "<pre>"; print_r($marcas); echo "</pre>"; exit;*/


include __DIR__.'/includes/header.php';
include __DIR__.'/includes/container.php';
include __DIR__.'/mnmb_prod.php';
include __DIR__.'/mnds_prod.php';
include __DIR__.'/includes/listagens/lista_grupo.php';
include __DIR__.'/includes/footer.php';?>
