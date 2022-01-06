<?php

  namespace App\Session;

class Login{

  private static function init(){
    if(session_status() !== PHP_SESSION_ACTIVE){
      session_start();
    }
  }

  public static function getUsuarioLogado(){
    self::init();
    return self::isLogged() ? $_SESSION['nome'] : null;
  }

  public static function login($obUsuario){
    self::init();
    $_SESSION['nome'] = [
      'idusu'    => $obUsuario->idusu,
      'nomeusu'  => $obUsuario->nomeusu,
      'emailusu' => $obUsuario->emailusu,
      'ativousu' => $obUsuario->ativousu,
      'nivel'    => $obUsuario->nivel
    ];
  
    header('location: index.php');
    exit;
  }

  public static function logout(){
    self::init();
    unset($_SESSION['nome'], $_SESSION['ativo'],$_SESSION['nivel']);
    header('location: login.php');
    exit;
  }

  public static function isLogged(){
    self::init();
    return isset($_SESSION['nome']['idusu']);
  }

  public static function requireLogin(){
    if(!self::isLogged()){
      header('location:login.php');
      exit;
    }
  }

  public static function requireLogout(){
    if(self::isLogged()){
      header('location:index.php');
      exit;
    }
  }
}
