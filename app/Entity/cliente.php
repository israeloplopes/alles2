<?php

  namespace App\Entity;

  use \App\Db\database;
  use \PDO;

  class Unidade{

    public $codemp;
    public $codfilial;
    public $codunid;
    public $descunid;
    public $casasdec;
    public $dtins;
    public $hins;
    public $idusuins;

    public function cadastrarunidade(){
      $this->dtins = date('Y-m-d');
      $this->hins  = date('H:i:s');
      $obDatabase = new Database('equnidade');
      $this->id = $obDatabase->insert([
                  'codemp'    =>$this->codemp,
                  'codfilial' =>$this->codfilial,
                  'codunid'   =>$this->codunid,
                  'descunid'  =>$this->descunid,
                  'casasdec'  =>$this->casasdec,
                  'dtins'     =>$this->dtins,
                  'hins'      =>$this->hins,
                  'idusuins'  =>$this->idusuins
                  ]);
      return true;
    }

    public function atualizarunidade(){
      return (new Database('equnidade'))->update('id ='.$this->id,[
                                                'codunid'  =>$this->codunid,
                                                'descunid' =>$this->descunid
                                              ]);
    }

    public function excluirunidade(){
      return (new database('equnidade'))->delete('id='.$this->id);
    }

    public static function getUnidades($where = null, $order = null, $limit = null){
      return (new Database('equnidade'))->select($where, $order, $limit)
                                      ->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    public static function getUnidade($id){
      return (new Database('equnidade'))->select('id = '.$id)
                                  ->fetchObject(self::class);
    }
  }
