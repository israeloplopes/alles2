<?php

  namespace App\Entity;

  use \App\Db\database;
  use \PDO;

  class Marca{

    public $codemp;
    public $codfilial;
    public $codmarca;
    public $descmarca;
    public $dtins;
    public $hins;
    public $idusuins;

    public function cadastrarmarca(){
      $this->dtins = date('Y-m-d');
      $this->hins  = date('H:i:s');
      $obDatabase = new Database('eqmarca');
      $this->id = $obDatabase->insert([
                  'codemp'    =>$this->codemp,
                  'codfilial' =>$this->codfilial,
                  'codmarca'  =>$this->codmarca,
                  'descmarca' =>$this->descmarca,
                  'dtins'     =>$this->dtins,
                  'hins'      =>$this->hins,
                  'idusuins'  =>$this->idusuins
                  ]);
      return true;
    }

    public function atualizarmarca(){
      return (new Database('eqmarca'))->update('id ='.$this->id,[
                                                'codmarca'  =>$this->codmarca,
                                                'descmarca' =>$this->descmarca
                                              ]);
    }

    public function excluirmarca(){
      return (new database('eqmarca'))->delete('id='.$this->id);
    }

    public static function getMarcas($where = null, $order = null, $limit = null){
      return (new Database('eqmarca'))->select($where, $order, $limit)
                                      ->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    public static function getQuantidadeMarcas($where = null){
      return (new Database('eqmarca'))->select($where, null, null, 'COUNT(*) as qtd')
                                      ->fetchObject()
                                      ->qtd;
    }

    public static function getMarca($id){
      return (new Database('eqmarca'))->select('id = '.$id)
                                  ->fetchObject(self::class);
    }
  }
