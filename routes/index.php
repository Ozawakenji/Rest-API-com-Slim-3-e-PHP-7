<?php 
	
	use function src\slimConfiguration;
	use App\Controllers\ProdutoController;
	use App\Controllers\VendasController;
	use App\Controllers\LoginController;
	use App\Controllers\BaseController;
	
	

	$app = new \Slim\App(slimConfiguration());
	
	/**
	 * Criando o container 
	 */
    $container = $app->getContainer();
    $container['view'] = function ($container) {

        $dir = dirname(__DIR__);

        $view = new \Slim\Views\Twig($dir . "/app/views", [
            'cache' => false // $dir . '/tmp/cache'
        ]);
        
        $router = $container->get('router');
        $uri = \Slim\Http\Uri::createFromEnvironment(new \Slim\Http\Environment($_SERVER));
        $view->addExtension(new \Slim\Views\TwigExtension($router, $uri));
    
        return $view;
	};
	

	$app->get("/", BaseController::class . ":index");

	$app->post("/login", LoginController::class . ":login");

	$app->get("/produto", ProdutoController::class . ":getProdutos");
	$app->post("/produto", ProdutoController::class . ":insertProdutos");
	$app->put("/produto", ProdutoController::class . ":updateProdutos");
	$app->delete("/produto", ProdutoController::class . ":deleteProdutos");

	$app->get("/vendas", VendasController::class . ":getVendas");
	$app->post("/vendas", VendasController::class . ":insertVendas");
	$app->put("/vendas", VendasController::class . ":updateVendas");
	$app->delete("/vendas", VendasController::class . ":deleteVendas");

	$app->run();
 ?>