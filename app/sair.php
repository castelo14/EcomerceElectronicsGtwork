<?php
                session_start();
                session_destroy();
                unset($_SESSION['UsuarioID']);
      			unset($_SESSION['UsuarioNome']);
      			unset($_SESSION['UsuarioEmail']);
      			unset($_SESSION['UsuarioEstado']);
      			unset($_SESSION['UsuarioBloqueado']);
      			unset($_SESSION['UsuarioPermissao']);
      			unset($_SESSION['UsuarioPassword']);
      			
      			    $_SESSION['UsuarioID']= null;
      				$_SESSION['UsuarioNome']= null;
      				$_SESSION['UsuarioEmail']= null;
      				$_SESSION['UsuarioEstado']= null;
      				$_SESSION['UsuarioBloqueado']= null;
      				$_SESSION['UsuarioPassword']= null;
      				$_SESSION['UsuarioPermissao']= null;
      			
      		    $Sid             =   null;
      			$Snome           =	null;
      			$Semail          =null;
      			$Sestado       =	null;
      			$Sbloqueado      =	null;
      			$SPermissao          =	null;
      			$SPassword          =	null;
      			
      			session_commit();
      		    header("Location: ../index.php");
      			
        //*******************************************************************************
        
?>
