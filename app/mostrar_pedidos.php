<?php
include_once('../app/cnx.php');

$pReoetidos="";
$qtdconta = 0;
$result = mysqli_query($cnx, "select *from cliente where id>30");

$resultTotal = mysqli_query($cnx, "select sum(total) as tot from cliente where id>30");
$TotalValor = mysqli_fetch_assoc($resultTotal);
$TotalVendido = number_format($TotalValor['tot'],2,',','.');

class PedidoFavorito
{
   
    public function mostrar()
    {
      $conect = new conexao;
      $cnx = $conect->cnxb();
      $pReoetidos = "";
      $qtdconta = 0;
        $Gfavorito = "";
        $cont = 0;
      
        $result = mysqli_query($cnx, "select *from cliente where idCliente >9");

        while ($dados = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            
            $pReoetidos .="," .$dados['produtos'];  
            }
            $qtdsProduto = explode(',', $pReoetidos);
            
           
            $qtdFavorito = array_count_values($qtdsProduto); // 2
            foreach ($qtdFavorito  as $key => $value) {

                # code...
               
                if ($cont != 0) {
                    # code...
                    if ($value > $qtdconta ) {
                        $qtdconta = $value;
                        $Gfavorito = $key;
                        # code...
                    }
                }
                $cont++;
            } 
            
            return $Gfavorito ;
        }
        

       
    }
    

$favorito = new PedidoFavorito;
$Nfavorito = $favorito->mostrar();

//$Nfavorito = array_count_values($afavorito);
?>