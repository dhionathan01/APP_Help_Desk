<?php
    session_start();
    
    // Variavel que verifica se o usuário está autenticado
    $usuario_autenticado = false;
    $usuario_id = null;
    $usuario_perfil_id = null;

    $perfil_usuario = array('1' => 'Administrativo', '2' => 'Usuário');
    // Usuários do sistema:
    $usuarios_app = array(
        array('id' => '1', 'email' => 'adm@test.com', 'senha' => '123456', 'perfil_id' => '1'),
        array('id' => '2', 'email' => 'user@test.com', 'senha' => 'abcde', 'perfil_id' => '2'),
        array('id' => '3', 'email' => 'dhionathan@adm.com', 'senha' => '123456', 'perfil_id' => '1'),
        array('id' => '4', 'email' => 'jorge@user.com', 'senha' => 'abcde', 'perfil_id' => '2')

    );

    /* echo '<pre>';
    print_r($usuarios_app);
    echo '</pre>'; */

    foreach($usuarios_app as $user){

        if($user['email'] == $_POST['email'] and  $user['senha'] == $_POST['senha']){
            $usuario_autenticado = true;
            $usuario_id = $user['id']; // Atribuindo o id do usuário autenticado
            $usuario_perfil_id = $user['perfil_id']; // Atribuindo um perfil de usuário
            break;
        }
        //echo '<br> <hr>';
    }

    if($usuario_autenticado){
        echo 'Usuário Logado';
        $_SESSION['autenticado'] = 'SIM';
        $_SESSION['id'] = $usuario_id; // Incorporando o id a sessão
        $_SESSION['perfil_id'] = $usuario_perfil_id;
        header('Location: home.php'); // Fazer o redirecionamento para home
    }else{

        $_SESSION['autenticado'] = 'NAO';
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