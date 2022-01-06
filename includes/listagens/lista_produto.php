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
  foreach($produtos as $produto){
    $resultados .= '<tr>
                    <td>'.$produto->codprod.'</td>
                    <td>'.$produto->descprod.'</td>
                    <td>'.$produto->refprod.'</td>
                    <td>'.$produto->sldprod.'</td>
					<td>'.$produto->precobaseprod.'</td>
                    <td>
                      <a href="edtunidade.php?id='.$produto->id.'">
                        <button type="button" class="btn btn-primary">Editar</button>
                      </a>
                      <a href="excunidade.php?id='.$produto->id.'">
                        <button type="button" class="btn btn-danger">Excluir</button>
                      </a>
                    </td>
                  </tr>';
  }

  $paginacao = '';
  $paginas = $obPagination->getPages();

  foreach($paginas as $key=>$pagina){
    /*echo "<pre>"; print_r($pagina); echo "</pre>"; exit;*/
    $class      = $pagina['atual'] ? 'btn-primary notika-btn-primary' : 'btn-default notika-btn-default';
    $paginacao .= '<a href="?pagina='.$pagina['pagina'].'">
                    <button type="button" class="btn '.$class.'">'.$pagina['pagina'].'</button>
                  </a>';
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
                  <h2>PRODUTOS</h2>
                  <p>Listagem de  <span class="bread-ntd">Produtos</span></p>
                </div>
              </div>
            </div>
            <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
              <div class="breadcomb-report">
                <a href='cadproduto.php'>
                  <button data-toggle="tooltip" data-placement="left" title="Cadastra Produto" class="btn"><i class="notika-icon notika-sent"></i></button>
                </a>
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
                          <h2>Cadastra Produtos
                              <a href='cadproduto.php'>
                                <button data-toggle="tooltip" data-placement="right" title="Cadastra Unidade" class="btn"><i class="notika-icon notika-sent"></i></button>
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
                            <th>Referencia</th>
							<th>Saldo</th>
							<th>Vlr Venda</th>
                            <th>Ações</th>
                          </td>
                        </thead>
                        <tbody>
                            <?=$resultados;?>
                        </tbody>

                      </table>
                      <?=$paginacao;?>
                  </div>
              </div>
          </div>
      </div>
  </div>
