<?php
 include_once('cnx.php');
 include_once('gravar_verificacao.php');
  if(!isset($_POST)){
     header("Location: ../admin/login.php"); exit;
 }

class AddCliente{

    private string $Pnome;
    private string $Unome ;  
    private string $pais  ;   
    private string $Nempresa; 
    private string $endereco ;
    private string $cidade   ;
    private string $condado  ;
    private string $cep      ;
    private string $email    ;
    private string $telefone ;
    private string $cmd ;
    private string $idUser;


    public function cliente(string $Pnome1, string $Unome1, string $pais1, string $Nempresa1, string $endereco1,
    string $cidade1, string $condado1, string $cep1, string $email1, string $telefone1,string  $idUser){

        $conect = new conexao;
        $cnx = $conect->cnxb();

        $this->Pnome    = $Pnome1;
        $this->Unome    = $Unome1;
        $this->pais     = $pais1;
        $this->Nempresa = $Nempresa1;
        $this->endereco = $endereco1;
        $this->cidade   = $cidade1;
        $this->condado  = $condado1;
        $this->cep      = $cep1;
        $this->email    = $email1;
        $this->telefone = $telefone1;
        $nome="";
        $precoUnitario="";
        $qtdProduto="";
        $precoTotal=0;
        $this->idUser = $idUser;

       
                foreach ($_SESSION['carrinho'] as $id => $qtd) {
                    $mostrarProduto =   mysqli_query($cnx,"select *from produtos where id =$id");
                    $data = mysqli_fetch_assoc($mostrarProduto);
         
                    $qtdV = $data['qtd'];
                    
                    if($qtdV < $qtd){
                        unset($_SESSION['carrinho'][$id]);
                    }else{
                        //actualizar produtos
                        $qtdActualizar = ($qtdV-$qtd);
                        mysqli_query($cnx,"update produtos set qtd=$qtdActualizar , total=precoUnitario*qtd where id=$id");
                        //
                        $nome .="," .$data['nome'];
                        $precoUnitario .="," .$data['precoUnitario'];
                        $precoTotal+=$data['precoUnitario']* $qtdV ;
                        $qtdProduto .= "," .$qtd ;
                        unset($_SESSION['carrinho'][$id]);
                    }
                }

                $this->cmd = "insert into cliente values(default,'$this->idUser','$this->Pnome', '$this->Unome','$this->pais',
                '$this->Nempresa','$this->endereco', '$this->cidade', '$this->condado', '$this->cep',
                '$this->email', '$this->telefone','$nome','$precoUnitario','$qtdProduto','$precoTotal')";
                mysqli_query($cnx,$this->cmd);

                $result = mysqli_query($cnx,"select idCliente from cliente") ;
                while ($data=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                    $idCliente = $data["idCliente"];
                    if ($idCliente > 0) {
                        mysqli_query($cnx,"insert into pedido values(default,$idCliente,default,default,default,default,default,default,default,default,default);
                        ");
                    }                    
                   
                }

            
            header('Location: ../index.php');
      
       
    }
}
$cliente = new AddCliente;
$cliente->cliente($_POST['pnome'], $_POST['unome'],$_POST['pais'],$_POST['nempresa'],$_POST['endereco'],
                    $_POST['cidade'],$_POST['condado'], $_POST['cep'], $_POST['email'], $_POST['telefone'],$Sid);


?>