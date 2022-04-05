<?php
    // Variavel que verifica se o usuário está autenticado
    $usuario_autenticado = false;
    // Usuários do sistema:
    $usuarios_app = array(
        array('email' => 'adm@test.com', 'senha' => '123456'),
        array('email' => 'user@test.com', 'senha' => 'abcde')
    );

    /* echo '<pre>';
    print_r($usuarios_app);
    echo '</pre>'; */

    foreach($usuarios_app as $user){
        // Debug:
        /* echo 'Usuário app: '.$user['email'] . ' / ' . $user['senha'];
        echo '<br>';
        echo 'Usuário form: ' . $_POST['email'] . ' / ' . $_POST['senha'];
        echo '<br>';
         */
        if($user['email'] == $_POST['email'] and  $user['senha'] == $_POST['senha']){
            $usuario_autenticado = true;
            break;
        }
        //echo '<br> <hr>';
    }

    if($usuario_autenticado){
        echo 'Usuário Logado';
    }else{
        // Forçando o redirecinamento para página inicial, criando elemento get para erro
        header('Location: index.php?login=erro'); 
    }

/* 
    print_r($_POST);
    echo '<br>';

    echo $_POST['email'];
    echo '<br>';
    echo $_POST['senha']; */

?>