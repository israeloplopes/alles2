<?php

  require __DIR__.'/vendor/autoload.php';
  require __DIR__.'/app/Session/login.php';
  require __DIR__.'/app/Entity/usuario.php';

  use \App\Entity\Usuario;
  use \App\Session\Login;

  Login::logout();
?>
