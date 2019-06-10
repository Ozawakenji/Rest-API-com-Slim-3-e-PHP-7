<?php 

    namespace App\Controllers;

    use Psr\Http\Message\ServerRequestInterface as Request;
	use Psr\Http\Message\ResponseInterface as Response;

    final class BaseController extends Controller
    {
        public function index(Request $request, Response $response) {       
            $this->render($response, "/pages/home.twig");
        }
    }

 ?>
