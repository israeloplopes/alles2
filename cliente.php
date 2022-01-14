<?php

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/app/Entity/cliente.php';
require __DIR__.'/app/Session/login.php';
require __DIR__.'/app/Db/pagination.php';

use \App\Session\Login;
use \App\Db\Pagination;


Login::requireLogin();
$usuariologado = Login::getUsuarioLogado();

$usuario= $usuariologado ?
          $usuariologado['nomeusu'] :
          'Visitante ';

use \App\Entity\Cliente;

$busca      = filter_input(INPUT_GET,'busca',FILTER_SANITIZE_STRING);
$condicoes  = [
  strlen($busca) ? 'nomecli LIKE "%'.str_replace(' ','%',$busca).'%"' : null
];
$where = implode(' and ',$condicoes);
/*echo "<pre>"; print_r($where); echo "</pre>"; exit;*/

$quantidadeClientes = Cliente::getQuantidadeClientes($where);
$obPagination     = new Pagination($quantidadeClientes,$_GET['pagina'] ?? 1,10);

$clientes = Cliente::getClientes($where, null, $obPagination->getLimit());
/*echo "<pre>"; print_r($marcas); echo "</pre>"; exit;*/


include __DIR__.'/includes/header.php';

include __DIR__.'/includes/container.php';

include __DIR__.'/mnmb_clie.php';

include __DIR__.'/mnds_clie.php';

include __DIR__.'/includes/listagens/lista_cliente.php';

include __DIR__.'/includes/footer.php';?>
