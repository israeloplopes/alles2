<?php

  namespace App\Entity;

  use \App\Db\database;
  use \PDO;

  class TpCliente{

    public $codemp;
    public $codfilial;
    public $codtipocli;
    public $desctipocli;
    public $dtins;
    public $hins;
    public $idusuins;

    public function cadastrartpcliente(){
      $this->dtins = date('Y-m-d');
      $this->hins  = date('H:i:s');
      $obDatabase = new Database('vdtipocli');
      $this->id = $obDatabase->insert([
                  'codemp'    =>$this->codemp,
                  'codfilial' =>$this->codfilial,
                  'codtipocli'  =>$this->codtipocli,
                  'desctipocli' =>$this->desctipocli,
                  'dtins'     =>$this->dtins,
                  'hins'      =>$this->hins,
                  'idusuins'  =>$this->idusuins
                  ]);
      return true;
    }

    public function atualizartpcliente(){
      return (new Database('vdtipocli'))->update('id ='.$this->id,[
                                                'codtipocli'  =>$this->codtipocli,
                                                'desctipocli' =>$this->desctipocli
                                              ]);
    }

    public function excluirtpcliente(){
      return (new database('vdtipocli'))->delete('id='.$this->id);
    }

    public static function getTpClientes($where = null, $order = null, $limit = null){
      return (new Database('vdtipocli'))->select($where, $order, $limit)
                                      ->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    public static function getQuantidadeTpClientes($where = null){
      return (new Database('vdtipocli'))->select($where, null, null, 'COUNT(*) as qtd')
                                      ->fetchObject()
                                      ->qtd;
    }

    public static function getTpCliente($id){
      return (new Database('vdtipocli'))->select('id = '.$id)
                                  ->fetchObject(self::class);
    }
  }
