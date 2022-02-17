<?php

  namespace App\Entity;

  use \App\Db\database;
  use \PDO;

  class TpFornec{

    public $codemp;
    public $codfilial;
    public $codtipofor;
    public $desctipofor;
    public $dtins;
    public $hins;
    public $idusuins;

    public function cadastrartpfornec(){
      $this->dtins = date('Y-m-d');
      $this->hins  = date('H:i:s');
      $obDatabase = new Database('cptipofor');
      $this->id = $obDatabase->insert([
                  'codemp'    =>$this->codemp,
                  'codfilial' =>$this->codfilial,
                  'codtipofor'  =>$this->codtipofor,
                  'desctipofor' =>$this->desctipofor,
                  'dtins'     =>$this->dtins,
                  'hins'      =>$this->hins,
                  'idusuins'  =>$this->idusuins
                  ]);
      return true;
    }

    public function atualizartpfornec(){
      return (new Database('cptipofor'))->update('id ='.$this->id,[
                                                'codtipofor'  =>$this->codtipofor,
                                                'desctipofor' =>$this->desctipofor
                                              ]);
    }

    public function excluirtpfornecc(){
      return (new database('cptipofor'))->delete('id='.$this->id);
    }

    public static function getTpFornecedores($where = null, $order = null, $limit = null){
      return (new Database('cptipofor'))->select($where, $order, $limit)
                                      ->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    public static function getQuantidadeTpFornecedores($where = null){
      return (new Database('cptipofor'))->select($where, null, null, 'COUNT(*) as qtd')
                                      ->fetchObject()
                                      ->qtd;
    }

    public static function getTpFornec($id){
      return (new Database('cptipofor'))->select('id = '.$id)
                                  ->fetchObject(self::class);
    }
  }
