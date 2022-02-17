<?php

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/app/Entity/tpcliente.php';
require __DIR__.'/app/Session/login.php';


use \App\Session\Login;

Login::requireLogin();
$usuariologado = Login::getUsuarioLogado();

$usuario= $usuariologado ?
          $usuariologado['nomeusu'] :
          'Visitante ';

use \App\Entity\TpCliente;

$tpclientes = TpCliente::getTpClientes();
/*echo "<pre>"; print_r($unidades); echo "</pre>"; exit;*/


include __DIR__.'/includes/header.php';

include __DIR__.'/includes/container.php';

include __DIR__.'/mnmb_clie.php';

include __DIR__.'/mnds_clie.php';

include __DIR__.'/includes/listagens/lista_tpcliente.php';

include __DIR__.'/includes/footer.php';?>
