<?php 
	
	use function src\slimConfiguration;
	use App\Controllers\ProdutoController;
	use App\Controllers\VendasController;
	use App\Controllers\LoginController;
	use App\DAO\GestaoVendas\ProdutosDAO;
	use App\Controllers\CarrinhoController;
	
	

	$app = new \Slim\App(slimConfiguration());
	
	/**
	 * Criando o container 
	 */
    $container = $app->getContainer();
    $container['view'] = function ($container) {

        $dir = dirname(__DIR__);

        $view = new \Slim\Views\Twig($dir."/App/views/", [
            'cache' => false // $dir . '/tmp/cache'
        ]);
        
        $router = $container->get('router');
        $uri = \Slim\Http\Uri::createFromEnvironment(new \Slim\Http\Environment($_SERVER));
		$view->addExtension(new \Slim\Views\TwigExtension($router, $uri));
		if(isset($_SESSION)){
			$view->getEnvironment()->addGlobal('session', $_SESSION);
		}
        return $view;
	};
	

	$app->get('/', function ($request, $response, $args) {	
		if(isset($_SESSION)){
			$sessaoId = $_SESSION['id'];
		}
		else{
			$sessaoId = ""; 	
		}
		return $this->view->render($response, "pages/home.twig", [
			'name' => getenv("DIRETORIO"), 'sessao' => $sessaoId
		]);
	})->setName('home');

	$app->get('/login', function ($request, $response, $args) {
		return $this->view->render($response, "pages/login.twig", [
			'name' => getenv("DIRETORIO")
		]);
	})->setName('login');

	$app->post("/login", LoginController::class . ":entrar");

	$app->get("/produto", ProdutoController::class . ":getProdutos")->setName("produtos");

	$app->post("/vendas/", VendasController::class . ":insertVendas")->setName("vendas");

	$app->get('/compras', function ($request, $response, $args) {	
		if(isset($_SESSION)){
			$sessaoId = $_SESSION['id'];
		}
		else{
			$sessaoId = ""; 	
		}
		return $this->view->render($response, "pages/carrinho.twig", [
			'name' => getenv("DIRETORIO"), 'sessao' => $sessaoId
		]);
	});

	$app->post("/carrinhos/", CarrinhoController::class . ":getCarrinho");
	$app->post("/carrinho", CarrinhoController::class . ":insertCarrinho");
	$app->post("/deletacarrinho/", CarrinhoController::class . ":deleteCarrinho");

	$app->run();
 ?>