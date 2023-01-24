<?php


   	$conta      =   $_POST['conta'];
	$cliente    =   $_POST['cliente'];
	$valor	    =   $_POST['valor'];
    
	    $result_cliente = mysqli_query($cnx,"select id from cliente where cliente='$cliente' and id_franquia = $Sfranquia");
        $cliente2 = mysqli_fetch_assoc($result_cliente);
        $id_cliente = $cliente2['id'];
       
        $plano="";
        $qtd_plano="";
        $custo_plano="";
        
	   foreach($_SESSION['carrinho'] as $id => $qtd){
            $resultado=mysqli_query($cnx,"select  *from plano where id_franquia=$Sfranquia and id = $id") or die ();
            $data = mysqli_fetch_assoc($resultado);
            
            $tipo_plano = $data['tipo'];
            
            $tipos .="," .$data['tipo'];
            $custo_plano +=$data['custo'];
            $qtd_plano .= "," .$qtd ;
            $plano .=",".$data['plano'];

            unset($_SESSION['carrinho'][$id]);	
        }
        
        $troco = ($valor - $custo_plano);
        

	if ($troco >= 0){
	
	
	    $tipos1 = explode(',',$tipos);
	    $qtd_plano1 = explode(',',$qtd_plano);
	    $k = 0;
	    $dia = 0;
	    $semana = 0;
	    $mes = 0;
	    
	    foreach($tipos1 as $tipos2){
	        $qtd_plano1[$k];
	        if($tipos == ""){}
	        else if($tipos2 == "Diario"){
	            $dia++;
	        }else if($tipos2 == "Semanal"){
	            $semana++;
	        }else if($tipos2 == "Mensal"){
	            $mes++;
	        }
	        $k++;
	    }

		$cmd = "insert into internet values(default,'$id_cliente','$plano','$conta','$valor','$troco', CURRENT_TIMESTAMP,date_add(now(), interval ((1*$dia)+(7*$semana)+(30*$mes)) day), '$Sfranquia','$Sid','$qtd_plano')";
        	$result = mysqli_query($cnx,$cmd);
        	

	}else{
		header('Location:../data/vinternet.php?alerta=gyugygbnuhu');
	}
	
    header('Location:../data/vinternet.php?alerta=havhvhajs');

?>
