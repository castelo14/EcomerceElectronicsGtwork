<?php

     if(!isset($_POST)){
        header("Location: ../admin/login.php"); exit;
    }
    include_once('cnx.php');


    if($_GET['info'] == "add"){

    //adicionando usuario ou registando

    class AddUsuario{

       public function Adicionar(string $nome,string $email,string $pwd,string $pwd2){
        
            $conect = new conexao;
            $cnx = $conect->cnxb();

            if(strcmp($pwd,$pwd2) != 0){
                header("Location: ../admin/register.php?pwd=error"); 
       
            }else{
                $cmd = "insert into usuarios values(default, '$nome', '$email', '$pwd', default)";
                mysqli_query($cnx,$cmd) or die();
                   
            }
       }
    }

    $adicionar = new AddUsuario;
    $adicionar->Adicionar($_POST['nome'], $_POST['email'] ,$_POST['password'], $_POST['password2']);
    header("Location: ../admin/login.php?info=sucess"); 
    
   //actualizando usuario 
} else if($_GET['info'] == "up"){


    class Actualizar{

        public function update(string $nome,string $email,string $pwd, int $id ){
         
             $conect = new conexao;
             $cnx = $conect->cnxb();

                 $cmd = "update usuarios set  nome = '$nome', email = '$email', password = '$pwd' where id = $id)";
                 mysqli_query($cnx,$cmd) or die();          
        }
     }
 
     $adicionar = new Actualizar;
     $adicionar->update($_POST['nome'], $_POST['email'] ,$_POST['password'], $_GET['id']);
     header("Location: ../admin/login.php?info=sucessUp"); 


}else if($_GET['info'] == "del"){

    class Deletar{

        public function dell( int $id ){
         
             $conect = new conexao;
             $cnx = $conect->cnxb();

                 $cmd = "delete from usuarios where id = $id)";
                 mysqli_query($cnx,$cmd) or die();          
        }
     }
 
     $adicionar = new Deletar;
     $adicionar->dell($_GET['id']);
     header("Location: ../admin/login.php?info=sucessDel"); 


}


?>
