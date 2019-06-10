<?php 

	namespace App\Controllers;

	use Psr\Http\Message\ServerRequestInterface as Request;
    use Psr\Http\Message\ResponseInterface as Response;
    use App\DAO\GestaoVendas\VendasDAO;
    use App\DAO\GestaoVendas\ProdutosDAO;
    use App\DAO\GestaoVendas\CarrinhoDAO;

final class VendasController
    {
        /**
         * Simulação de um ambiente de rotas voltado para parte de vendas
         * Aqui vamos utilizar somente o update, para alterar a quantidade do produto em estoque.
         */
        public function insertVendas(Request $request, Response $response, array $args)
        {
            $idcarrinho = $_POST["idcarrinho"];
            $idusuario = $_POST["idusuario"];
            $idproduto = $_POST["idproduto"];
            $inserirVendaDAO = new VendasDAO();
            $inserirVendas = $inserirVendaDAO->inserirVendas($idusuario,$idproduto);
            $produtosDao = new ProdutosDAO();            
            $produtos = $produtosDao->updateProduto($idproduto);
            $CarrinhoDao = new CarrinhoDAO();
            $carrinho = $CarrinhoDao->deleteDadosCarrinho($idcarrinho);
            echo 1;
        }        
    }

?>