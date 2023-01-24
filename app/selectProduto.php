<?php
    include_once('cnx.php');
    class Categorias{
        private conexao $conect;
        
        public function catego(){
            $conect = new conexao;
            $cnx = $conect->cnxb();
            return mysqli_query($cnx,"select categoria from categoria");
        }
    }
    $cat = new Categorias;
    $resultado = $cat->catego();

?>
