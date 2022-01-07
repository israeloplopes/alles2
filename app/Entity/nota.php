<?php

  namespace App\Entity;

  use \App\Db\database;
  use \PDO;

  class Nota{

    public $codigo;
    public $chave;
    public $data;
    public $hora;
	public $upload;
    public $situacao;
	public $valor;
	public $numero;
	public $nfce;
    
    public function cadastrarnota(){
      $this->dtins = date('Y-m-d');
      $this->hins  = date('H:i:s');
      $obDatabase = new Database('sgnf');
      $this->id = $obDatabase->insert([
                  'codigo'    =>$this->codigo,
                  'chave'	  =>$this->chave,
                  'data'	  =>$this->data,
                  'hora'  	  =>$this->hora,
				  'upload'    =>$this->upload,
                  'situacao'  =>$this->situacao,
                  'valor'     =>$this->valor,
                  'numero' 	  =>$this->numero,
				  'nfce'	  =>$this->nfce
                  ]);
      return true;
    }

    public function atualizarnota(){
      return (new Database('sgnf'))->update('id ='.$this->id,[
                                                'chave'  =>$this->chave
                                              ]);
    }

    public function excluirnota(){
      return (new database('sgnf'))->delete('id='.$this->id);
    }

    public static function getNotas($where = null, $order = null, $limit = null){
      return (new Database('sgnf'))->select($where, $order, $limit)
                                      ->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    public static function getQuantidadeNotas($where = null){
      return (new Database('sgnf'))->select($where, null, null, 'COUNT(*) as qtd')
                                      ->fetchObject()
                                      ->qtd;
    }

    public static function getNota($id){
      return (new Database('sgnf'))->select('id = '.$id)
                                  ->fetchObject(self::class);
    }
  }
