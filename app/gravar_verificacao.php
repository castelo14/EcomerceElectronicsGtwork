<?php
  

  // A sessão precisa ser iniciada em cada página diferente
  if (!isset($_SESSION)) session_start();

  // Verifica se não há a variável da sessão que identifica o usuário
  if (!isset($_SESSION['UsuarioID'])) {
      // Destrói a sessão por segurança
      session_destroy();
      
      // Redireciona o visitante de volta pro login
     
  }    
     		if($_SESSION['UsuarioID']){
     		
     		    $Sid             =   $_SESSION['UsuarioID'];
      			$Snome           =	$_SESSION['UsuarioNome'];
      			$Semail          =	$_SESSION['UsuarioEmail'];
      			$Sestado       =	$_SESSION['UsuarioEstado'];
      			$Sbloqueado      =	$_SESSION['UsuarioBloqueado'];
      			$Spermissao          =	$_SESSION['UsuarioPermissao'];
       			$SPassword          =	$_SESSION['UsuarioPassword'];
	        }			
?>
