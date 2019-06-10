<?php 

	namespace App\Controllers;

	use Psr\Http\Message\ServerRequestInterface as Request;
    use Psr\Http\Message\ResponseInterface as Response;    

    final class VendasController
    {
        /**
         * Simulação de um ambiente de rotas voltado para parte de vendas
         * Aqui vamos utilizar somente o update, para alterar a quantidade do produto em estoque.
         */
        public function getVendas(Request $request, Response $response, array $args): Response
        {
            $diretorio = getenv("DIRETORIO");
            $response = $response->withJson([
                "mensagem" => $diretorio
            ]);
            return $response;
        }
        public function insertVendas(Request $request, Response $response, array $args): Response
        {
            return $response;
        }
        public function updateVendas(Request $request, Response $response, array $args): Response
        {
            return $response;
        }
        public function deleteVendas(Request $request, Response $response, array $args): Response
        {
            return $response;
        }
    }

?>