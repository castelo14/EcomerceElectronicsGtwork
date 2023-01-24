<?php
include_once('cnx.php');
 
                        
    $email = $_POST['email'];
    $senha = $_POST['password'];
                    
    if (!empty($_POST) AND (empty($_POST['email'])) OR empty($_POST['password'])) {
        header("Location: ../admin/login.php"); exit;
    } 
    
    $result = mysqli_query($cnx,"select *from usuarios where email ='$email' and password = '$senha' ");

        if (mysqli_num_rows($result) != 1) {
    		
			    header("Location: ../admin/login.php?pwd=error");
				
		}else{
				
				$resul = mysqli_fetch_assoc($result);

				if (!isset($_SESSION)) session_start();
      				
      				// Salva os dados encontrados na sessão
     			    $_SESSION['UsuarioID']=$resul['id'];
      				$_SESSION['UsuarioNome']=$resul['nome'];
      				$_SESSION['UsuarioEmail']=$resul['email'];
      				$_SESSION['UsuarioEstado']=$resul['estado'];
      				$_SESSION['UsuarioBloqueado']=$resul['bloqueado'];
      				$_SESSION['UsuarioPassword']=$resul['password'];
      				$_SESSION['UsuarioPermissao']=$resul['permissao'];
      				 // Redireciona o visitante
				
	                if($_SESSION['UsuarioPermissao'] == "admin")	{	
	                
	                     header("Location: ../admin/index.php");	
				        
				    }else{
				       header("Location: ../index.php");
				    }
				}
				
				
			
				
?>
