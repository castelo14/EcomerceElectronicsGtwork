<?php
    include_once('cnx.php');
    
    class ViewProdutos {

   
    public function resultadoP( int $id){

           $conect = new conexao;
           $cnx = $conect->cnxb();

            # code...
            $res = mysqli_query($cnx,"update produtos set visivel='nao' where id='28'");
           return header('Location: index.php');
           
        }
}

$visualizar = new ViewProdutos;

    $visualizar->resultadoP($_GET['$idP']);

    



?>