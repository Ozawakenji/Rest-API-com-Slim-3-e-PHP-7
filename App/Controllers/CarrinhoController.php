<?php 

	namespace App\Controllers;

	use Psr\Http\Message\ServerRequestInterface as Request;
	use Psr\Http\Message\ResponseInterface as Response;
	use App\DAO\GestaoVendas\CarrinhoDAO;

final class CarrinhoController
	{
		/**
		 * Simulação de um ambiente de rotas voltado para parte de Carrinho
		 * Aqui vamos utilizar somente o get, para exibir os Carrinho na tela.
         * e o delete para deletar o item do carrinho.
		 */
		public function getCarrinho(Request $request, Response $response, array $args)
		{
			$id = $_POST["idusuario"];
			$CarrinhoDao = new CarrinhoDAO();
			$carrinho = $CarrinhoDao->getDadosCarrinho($id);
			$response = $response->withJson($carrinho);
			return $response;
		}
		public function insertCarrinho(Request $request, Response $response, array $args)
		{
			$id = $_POST["idusuario"];
			$idpro = $_POST["idproduto"];
			$CarrinhoDao = new CarrinhoDAO();
			$carrinho = $CarrinhoDao->insertDadosCarrinho($id, $idpro);
			if($carrinho){
				echo "1";
			}
			echo 0;
		}		
		public function deleteCarrinho(Request $request, Response $response, array $args)
		{			
			$id = $_POST["id"];
			$CarrinhoDao = new CarrinhoDAO();
			$carrinho = $CarrinhoDao->deleteDadosCarrinho($id);
			if($carrinho){
				echo "1";
			}
			echo 0;
		}


	}

 ?>
