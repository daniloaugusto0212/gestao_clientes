<?php
    sleep(2);

    session_start();
    date_default_timezone_set('America/Sao_Paulo');
   $autoload = function($class){
        if($class == 'Email'){
          include_once('classes/phpmailer/PHPMailerAutoload.php');  
        }
        include('../../classes/'.$class.'.php');
        
   };

   spl_autoload_register($autoload);

    //Localhost 
    define('INCLUDE_PATH','http://localhost/gestao_clientes/');
    define('INCLUDE_PATH_PAINEL',INCLUDE_PATH.'painel/');

    define('BASE_DIR_PAINEL',__DIR__.'/painel');

    $data['sucesso'] = true;
    $data['erros'] = "";

    if (Painel::logado() == false) {
        die("Você não está logado!");
    }

    /*Nosso código começa aqui */

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $tipo = $_POST['tipo_cliente'];
    $cpf = '';
    $cnpj = '';

    if ($tipo == 'fisico') {
        $cpf = $_POST['cpf'];
    }else if ($tipo == 'juridico') {
        $cnpj = $_POST['cnpj'];
    }

    if (isset($_FILES['imagem'])) {
        $imagem = $_FILES['imagem'];
    }else{
        $data['sucesso'] = false;
        $data['erros'] = " Imagen inválida/vazia!";
    }

    die(json_encode($data));

?>