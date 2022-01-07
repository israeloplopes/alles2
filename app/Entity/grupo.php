<?php

  namespace App\Entity;

  use \App\Db\database;
  use \PDO;

  class Grupo{

    public $codemp;
    public $codfilial;
    public $codgrup;
    public $descgrup;
	public $nivelgrup;
    public $dtins;
    public $hins;
    public $idusuins;

    public function cadastrargrupo(){
      $this->dtins = date('Y-m-d');
      $this->hins  = date('H:i:s');
      $obDatabase = new Database('eqgrupo');
      $this->id = $obDatabase->insert([
                  'codemp'    =>$this->codemp,
                  'codfilial' =>$this->codfilial,
                  'codgrup'	  =>$this->codgrup,
                  'descgrup'  =>$this->descgrup,
				  'nivelgrup' =>$this->nivelgrup,
                  'dtins'     =>$this->dtins,
                  'hins'      =>$this->hins,
                  'idusuins'  =>$this->idusuins
                  ]);
      return true;
    }

    public function atualizargrupo(){
      return (new Database('eqgrupo'))->update('id ='.$this->id,[
                                                'codgrup'  =>$this->codgrup,
                                                'descgrup' =>$this->descgrup
                                              ]);
    }

    public function excluirgrupo(){
      return (new database('eqgrupo'))->delete('id='.$this->id);
    }

    public static function getGrupos($where = null, $order = null, $limit = null){
      return (new Database('eqgrupo'))->select($where, $order, $limit)
                                      ->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    public static function getQuantidadeGrupos($where = null){
      return (new Database('eqgrupo'))->select($where, null, null, 'COUNT(*) as qtd')
                                      ->fetchObject()
                                      ->qtd;
    }

    public static function getGrupo($id){
      return (new Database('eqgrupo'))->select('id = '.$id)
                                  ->fetchObject(self::class);
    }
  }
