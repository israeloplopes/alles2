<?php

  namespace App\Entity;

  use \App\Db\database;
  use \PDO;

  class produto{

    public $codemp;
    public $codfilial;
    public $codprod;
    public $descprod;
    public $refprod;
    public $codalmox;
    public $codmoeda;
    public $codfisc;
    public $codmarca;
    public $tipoprod;
    public $codgrup;
    public $codunid;
    public $codbarprod;
  	public $cloteprod;
  	public $serieprod;
  	public $codfabprod;
  	public $custoinfoprod;
  	public $precobaseprod;
  	public $sldprod;
    public $ativoprod;
    public $dtins;
    public $hins;
    public $idusuins;

    public function cadastrarproduto(){
      $this->dtins = date('Y-m-d');
      $this->hins  = date('H:i:s');
      $obDatabase = new Database('eqproduto');
      $this->id = $obDatabase->insert([
                  'codemp'    =>$this->codemp,
                  'codfilial' =>$this->codfilial,
                  'codprod'   =>$this->codprod,
                  'desprod'   =>$this->desprod,
                  'refprod'   =>$this->refprod,
                  'codalmox'  =>$this->codalmox,
                  'codunid'   =>$this->codunid,
                  'codfisc'   =>$this->codfisc,
                  'codmarca'  =>$this->codmarca,
                  'tipoprod'  =>$this->tipoprod,
                  'codbarprod'=>$this->codbarprod,
				          'cloteprod' =>$this->cloteprod,
				          'seriepod'  =>$this->serieprod,
				          'codfabprod'=>$this->codfabprod,
				          'custoinfoprod'=>$this->custoinfoprod,
				          'precobaseprod'=>$this->precobaseprod,
				          'sldprod'	  =>$this->sldprod,
                  'ativoprod' =>$this->ativoprod,
                  'dtins'     =>$this->dtins,
                  'hins'      =>$this->hins,
                  'idusuins'  =>$this->idusuins
                  ]);
      return true;
    }

    public function atualizarproduto(){
      return (new Database('eqproduto'))->update('id ='.$this->id,[
                                                'codprod'  =>$this->codprod,
                                                'descprod' =>$this->descprod,
                                                'refprod'   =>$this->refprod,
                                                'codalmox'  =>$this->codalmox,
                                                'codunid'   =>$this->codunid,
                                                'codfisc'   =>$this->codfisc,
                                                'codmarca'  =>$this->codmarca,
                                                'tipoprod'  =>$this->tipoprod,
                                                'codbarprod'=>$this->codbarprod,
												                        'cloteprod' =>$this->cloteprod,
												                        'seriepod'  =>$this->serieprod,
												                        'codfabprod'=>$this->codfabprod,
												                        'custoinfoprod'=>$this->custoinfoprod,
												                        'precobaseprod'=>$this->precobaseprod,
												                        'sldprod'	=>$this->sldprod,
                                                'ativoprod'   =>$this->ativoprod
                                              ]);
    }

    public function excluirproduto(){
      return (new database('eqproduto'))->delete('id='.$this->id);
    }

    public static function getprodutos($where = null, $order = null, $limit = null){
      return (new Database('eqproduto'))->select($where, $order, $limit)
                                      ->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    public static function getproduto($id){
      return (new Database('eqproduto'))->select('id = '.$id)
                                  ->fetchObject(self::class);
    }

    public static function getQuantidadeProdutos($where = null){
      return (new Database('eqproduto'))->select($where, null, null, 'COUNT(*) as qtd')
                                      ->fetchObject()
                                      ->qtd;
    }
  }
