<?php

  namespace App\Entity;

  use \App\Db\database;
  use \PDO;

  class Fornecedor{

    public $codemp;
    public $codfilial;
    public $codfor;
    public $razfor;
    public $nomefor;
	public $ativofor;
	public $pessoafor;
	public $cnpjfor;
	public $cpfor;
	public $suframafor;
	public $inscfor;
	public $cepfor;
	public $endforn;
	public $numfor;
	public $complfor;
	public $bairfor;
	public $cidfor;
	public $uffor;
	public $siglafor;
	public $codmunic;	
	public $dddfonefor;
	public $fonefor;
	public $dddcelfor;
	public $celfor;
	public $emailfor;
	public $sitefor;
    public $dtins;
    public $hins;
    public $idusuins;

    public function cadastrarfornecedor(){
      $this->dtins = date('Y-m-d');
      $this->hins  = date('H:i:s');
      $obDatabase = new Database('cpforneced');
      $this->id = $obDatabase->insert([
                  'codemp'    =>$this->codemp,
                  'codfilial' =>$this->codfilial,
                  'codfor'    =>$this->codfor,
                  'razfor'    =>$this->razfor,
                  'nomefor'   =>$this->nomefor,
				  'ativofor'  =>$this->ativofor,
				  'pessoafor' =>$this->pessoafor,
				  'cnpjfor'   =>$this->cnpjfor,
				  'cpffor'    =>$this->cpffor,
				  'inscfor'   =>$this->inscfor,
				  'suframafor'=>$this->suframafor,
				  'cepfor'	  =>$this->cepfor,
				  'endfor'	  =>$this->endforn,
				  'numfor'    =>$this->numfor,
				  'complfor'  =>$this->complfor,
				  'bairfor'   =>$this->bairfor,
				  'cidfor'    =>$this->cidfor,
				  'uffor'     =>$this->uffor,
				  'siglafor'  =>$this->siglafor,
				  'codmunic'  =>$this->codmunic,
				  'dddfonefor'  =>$this->dddfor,
				  'fonefor'		=>$this->fonefor,
				  'dddcelfor'	=>$this->dddcelfor,
				  'celfor'		=>$this->celfor,
				  'emailfor'	=>$this->emailfor,
				  'sitefor'		=>$this->sitefor,				  
                  'dtins'     =>$this->dtins,
                  'hins'      =>$this->hins,
                  'idusuins'  =>$this->idusuins
                  ]);
      return true;
    }

    public function atualizarfornecedor(){
      return (new Database('cpforneced'))->update('id ='.$this->id,[
                                                'codfor'  =>$this->codfor,
                                                'razfor' =>$this->razfor,
												'nomefor'   =>$this->nomefor,
												'ativofor'  =>$this->ativofor,
												'pessoafor' =>$this->pessoafor,
												'cnpjfor'   =>$this->cnpjfor,
												'cpffor'    =>$this->cpffor,
												'inscfor'   =>$this->inscfor,
												'suframafor'=>$this->suframafor,
												'cepfor'	  =>$this->cepfor,
												'endfor'	  =>$this->endforn,
												'numfor'    =>$this->numfor,
												'complfor'  =>$this->complfor,
												'bairfor'   =>$this->bairfor,
												'cidfor'    =>$this->cidfor,
												'uffor'     =>$this->uffor,
												'siglafor'  =>$this->siglafor,
												'codmunic'  =>$this->codmunic,
												'dddfonefor'  =>$this->dddfor,
												'fonefor'		=>$this->fonefor,
												'dddcelfor'	=>$this->dddcelfor,
												'celfor'		=>$this->celfor,
												'emailfor'	=>$this->emailfor,
												'sitefor'		=>$this->sitefor
                                              ]);
    }

    public function excluirfornecedor(){
      return (new database('cpforneced'))->delete('id='.$this->id);
    }

    public static function getFornecedores($where = null, $order = null, $limit = null){
      return (new Database('cpforneced'))->select($where, $order, $limit)
                                      ->fetchAll(PDO::FETCH_CLASS,self::class);
    }
	
    public static function getQuantidadeFornecedores($where = null){
      return (new Database('cpforneced'))->select($where, null, null, 'COUNT(*) as qtd')
                                      ->fetchObject()
                                      ->qtd;
    }

    public static function getFornecedor($id){
      return (new Database('cpforneced'))->select('id = '.$id)
                                  ->fetchObject(self::class);
    }
  }
