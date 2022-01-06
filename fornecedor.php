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

use \App\Entity\Unidade;

$unidades = Unidade::getUnidades();
/*echo "<pre>"; print_r($marcas); echo "</pre>"; exit;*/


include __DIR__.'/includes/header.php';

include __DIR__.'/includes/container.php';

include __DIR__.'/mnmb_forn.php';

include __DIR__.'/mnds_forn.php';

include __DIR__.'/includes/listagens/lista_unidade.php';

include __DIR__.'/includes/footer.php';?>
