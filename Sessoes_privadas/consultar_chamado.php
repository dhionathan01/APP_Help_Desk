<?require_once('../validacoes/validador_acess.php')?>

<?php
  // Removendo warning de leitura de tipo bool:
  error_reporting(0);
  function Recuperando_arquivos($arquivo, $chamados){
    // Função feof = testa pelo fim de um arquivo. Cria se um ponteiro que vai lendo linha a linha até chegar no último retornando false caso não for a última linha do arquivo, true quando for

    // Enquanto Não encontrar o fim do arquivo recuperado faça:
    while(!feof($arquivo)){
      // fgets -> Ele recupera todo o conteúdo da linha até que chegue no final ou ao limite de bytes se informado
      $registro_recuperado = fgets($arquivo);
      if($_SESSION['perfil_id'] == '1'){
      $chamados[] = $registro_recuperado;
      }else{
        if($_SESSION['id'] == $registro_recuperado[0]){
          $chamados[] = $registro_recuperado;
        }else{
          continue;
        }
      }
    }
    return $chamados;
  }
  // Criando um array para armazenar os chamados:
  $chamados = array();

  //Abrir arquivo.hd
  $arquivo = fopen('../../../../../app_help_desk/arquivo.hd', 'r');

  $chamados = Recuperando_arquivos($arquivo, $chamados);

  // Fechando arquivo
  fclose($arquivo);
?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="../img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="logoff.php">SAIR</a>
        </li>
      </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">
              <!-- Para cada linha criar uma string chamado -->
              <? foreach($chamados as $chamado){ ?>
                <?php
                  /* pegar o chamado e por meio do separador # criar um array com cada conteudo */
                  $chamado_dados = explode('#', $chamado);
                  if(count($chamado_dados) < 3 ){ // Se estiver faltando alguma informação ignore o restante do bloco
                    continue;
                  }
                ?>
                <div class="card mb-3 bg-light">
                  <div class="card-body">
                    <!-- Atribuindo o valor contido em cada índice do array no lugar correto -->
                    <h5 class="card-title"><?= $chamado_dados[1] ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $chamado_dados[2] ?></h6>
                    <p class="card-text"><?= $chamado_dados[3] ?></p> 

                  </div>
                </div>

              <? } ?>

              <div class="row mt-5">
                <div class="col-6">
                  <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>