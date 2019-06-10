<?php 

    namespace App\Controllers;

    use Psr\Http\Message\ResponseInterface as Response;

    class Controller{

        private $container;

        public function __construct($container){

            $this->container = $container;

        }

        
        public function render(Response $response, $arquivo){

            $this->container->view->render($response, $arquivo);
        }
    }

?>