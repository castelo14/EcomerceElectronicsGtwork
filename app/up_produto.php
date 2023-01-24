<?php

        include_once('cnx.php');
        include_once('gravar_verificacao.php');
            if(!isset($_POST)){
            header("Location: ../admin/login.php"); exit;
        }

        class UpBanner{
            private int $id;
            private string $estado;

            public function dell(int $id, string $estado){
            $this->id = $id;
            $this->estado = $estado;

            $conect = new conexao();
            $cnx = $conect->cnxb();

            if ($this->estado=="sim") {
                # code...
                mysqli_query($cnx,"update produtos set visivel='nao' where id = ".$this->id."");
                header("Location: ../admin/index.php?acao=sucess"); 
            }else{
                mysqli_query($cnx,"update produtos set visivel='sim' where id = ".$this->id."");
                header("Location: ../admin/index.php?acao=sucess"); 
            }
            
        }
       
    }

    $upBanner = new UpBanner;
    $upBanner->dell($_GET['id'],$_GET['estado']); 


?>