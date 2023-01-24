<?php

        include_once('cnx.php');
        include_once('gravar_verificacao.php');
            if(!isset($_POST)){
            header("Location: ../admin/login.php"); exit;
        }

        class DellBanner{
            private int $id;

            public function dell(int $id){
            $this->id = $id;

            $conect = new conexao();
            $cnx = $conect->cnxb();
            mysqli_query($cnx,"delete from banner where id = ".$this->id."");
            header("Location: ../admin/index4.php?acao=sucess"); 
            
        }
       
    }

    $delBanner = new DellBanner;
    $delBanner->dell($_GET['id']); 


?>