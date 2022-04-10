<?
    session_start();
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

    //Modificando o caracter que é usado para separação dos dados, com intuito de garantir a integridade da informação
    $titulo = str_replace('#', ' - ', $_POST['titulo']);
    $categoria = str_replace('#', ' - ', $_POST['categoria']);
    $descricao = str_replace('#', ' - ', $_POST['descricao']); 



    //Abrindo um arquivo:
    $arquivo = fopen('../arquivo.hd', 'a'); // Caso o arquivo não existir ele será criado


    // Transformando o Array em texto:
    $texto = $_SESSION['id'] . '#' . $titulo . '#' . $categoria . '#' . $descricao . PHP_EOL ;

    // Escrevendo no arquivo
    fwrite($arquivo, $texto);

    // Fechando o arquivo
    fclose($arquivo);

    header('Location: abrir_chamado.php')
?>