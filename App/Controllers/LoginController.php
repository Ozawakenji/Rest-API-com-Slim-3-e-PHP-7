<?php 

	namespace App\Controllers;

	use Psr\Http\Message\ServerRequestInterface as Request;
	use Psr\Http\Message\ResponseInterface as Response;
	use App\DAO\GestaoVendas\LoginDAO;

final class LoginController extends Controller
	{
		/**
		 * Simulação de um ambiente de rotas voltado para parte de Login
		 * Aqui vamos utilizar somente o get, para efetuar o login iniciando a sessão.
		 */
        
		public function entrar(Request $request, Response $response, array $args)
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
                        session_start();
                        $_SESSION["email"] = $data["email"];
                        $_SESSION["id"] = $usuario->getId();
                        $_SESSION["nome"] = $usuario->getNome();
                        return $response->withRedirect(getenv("DIRETORIO").'index.php?id='.$_SESSION["id"]);                        
                }
                else{
                    return $response->withRedirect(getenv("DIRETORIO").'index.php?id=erro');
                }
            }
            else{
                  
                return $response->withRedirect(getenv("DIRETORIO").'index.php?id=erro');
            }
               
            return $response->withRedirect(getenv("DIRETORIO").'index.php?id=erro');			
		}
	}

 ?>
