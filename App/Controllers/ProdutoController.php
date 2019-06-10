<?php 

	namespace App\Controllers;

	use Psr\Http\Message\ServerRequestInterface as Request;
	use Psr\Http\Message\ResponseInterface as Response;
	use App\DAO\GestaoVendas\ProdutosDAO;

final class ProdutoController
	{
		/**
		 * Simulação de um ambiente de rotas voltado para parte de Produtos
		 * Aqui vamos utilizar somente o get, para exibir os produtos na tela.
		 */
		public function getProdutos(Request $request, Response $response, array $args): Response
		{
			$produtosDao = new ProdutosDAO();
			$produtos = $produtosDao->getAllProdutos();
			$response = $response->withJson($produtos);
			return $response;
		}
		public function insertProdutos(Request $request, Response $response, array $args): Response
		{
			$response = $response->withJson([
				"mensagem" => "INSERIR"
			]);
			return $response;
		}
		public function updateProdutos(Request $request, Response $response, array $args): Response
		{
			$response = $response->withJson([
				"mensagem" => "ATUALIZAR"
			]);
			return $response;
		}
		public function deleteProdutos(Request $request, Response $response, array $args): Response
		{
			$response = $response->withJson([
				"mensagem" => "DELETAR"
			]);
			return $response;
		}


	}

 ?>
