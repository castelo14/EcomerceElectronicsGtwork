<?php
    
    include_once('cnx.php');
    include_once('gravar_verificacao.php');
     if(!isset($_POST)){
        header("Location: ../admin/login.php"); exit;
    }

    class actualizar{

        public function up(string $produto, string $descricao, string $quantidade, string $estado,
            int $idapp, float $preco){

                $categoria = $_POST['categoria'];
                $conect = new conexao;
                $cnx = $conect->cnxb();
                
                //buscando o id da categoria
                $cmd = "select id from categoria where categoria='$categoria'";

                $resultados = mysqli_query($cnx,$cmd);
                $Catg = mysqli_fetch_assoc($resultados);
                $idCategoria = $Catg['id'];
                $total = $quantidade*$preco;
                $id = $_POST['id'];
                    
                    //inserindo dados na base de dados
                   $consulta = mysqli_query($cnx,"update produtos set nome='$produto',precoUnitario='$preco'
                   ,qtd='$quantidade',estado='$estado',supplid='$idapp',idCategoria='$idCategoria'
                   ,descricao='$descricao',total='$total' where id=$id");
              
                    header("Location: ../admin/index.php?acao=Upsucess"); 
               // }
                      
            }            

        }
    

    $produtoUP = new Actualizar;
    $produtoUP->up($_POST['produto'], $_POST['descricao'], $_POST['quantidade'], 
                            $_POST['estado'], $_POST['idapp'], $_POST['preco']);
