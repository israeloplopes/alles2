<?php

  $mensagem = '';
  if (isset($_GET['status'])){
    switch ($_GET['status']){
      case 'sucess':
        $mensagem='<div class="alert alert-sucess">Ação realizada com sucesso</div>';
        break;
        case 'error':
          $mensagem='<div class="alert alert-dange">Atenção, <b>ação</b> realizada com sucesso</div>';
          break;
    }
  }

  $resultados = '';
  foreach($tpclientes as $tpcliente){
    $resultados .= '<tr>
                    <td>'.$tpcliente->codtipocli.'</td>
                    <td>'.$tpcliente->desctipocli.'</td>
                    <td>
                      <a href="edtunidade.php?id='.$tpcliente->id.'">
                        <button type="button" class="btn btn-primary">Editar</button>
                      </a>
                      <a href="excunidade.php?id='.$tpcliente->id.'">
                        <button type="button" class="btn btn-danger">Excluir</button>
                      </a>
                    </td>
                  </tr>';
  }

 ?>
<div class="breadcomb-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="breadcomb-list">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="breadcomb-wp">
                <div class="breadcomb-icon">
                  <i class="notika-icon notika-form"></i>
                </div>
                <div class="breadcomb-ctn">
                  <h2>TIPOS DE CLIENTES</h2>
                  <p>Listagem de  <span>Tipos de Clientes</span></p>
                </div>
              </div>
            </div>
            <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
              <div class="breadcomb-report">
                <!--<a href='cadmarca.php'>
                  <button data-toggle="tooltip" data-placement="left" title="Cadastra Marca" class="btn"><i class="notika-icon notika-sent"></i></button>
                </a>-->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Breadcomb area End-->
  <!-- Form Examples area start-->

  <div class="form-example-area">
      <div class="container">
              <?=$mensagem?>
          <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-example-wrap">

                      <div class="cmp-tb-hd">
                          <h2>Cadastrar <i class="fas fa-arrow-alt-circle-right"></i>
                              <a href='cadunidade.php'>
                                <button data-toggle="tooltip" data-placement="right" title="Cadastra Tipo de Clientes" class="btn"><i class="notika-icon notika-sent"></i></button>
                              </a>
                          </h2>
                      </div>
					  
					  <form method="get">
                      <div class="row">
                          <div class="form-example-wrap mg-t-0">
                            <div class="cmp-tb-hd cmp-int-hd">
                              <h4>Faça sua Busca</h4>
                            </div>
                            <div class="row">
                              <div class="col-lg-6 col-md-6 col-sm-1 col-xs-12">
                                <div class="form-example-int form-example-st">
                                  <div class="form-group">
                                    <div class="nk-int-st">
                                      <input type="text" class="form-control input-sm" name="busca" placeholder="Descrição" value="<?=$busca?>">
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-4 col-md-4 col-sm-1 col-xs-12">
                                <div class="form-example-int">
                                  <button type="submit" class="btn btn-success notika-btn-success">Filtrar</button>
                                </div>
                              </div>
                            </div>
                          </div>
                      </div>
                    </form>

                      <table class="table bg-dark">
                        <thead>
                          <tr>
                            <th>Código</th>
                            <th>Descrição</th>
                            <th>Ações</th>
                          </td>
                        </thead>
                        <tbody>
                            <?=$resultados;?>
                        </tbody>

                      </table>
                  </div>
              </div>
          </div>
      </div>
  </div>
