<?php

  namespace App\Entity;

  use \App\Db\database;
  use \PDO;

  class Fiscal{

    public $codemp;
    public $codfilial;
    public $codfisc;
    public $descfisc;
    public $dtins;
    public $hins;
    public $idusuins;

    public function cadastrarncm(){
      $this->dtins = date('Y-m-d');
      $this->hins  = date('H:i:s');
      $obDatabase = new Database('lfclfiscal');
      $this->id = $obDatabase->insert([
                  'codemp'    =>$this->codemp,
                  'codfilial' =>$this->codfilial,
                  'codfisc'  =>$this->codfisc,
                  'descfisc' =>$this->descfisc,
                  'dtins'     =>$this->dtins,
                  'hins'      =>$this->hins,
                  'idusuins'  =>$this->idusuins
                  ]);
      return true;
    }

    public function atualizarncm(){
      return (new Database('lfclfiscal'))->update('id ='.$this->id,[
                                                'codfisc'  =>$this->codfisc,
                                                'descfisc' =>$this->descfisc
                                              ]);
    }

    public function excluirncm(){
      return (new database('lfclfiscal'))->delete('id='.$this->id);
    }

    public static function getNCM($where = null, $order = null, $limit = null){
      return (new Database('lfclfiscal'))->select($where, $order, $limit)
                                      ->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    public static function getQuantidadeNCM($where = null){
      return (new Database('lfclfiscal'))->select($where, null, null, 'COUNT(*) as qtd')
                                      ->fetchObject()
                                      ->qtd;
    }

    public static function getFiscal($id){
      return (new Database('lfclfiscal'))->select('id = '.$id)
                                  ->fetchObject(self::class);
    }
  }
