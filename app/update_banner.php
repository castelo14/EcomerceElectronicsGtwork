<?php

include_once('cnx.php');
    include_once('gravar_verificacao.php');
     if(!isset($_POST)){
        header("Location: ../admin/login.php"); exit;
    }

        class AddBanner{

            private string $titulo;
            private string $descricao;
            private int $id;

            public function add(
                string $titulo,
                string $descricao,
                int $id){

                    $this->titulo = $titulo;
                    $this->descricao = $descricao;
                    $this->id = $id;

                $ficheiro = $_FILES['ficheiro'];
                $conect = new conexao;
                $cnx = $conect->cnxb();

               
                //verificando se é uma imagem pegando o ultimo
                if($ficheiro['size'] > 5211203){
                    header("Location: ?info=ImgMax"); 
                }
                   
                    $novoNome = uniqid()."b";
                    $nomeArquivo = $ficheiro['name'];
                    $extensao = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));
            
              
                move_uploaded_file($ficheiro["tmp_name"], "../img_banner/" .$novoNome . "." . $extensao);
                
               $consulta = mysqli_query($cnx,"update banner set titulo='".$this->titulo."',descricao='".$this->descricao."',imgBanner= '$novoNome.$extensao' where id=".$this->id." ");
          
                header("Location: ../admin/index4.php?acao=sucess"); 
           // }
                
            }
        }
        $addBanner = new AddBanner;
        $addBanner->add($_POST['titulo'],$_POST['descricao'],$_GET['id']);






?>