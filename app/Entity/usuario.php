<?php

  namespace App\Entity;

  use \App\Db\database;
  use \PDO;

  class Usuario{

    public $codemp;
    public $codfilial;
    public $idusu;
    public $nomeusu;
    public $emailusu;
    public $ativousu;
    public $visualizalucr;
    public $cadoutusu;
    public $dtins;
    public $hins;
    public $idusuins;
    public $senhausu;
    public $nivel;

    public static function getUsuarioPorEmail($emailusu){
      return (new Database('sgusuario'))->select('emailusu = "'.$emailusu.'"')->fetchObject(self::class);

    }

    public function cadastrar(){
      $this->dtins = date('Y-m-d');
      $this->hins  = date('H:i:s');
      $obDatabase = new Database('sgusuario');
      $this->idusu = $obDatabase->insert([
          'codemp'        =>$this->codemp,
          'codfilial'     =>$this->codfilial,
          'nomeusu'       =>$this->nomeusu,
          'emailusu'      =>$this->emailusu,
          'ativousu'      =>$this->ativousu,
          'visualizalucr' =>$this->visualizalucr,
          'cadoutusu'     =>$this->cadoutusu,
          'dtins'         =>$this->dtins,
          'hins'          =>$this->hins,
          'idusuins'      =>$this->idusuins,
          'senhausu'      =>$this->senhausu,
          'nivel'         =>$this->nivel
      ]);
      return true;
    }
  }
