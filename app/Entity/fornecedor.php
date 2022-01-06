<?php

  namespace App\Entity;

  use \App\Db\database;
  use \PDO;

  class Fornecedor{

    public $codemp;
    public $codfilial;
    public $codunid;
    public $descunid;
    public $casasdec;
    public $dtins;
    public $hins;
    public $idusuins;

    public function cadastrarfornecedor(){
      $this->dtins = date('Y-m-d');
      $this->hins  = date('H:i:s');
      $obDatabase = new Database('eqfornecedor');
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

    public function atualizarfornecedor(){
      return (new Database('eqfornecedor'))->update('id ='.$this->id,[
                                                'codunid'  =>$this->codunid,
                                                'descunid' =>$this->descunid
                                              ]);
    }

    public function excluirfornecedor(){
      return (new database('eqfornecedor'))->delete('id='.$this->id);
    }

    public static function getfornecedors($where = null, $order = null, $limit = null){
      return (new Database('eqfornecedor'))->select($where, $order, $limit)
                                      ->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    public static function getfornecedor($id){
      return (new Database('eqfornecedor'))->select('id = '.$id)
                                  ->fetchObject(self::class);
    }
  }
