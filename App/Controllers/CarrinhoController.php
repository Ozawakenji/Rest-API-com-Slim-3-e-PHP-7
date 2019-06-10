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
		public function getCarrinho(Request $request, Response $response, array $args): Response
		{
            $id = 1;
			$CarrinhoDao = new CarrinhoDAO();
			$carrinho = $CarrinhoDao->getDadosCarrinho($id);
			$response = $response->withJson($carrinho);
			return $response;
		}
		public function insertCarrinho(Request $request, Response $response, array $args): Response
		{
			$response = $response->withJson([
				"mensagem" => "INSERIR"
			]);
			return $response;
		}
		public function updateCarrinho(Request $request, Response $response, array $args): Response
		{
			$response = $response->withJson([
				"mensagem" => "ATUALIZAR"
			]);
			return $response;
		}
		public function deleteCarrinho(Request $request, Response $response, array $args): Response
		{
			$response = $response->withJson([
				"mensagem" => "DELETAR"
			]);
			return $response;
		}


	}

 ?>
