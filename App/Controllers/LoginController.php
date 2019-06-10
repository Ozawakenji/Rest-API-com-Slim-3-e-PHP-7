<?php 

	namespace App\Controllers;

	use Psr\Http\Message\ServerRequestInterface as Request;
	use Psr\Http\Message\ResponseInterface as Response;
	use App\DAO\GestaoVendas\LoginDAO;

final class LoginController
	{
		/**
		 * Simulação de um ambiente de rotas voltado para parte de Login
		 * Aqui vamos utilizar somente o get, para efetuar o login iniciando a sessão.
		 */
		public function login(Request $request, Response $response, array $args): Response
		{
            $data = $request->getParsedBody();
            $email = $data["email"];
            $senha = $data["senha"];

            if(isset($email) && isset($senha)){
                $loginDAO = new LoginDAO();
                $usuario = $loginDAO->getUserByEmail($email);
                if($usuario != null){
                    $senhaBanco = $usuario->getSenha();
                    if(!($senha == $senhaBanco))
                        return $response->withStatus(401);
                        var_dump($usuario);
                }
                else{
                    return $response->withStatus(401);
                }
            }
            else{
                return $response->withStatus(401);
            }       
            
			return $response;
		}
	}

 ?>
