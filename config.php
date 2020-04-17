<?php  

    session_start();
    date_default_timezone_set('America/Sao_Paulo');
   $autoload = function($class){
        if($class == 'Email'){
          include_once('classes/phpmailer/PHPMailerAutoload.php');  
        }
        include('classes/'.$class.'.php');
        
   };

   spl_autoload_register($autoload);

    //Localhost 
    define('INCLUDE_PATH','http://localhost/gestao_clientes/');
    define('INCLUDE_PATH_PAINEL',INCLUDE_PATH.'painel/');

    define('BASE_DIR_PAINEL',__DIR__.'/painel');

    //Conectar com o banco de dados
    define('HOST','localhost');
    define('USER','root');
    define('PASSWORD','');
    define('DATABASE','sistema');

    

/*
    //Servidor hostinger
   define('INCLUDE_PATH','http://projeto.dansol.com.br/');

    define('INCLUDE_PATH_PAINEL',INCLUDE_PATH.'painel/');
    //Conectar com o banco de dados
    define('HOST','localhost');
    define('USER','u155647215_danilo');
    define('PASSWORD','681015');
    define('DATABASE','u155647215_projeto_01');
*/
    

    //Contantes para painel de controle
    define ('NOME_EMPRESA','Dansol');

    
    

    //Funções do painel
    function pegaCargo($indice){
      
        return Painel::$cargos[$indice];

    }

    function selecionadoMenu($par){
      $url = explode('/',@$_GET['url'])[0];
      if ($url == $par) {
        echo 'class="menu-active"';
      }
    }

    function verificaPermissaoMenu($permissao){
      if ($_SESSION['cargo'] >= $permissao) {
        return;
      }else{
        echo 'style="display:none;"';
      }
    }

    function verificaPermissaoPagina($permissao){
      if ($_SESSION['cargo'] >= $permissao) {
        return;
      }else{
        include('painel/pages/permissao_negada.php');
        die();
    }
  }

  function recoverPost($post){
		if(isset($_POST[$post])){
			echo $_POST[$post];
		}
	}
?>