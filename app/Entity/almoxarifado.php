<?php

namespace App\Entity;

  use \App\Db\database;
  use \PDO;

  class Almoxarifado{

    public $codemp;
    public $codfilial;
    public $codalmox;
    public $descalmox;
    public $dtins;
    public $hins;
    public $idusuins;

    public function cadastraralmoxarifado(){
      $this->dtins = date('Y-m-d');
      $this->hins  = date('H:i:s');
      $obDatabase = new Database('eqalmox');
      $this->id = $obDatabase->insert([
                  'codemp'    =>$this->codemp,
                  'codfilial' =>$this->codfilial,
                  'codalmox'  =>$this->codalmox,
                  'descalmox' =>$this->descalmox,
                  'dtins'     =>$this->dtins,
                  'hins'      =>$this->hins,
                  'idusuins'  =>$this->idusuins
                  ]);
      return true;
    }

    public function atualizaralmoxarifado(){
      return (new Database('eqalmox'))->update('id ='.$this->id,[
                                                'codalmox'  =>$this->codalmox,
                                                'descalmox' =>$this->descalmox
                                              ]);
    }

    public function excluiralmoxarifado(){
      return (new database('eqalmox'))->delete('id='.$this->id);
    }

    public static function getAlmoxarifados($where = null, $order = null, $limit = null){
      return (new Database('eqalmox'))->select($where, $order, $limit)
                                      ->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    public static function getQuantidadeAlmoxarifados($where = null){
      return (new Database('eqalmox'))->select($where, null, null, 'COUNT(*) as qtd')
                                      ->fetchObject()
                                      ->qtd;
    }

    public static function getAlmoxarifado($id){
      return (new Database('eqalmoxarifado'))->select('id = '.$id)
                                  ->fetchObject(self::class);
    }
  }
