<?php

  require __DIR__.'/vendor/autoload.php';
  require __DIR__.'/app/Session/login.php';
  require __DIR__.'/app/Entity/usuario.php';

  use \App\Entity\Usuario;
  use \App\Session\Login;

  Login::requireLogout();

  $alertalogin    = '';
  $alertacadastro = '';

  $reterro = (isset($_GET['reterro'])) ? $_GET['reterro']:'';

  /*echo '<pre>';
  print_r($reterro);
  echo '</pre>';
  exit;*/

  if  ($reterro == 101){
    $alertalogin = 'Usuário com Acesso Inativo';
  }

  if(isset($_POST['acao'])){
    switch($_POST['acao']){
      case 'logar':

        $obUsuario = Usuario::getUsuarioPorEmail($_POST['emailusu']);
        if (!$obUsuario instanceof Usuario || !password_verify($_POST['senhausu'],$obUsuario->senhausu)){
          $alertalogin = 'Usuário ou Senha inválidos';
          break;
        }

        Login::login($obUsuario);

        /*echo '<pre>';
        print_r($obUsuario);
        echo '</pre>';
        exit;*/

        break;

      case 'cadastrar':
        if (isset($_POST['nomeusu'],$_POST['emailusu'],$_POST['senhausu'])){

          $obUsuario = Usuario::getUsuarioPorEmail($_POST['emailusu']);
          if ($obUsuario instanceof Usuario){
            $alertacadastro = 'O e-mail digitado já está em uso';
            break;
          }

          $obUsuario = new Usuario;
          $obUsuario->codemp          = $_POST['codemp'];
          $obUsuario->codfilial       = $_POST['codfilial'];
          $obUsuario->nomeusu         = $_POST['nomeusu'];
          $obUsuario->ativousu        = $_POST['ativousu'];
          $obUsuario->visualizalucr   = $_POST['visualizalucr'];
          $obUsuario->cadoutusu       = $_POST['cadoutusu'];
          $obUsuario->nivel           = $_POST['nivel'];
          $obUsuario->idusuins        = $_POST['idusuins'];
          $obUsuario->emailusu        = $_POST['emailusu'];
          $obUsuario->dtins           = $_POST['dtins'];
          $obUsuario->hins            = $_POST['hins'];
          $obUsuario->senhausu        = password_hash($_POST['senhausu'], PASSWORD_DEFAULT);

          /* se quiser logar automático use
         Login::login($obUsuario);

          /*echo '<pre>';
          print_r($obUsuario);
          echo '</pre>';
          exit;*/

          $obUsuario->cadastrar();
        }

        break;
    }
  }

  include __DIR__.'/includes/tela_login.php';

?>
