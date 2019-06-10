<?php 

	namespace App\DAO\GestaoVendas;

	class ProdutosDAO extends Conexao
	{
        public function __construct()
		{
			parent::__construct();
        }
        
        public function getAllProdutos(): array
        {
            $produtos = $this->pdo->query("SELECT * FROM PRODUTOS;")->fetchAll(\PDO::FETCH_ASSOC);

            return $produtos;
        }

    }

?>