<?php
    
    include_once('cnx.php');
    include_once('gravar_verificacao.php');
     if(!isset($_POST)){
        header("Location: ../admin/login.php"); exit;
    }

    if($_GET['info'] == "add"){

    class AddProduto{

        public function add(string $produto, string $descricao, string $quantidade, string $estado,
            int $idapp, float $preco){

                $ficheiro = $_FILES['ficheiro'];
                $categoria = $_POST['categoria'];
                $conect = new conexao;
                $cnx = $conect->cnxb();
                
                //buscando o id da categoria
                $cmd = "select id from categoria where categoria='$categoria'";

                $resultados = mysqli_query($cnx,$cmd);
                $Catg = mysqli_fetch_assoc($resultados);
                $idCategoria = $Catg['id'];

               
                    
                    //upload de imagem pegando a urlImagem ou nome
                    $extensao1 = explode('.',$ficheiro['name']);//dividir o nome da string
                
                    //verificando se é uma imagem pegando o ultimo
                    if($ficheiro['size'] > 5211203){
                        header("Location: ?info=ImgMax"); 
                    }
                        $total = $quantidade*$preco;
                        $novoNome = uniqid();
                        $nomeArquivo = $ficheiro['name'];
                        $extensao = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));
                
                    /* if($extensao1[sizeof($extensao1)-1] != "jpg" || $extensao1[sizeof($extensao1)-1] != "png"){
                    die("tipo de arquivo nao aceite");
                }else{*/
                    move_uploaded_file($ficheiro["tmp_name"], "../upload_img/" .$novoNome . "." . $extensao);
                    
                    //inserindo dados na base de dados
                   $consulta = mysqli_query($cnx,"insert into produtos values(default, '$produto','$preco','$quantidade','$estado',default,'$idapp','$idCategoria','$descricao','$novoNome',CURRENT_TIMESTAMP,'$total',default)");
              
                    header("Location: ../admin/add_produtos.php?acao=sucess"); 
               // }
                      
            }            

        }
    

    $produtoADD = new AddProduto;
    $produtoADD->add($_POST['produto'], $_POST['descricao'], $_POST['quantidade'], 
                            $_POST['estado'], $_POST['idapp'], $_POST['preco']);

    }else if($_GET['info'] == "up"){

        class Actualizar{
            
            public function up(int $id){
    
                    $conect = new conexao;
                    $cnx = $conect->cnxb();
                    
                    //buscando o id da categoria
                    $cmd = "select *from produtos where id=$id";
                    return mysqli_query($cnx,$cmd);
                    
                }
               
            }
            $actualizar = new Actualizar;
            $update = $actualizar->up($_GET['id']);

            $Produto = mysqli_fetch_assoc($update);
            $nome = $Produto['nome'];
            $descricao = $Produto['descricao'];
            $qtd = $Produto['qtd'];
            $preco = $Produto['precoUnitario'];
            $suppid = $Produto['supplid'];
            $idP = $Produto['id'];

    }    
    //buscando o id da categoria
   
    



?>
