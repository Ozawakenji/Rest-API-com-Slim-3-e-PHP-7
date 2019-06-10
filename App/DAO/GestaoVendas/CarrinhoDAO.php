<?php 

	namespace App\DAO\GestaoVendas;

	class CarrinhoDAO extends Conexao
	{
        public function __construct()
		{
			parent::__construct();
        }
        
        public function getDadosCarrinho(int $id)
        {
            $carrinho = $this->pdo->query("SELECT c.id, p.nome, u.id as idusuario, p.id as idproduto 
            FROM carrinho as c 
            JOIN produtos AS p
            join usuario as u
            ON c.idusuario = u.id
            AND c.idproduto = p.id WHERE c.idusuario= {$id};")->fetchAll(\PDO::FETCH_ASSOC);
            return $carrinho;
        }

        public function insertDadosCarrinho(int $id,int $idpro)
        {
            $carrinho = $this->pdo->query("INSERT INTO carrinho (idusuario, idproduto) VALUES ({$id},{$idpro})");
            return $carrinho;
        }

        public function deleteDadosCarrinho(int $idcarrinho)
        {
            $carrinho = $this->pdo->query("DELETE FROM carrinho WHERE id = {$idcarrinho}");
            return $carrinho;
        }

    }

?>