<?php

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/app/Entity/fornecedor.php';
require __DIR__.'/app/Session/login.php';
require __DIR__.'/app/Db/pagination.php';

use \App\Session\Login;
use \App\Db\Pagination;


Login::requireLogin();
$usuariologado = Login::getUsuarioLogado();

$usuario= $usuariologado ?
          $usuariologado['nomeusu'] :
          'Visitante ';

use \App\Entity\Fornecedor;

$busca      = filter_input(INPUT_GET,'busca',FILTER_SANITIZE_STRING);
$condicoes  = [
  strlen($busca) ? 'nomecli LIKE "%'.str_replace(' ','%',$busca).'%"' : null
];
$where = implode(' and ',$condicoes);
/*echo "<pre>"; print_r($where); echo "</pre>"; exit;*/

$quantidadeFornecedores = Fornecedor::getQuantidadeFornecedores($where);
$obPagination     = new Pagination($quantidadeFornecedores,$_GET['pagina'] ?? 1,10);

$fornecedores = Fornecedor::getFornecedores($where, null, $obPagination->getLimit());
/*echo "<pre>"; print_r($marcas); echo "</pre>"; exit;*/


include __DIR__.'/includes/header.php';

include __DIR__.'/includes/container.php';

include __DIR__.'/mnmb_forn.php';

include __DIR__.'/mnds_forn.php';

include __DIR__.'/includes/listagens/lista_fornecedor.php';

include __DIR__.'/includes/footer.php';?>
