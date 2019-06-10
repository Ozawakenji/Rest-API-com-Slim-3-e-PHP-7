<?php 

	namespace App\DAO\GestaoVendas;

	class CarrinhoDAO extends Conexao
	{
        public function __construct()
		{
			parent::__construct();
        }
        
        public function getDadosCarrinho(int $id): array
        {
            $carrinho = $this->pdo->query("SELECT * FROM CARRINHO WHERE idusuario = {$id};")->fetchAll(\PDO::FETCH_ASSOC);
            return $carrinho;
        }

    }

?>