<?php

  namespace App\Entity;

  use \App\Db\database;
  use \PDO;

  class Cliente{

    public $codemp;
    public $codfilial;
    public $codcli;
    public $razcli;
    public $nomecli;
	public $pessoacli;
	public $ativocli;
	public $cnpjcli;
	public $insccli;
	public $cpfcli;
	public $rgcli;
	public $cepcli;
	public $endcli;
	public $numcli;
	public $complcli;
	public $baircli;
	public $cidcli;
	public $ufcli;
	public $siglauf;
	public $codmunic;
	public $dddcli;
	public $fonecli;
	public $dddcelcli;
	public $celcli;
	public $emailcli;
	public $emailnfecli;
    public $dtins;
    public $hins;
    public $idusuins;

    public function cadastrarcliente(){
      $this->dtins = date('Y-m-d');
      $this->hins  = date('H:i:s');
      $obDatabase = new Database('vdcliente');
      $this->id = $obDatabase->insert([
                  'codemp'    	=>$this->codemp,
                  'codfilial' 	=>$this->codfilial,
                  'codcli'  	=>$this->codcli,
                  'razcli' 	 	=>$this->razcli,
                  'nomecli'  	=>$this->nomecli,
				  'pessoacli'   =>$this->pessoacli,
				  'ativocli'    =>$this->ativocli,
				  'cnpjcli'		=>$this->cnpjcli,
				  'insccli'		=>$this->insccli,
				  'cpfcli'		=>$this->cpfcli,
				  'rgcli'		=>$this->rgcli,
				  'cepcli'      =>$this->cepcli,
				  'endcli'		=>$this->endcli,
				  'numcli'		=>$this->numcli,
				  'complcli'    =>$this->complcli,
				  'baircli' 	=>$this->baircli,
				  'cidcli'		=>$this->cidcli,
				  'ufcli'       =>$this->ufcli,
				  'siglauf'     =>$this->siglauf,
				  'codmunic'    =>$this->codmunic,
				  'dddcli'      =>$this->dddcli,
				  'fonecli'     =>$this->fonecli,
				  'dddcelcli'   =>$this->dddcelcli,
				  'celcli'      =>$this->celcli,
				  'emailcli'    =>$this->emailcli,
				  'emailnfecli' =>$this->emailnfecli,
                  'dtins'     	=>$this->dtins,
                  'hins'      	=>$this->hins,
                  'idusuins'  	=>$this->idusuins
                  ]);
      return true;
    }

    public function atualizarcliente(){
      return (new Database('vdcliente'))->update('id ='.$this->id,[
                                                'razcli' 	 	=>$this->razcli,
												'nomecli'  		=>$this->nomecli,
												'pessoacli'   	=>$this->pessoacli,
												'ativocli'    	=>$this->ativocli,
												'cnpjcli'		=>$this->cnpjcli,
												'insccli'		=>$this->insccli,
												'cpfcli'		=>$this->cpfcli,
												'rgcli'			=>$this->rgcli,
												'cepcli'    	=>$this->cepcli,
												'endcli'		=>$this->endcli,
												'numcli'		=>$this->numcli,
												'complcli'    	=>$this->complcli,
												'baircli' 	 	=>$this->baircli,
												'cidcli'	    =>$this->cidcli,
												'ufcli'         =>$this->ufcli,
												'siglauf'       =>$this->siglauf,
												'codmunic'      =>$this->codmunic,
												'dddcli'        =>$this->dddcli,
												'fonecli'       =>$this->fonecli,
												'dddcelcli'     =>$this->dddcelcli,
												'celcli'        =>$this->celcli,
												'emailcli'      =>$this->emailcli,
												'emailnfecli'   =>$this->emailnfecli
                                              ]);
    }

   
    public function excluircliente(){
      return (new database('vdcliente'))->delete('id='.$this->id);
    }

    public static function getClientes($where = null, $order = null, $limit = null){
      return (new Database('vdcliente'))->select($where, $order, $limit)
                                      ->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    public static function getQuantidadeClientes($where = null){
      return (new Database('vdcliente'))->select($where, null, null, 'COUNT(*) as qtd')
                                      ->fetchObject()
                                      ->qtd;
    }

    public static function getCliente($id){
      return (new Database('evdcliente'))->select('id = '.$id)
                                  ->fetchObject(self::class);
    }
  }
