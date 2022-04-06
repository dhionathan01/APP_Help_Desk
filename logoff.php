<?php
    session_start();

    //Opções:

    // remover índices do array de sessão
    //unset - remove o índice de um array (independete do array), Apenas se existir
    
    //destruir a variável de sessão
    //session_destroy() Destroe todas as variáveis session. ATENÇÃO para segurança é melhor forçar um redirecionamento para que ocorra outra chamada no http, pois os valores ainda continuam disponíveis, só seram deletados definitivamente quando houver outra requisição

    session_destroy();
    header('Location: index.php');

?>