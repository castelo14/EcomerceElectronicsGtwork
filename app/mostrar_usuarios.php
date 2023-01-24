<?php

    $result = mysqli_query($cnx,"select id, nome,email,permissao from usuarios");
    $result2 = mysqli_query($cnx,"select  count(id) as qtdUser from usuarios");

    while ($qtdU = mysqli_fetch_array($result2,MYSQLI_ASSOC)) {
        $qtdUser = $qtdU['qtdUser'];
    }
  
   

?>
