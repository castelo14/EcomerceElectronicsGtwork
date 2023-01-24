<?php
    include_once('cnx.php');
    
    class Produtos {

        private conexao $conect;
        /*private string $cmd_final;
        private string $procurar;
        */
        public function resultado( string $comando){
              // $this->cmd_final = $comando;
               //$this->procurar  = $_POST['search'];
               $conect = new conexao;
               $cnx = $conect->cnxb();
               return mysqli_query($cnx,$comando);
            }
    }


        $procurar = $_POST["search"];
        $cmd = "select produtos.id as idp,produtos.nome,produtos.precoUnitario,produtos.qtd,produtos.estado,produtos.descricao,produtos.data,produtos.total,produtos.imagem,produtos.supplid,  categoria.categoria from produtos inner join categoria on categoria.id=produtos.idCategoria where produtos.visivel='sim' and produtos.nome LIKE '%$procurar%'";
        $cmd2 =  "select produtos.id as idp,produtos.nome,produtos.precoUnitario,produtos.qtd,produtos.estado,produtos.descricao,produtos.data,produtos.total,produtos.imagem,produtos.supplid,  categoria.categoria from produtos inner join categoria on categoria.id=produtos.idCategoria where produtos.visivel='sim' and produtos.nome LIKE '%$procurar%' order by produtos.id DESC";
        $cmd20 =  "select produtos.id as idp,produtos.nome,produtos.precoUnitario,produtos.qtd,produtos.estado,produtos.descricao,produtos.data,produtos.total,  produtos.visivel as visivel, produtos.imagem,produtos.supplid, categoria.categoria from produtos inner join categoria on categoria.id=produtos.idCategoria where produtos.nome LIKE '%$procurar%' order by produtos.id DESC";
        $cmd3 =  "select produtos.id as idp,produtos.nome,produtos.precoUnitario,produtos.qtd,produtos.estado,produtos.descricao,produtos.data,produtos.total,produtos.imagem,produtos.supplid,  categoria.categoria from produtos inner join categoria on categoria.id=produtos.idCategoria where produtos.visivel='sim' LIMIT 4";
        $cmd5 = "select produtos.id as idp,produtos.nome,produtos.precoUnitario,produtos.qtd,produtos.estado,produtos.descricao,produtos.data,produtos.total,produtos.imagem,produtos.supplid,  categoria.categoria from produtos inner join categoria on categoria.id=produtos.idCategoria where produtos.visivel='sim' order by produtos.id DESC LIMIT 2";
        $cmd6 = "select produtos.id as idp,produtos.nome,produtos.precoUnitario,produtos.qtd,produtos.estado,produtos.descricao,produtos.data,produtos.total,produtos.imagem,produtos.supplid,  categoria.categoria from produtos inner join categoria on categoria.id=produtos.idCategoria where produtos.visivel='sim' order by produtos.id DESC LIMIT 3";
        $cmd7 = "select produtos.id as idp,produtos.nome,produtos.precoUnitario,produtos.qtd,produtos.estado,produtos.descricao,produtos.data,produtos.total,produtos.imagem,produtos.supplid,  categoria.categoria from produtos inner join categoria on categoria.id=produtos.idCategoria where produtos.visivel='sim' order by produtos.id ASC LIMIT 3";

        $res = new Produtos;
        $resultado = $res->resultado($cmd);
        $resultado2 = $res->resultado($cmd2);
        $resultado20 = $res->resultado($cmd20);
        $resultado3 = $res->resultado($cmd3);
        $resultado5 = $res->resultado($cmd5);
        $resultado6 = $res->resultado($cmd6);
        $resultado7 = $res->resultado($cmd7);
        
?>
